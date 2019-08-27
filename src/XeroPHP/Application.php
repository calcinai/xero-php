<?php

namespace XeroPHP;

use XeroPHP\Remote\URL;
use XeroPHP\Remote\Query;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\Collection;
use XeroPHP\Remote\OAuth\Client;

abstract class Application
{
    protected static $_config_defaults = [
        'xero' => [
            'site' => 'https://api.xero.com',
            'base_url' => 'https://api.xero.com',
            'core_version' => '2.0',
            'payroll_version' => '1.0',
            'file_version' => '1.0',
            'model_namespace' => '\\XeroPHP\\Models',
        ],
        //OAuth config
        'oauth' => [
            'signature_method' => Client::SIGNATURE_RSA_SHA1,
            'signature_location' => Client::SIGN_LOCATION_HEADER,
            'authorize_url' => 'https://api.xero.com/oauth/Authorize',
            'request_token_path' => 'oauth/RequestToken',
            'access_token_path' => 'oauth/AccessToken',
        ],
        'curl' => [
            CURLOPT_USERAGENT => 'XeroPHP',
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT => 20,
            CURLOPT_SSL_VERIFYPEER => 2,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_PROXY => false,
            CURLOPT_PROXYUSERPWD => false,
            CURLOPT_ENCODING => '',
        ],
    ];

    /**
     * @var array
     */
    protected $config;

    /**
     * @var Client
     */
    protected $oauth_client;

    /**
     * @var array
     */
    protected static $_type_config_defaults = [];

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        //better here for overriding
        $this->setConfig($config);

        $this->oauth_client = new Client($this->config['oauth']);
    }

    /**
     * @return Client
     */
    public function getOAuthClient()
    {
        return $this->oauth_client;
    }

    /**
     * @param string|null $oauth_token
     *
     * @return string
     */
    public function getAuthorizeURL($oauth_token = null)
    {
        return $this->oauth_client->getAuthorizeURL($oauth_token);
    }

    /**
     * @param mixed $key
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function getConfig($key)
    {
        if (! isset($this->config[$key])) {
            throw new Exception("Invalid configuration key [{$key}]");
        }

        return $this->config[$key];
    }

    /**
     * @param string $config
     * @param mixed $option
     * @param mixed $value
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function getConfigOption($config, $option)
    {
        if (! isset($this->getConfig($config)[$option])) {
            throw new Exception("Invalid configuration option [{$option}]");
        }

        return $this->getConfig($config)[$option];
    }

    /**
     * @param array $config
     *
     * @return array
     */
    public function setConfig($config)
    {
        $this->config = array_replace_recursive(
            self::$_config_defaults,
            static::$_type_config_defaults,
            $config
        );

        return $this->config;
    }

    /**
     * @param string $config
     * @param mixed $option
     * @param mixed $value
     *
     * @throws Exception
     *
     * @return array
     */
    public function setConfigOption($config, $option, $value)
    {
        if (! isset($this->config[$config])) {
            throw new Exception("Invalid configuration key [{$config}]");
        }
        $this->config[$config][$option] = $value;

        return $this->config;
    }

    /**
     * Validates and expands the provided model class to a full PHP class.
     *
     * @param string $class
     *
     * @throws Exception
     *
     * @return string
     */
    public function validateModelClass($class)
    {
        if (class_exists($class)) {
            return $class;
        }

        $class = $this->prependConfigNamespace($class);

        if (! class_exists($class)) {
            throw new Exception("Class does not exist [{$class}]");
        }

        return $class;
    }

    /**
     * Prepend the configuration namespace to the class.
     *
     * @param string $class
     *
     * @return string
     */
    protected function prependConfigNamespace($class)
    {
        return $this->getConfig('xero')['model_namespace'].'\\'.$class;
    }

    /**
     * As you should never have a GUID for a non-existent object, will throw a NotFoundExceptioon.
     *
     * @param $model
     * @param $guid
     *
     * @throws Exception
     * @throws Remote\Exception\NotFoundException
     *
     * @return Remote\Model|null
     */
    public function loadByGUID($model, $guid)
    {
        /**
         * @var Remote\Model
         */
        $class = $this->validateModelClass($model);

        $uri = sprintf('%s/%s', $class::getResourceURI(), $guid);
        $api = $class::getAPIStem();

        $url = new URL($this, $uri, $api);
        $request = new Request($this, $url, Request::METHOD_GET);
        $request->send();

        //Return the first (if any) element from the response.
        foreach ($request->getResponse()->getElements() as $element) {
            /**
             * @var Remote\Model
             */
            $object = new $class($this);
            $object->fromStringArray($element);

            return $object;
        }

        
    }

    /**
     * Filter by comma separated string of guid's.
     *
     * @param $model
     * @param string $guids
     *
     * @throws Exception
     * @throws Remote\Exception\NotFoundException
     *
     * @return Collection
     */
    public function loadByGUIDs($model, $guids)
    {
        /**
         * @var Remote\Model
         */
        $class = $this->validateModelClass($model);

        $uri = sprintf('%s', $class::getResourceURI());
        $api = $class::getAPIStem();

        $url = new URL($this, $uri, $api);
        $request = new Request($this, $url, Request::METHOD_GET);
        $request->setParameter('IDs', $guids);
        $request->send();
        $elements = new Collection();
        foreach ($request->getResponse()->getElements() as $element) {
            /**
             * @var Remote\Model
             */
            $object = new $class($this);
            $object->fromStringArray($element);
            $elements->append($object);
        }

        return $elements;
    }

    /**
     * @param string $model
     *
     * @throws Remote\Exception
     *
     * @return Query
     */
    public function load($model)
    {
        $query = new Query($this);

        return $query->from($model);
    }

    /**
     * @param Remote\Model $object
     * @param bool $replace_data
     *
     * @throws Exception
     *
     * @return Remote\Response|null
     */
    public function save(Remote\Model $object, $replace_data = false)
    {
        //Saves any properties that don't want to be included in the normal loop
        //(special saving endpoints)
        $this->savePropertiesDirectly($object);

        if (! $object->isDirty()) {
            return;
        }
        $object->validate();

        if ($object->hasGUID()) {
            $method = $object::supportsMethod(Request::METHOD_POST) ? Request::METHOD_POST : Request::METHOD_PUT;
            $uri = sprintf('%s/%s', $object::getResourceURI(), $object->getGUID());
        } else {
            //In this case it's new
            $method = $object::supportsMethod(Request::METHOD_PUT) ? Request::METHOD_PUT : Request::METHOD_POST;
            $uri = $object::getResourceURI();
            //@todo, bump version so you must create objects with app context.
            $object->setApplication($this);
        }

        if (! $object::supportsMethod($method)) {
            throw new Exception(sprintf('%s doesn\'t support [%s] via the API', get_class($object), $method));
        }

        //Put in an array with the first level containing only the 'root node'.
        $data = [$object::getRootNodeName() => $object->toStringArray(true)];
        $url = new URL($this, $uri, $object::getAPIStem());
        $request = new Request($this, $url, $method);

        $request->setBody(Helpers::arrayToXML($data))->send();
        $response = $request->getResponse();

        if (false !== $element = current($response->getElements())) {
            $object->fromStringArray($element, $replace_data);
        }
        //Mark the object as clean since no exception was thrown
        $object->setClean();

        return $response;
    }

    /**
     * @param array|Collection $objects
     * @param mixed $checkGuid
     * @param mixed $replace_data
     *
     * @throws Exception
     *
     * @return Remote\Response
     */
    public function saveAll($objects, $checkGuid = true, $replace_data = false)
    {
        $objects = array_values($objects);

        //Just get one type to compare with, doesn't matter which.
        $current_object = $objects[0];
        /**
         * @var Remote\Model
         */
        $type = get_class($current_object);
        $has_guid = $checkGuid ? $current_object->hasGUID() : true;
        $object_arrays = [];

        foreach ($objects as $object) {
            if ($type !== get_class($object)) {
                throw new Exception('Array passed to ->saveAll() must be homogeneous.');
            }

            // Check if we have a GUID
            if ($object->hasGUID() && $has_guid === false) {
                $has_guid = true;
            }

            $object_arrays[] = $object->toStringArray(true);
        }

        $request_method = $has_guid ? Request::METHOD_POST : Request::METHOD_PUT;

        $url = new URL($this, $type::getResourceURI(), $type::getAPIStem());
        $request = new Request($this, $url, $request_method);

        //This might need to be parsed and stored some day.
        $root_node_name = Helpers::pluralize($type::getRootNodeName());
        $data = [$root_node_name => $object_arrays];

        $request->setBody(Helpers::arrayToXML($data));
        $request->setParameter('SummarizeErrors', 'false');
        $request->send();

        $response = $request->getResponse();

        foreach ($response->getElements() as $element_index => $element) {
            if ($response->getErrorsForElement($element_index) === null) {
                $objects[$element_index]->fromStringArray($element, $replace_data);
                $objects[$element_index]->setClean();
            }
        }

        return $response;
    }

    /**
     * Function to save properties directly which do not update via a POST.
     *
     * This is called automatically from the save method for things like
     * adding contacts to ContactGroups
     *
     * @param Remote\Model $object
     *
     * @throws Exception
     */
    private function savePropertiesDirectly(Remote\Model $object)
    {
        foreach ($object::getProperties() as $property_name => $meta) {
            if ($meta[Remote\Model::KEY_SAVE_DIRECTLY] && $object->isDirty($property_name)) {
                //Then actually save
                $property_objects = $object->$property_name;
                /** @var Remote\Model $property_type */
                $property_type = get_class(current($property_objects));

                $url = new URL($this, sprintf('%s/%s/%s', $object::getResourceURI(), $object->getGUID(), $property_type::getResourceURI()));
                $request = new Request($this, $url, Request::METHOD_PUT);

                $property_array = [];
                /** @var Remote\Model[] $property_objects */
                foreach ($property_objects as $property_object) {
                    $property_array[] = $property_object->toStringArray(false);
                }

                $root_node_name = Helpers::pluralize($property_type::getRootNodeName());
                $request->setBody(Helpers::arrayToXML([$root_node_name => $property_array]));

                $request->send();

                $response = $request->getResponse();
                foreach ($response->getElements() as $element_index => $element) {
                    if ($response->getErrorsForElement($element_index) === null) {
                        $property_objects[$element_index]->fromStringArray($element);
                        $property_objects[$element_index]->setClean();
                    }
                }

                //Set it clean so the following save might have nothing to do.
                $object->setClean($property_name);
            }
        }
    }

    /**
     * @param Remote\Model $object
     *
     * @throws Exception
     *
     * @return Remote\Response
     */
    public function delete(Remote\Model $object)
    {
        if (! $object::supportsMethod(Request::METHOD_DELETE)) {
            throw new Exception(
                sprintf(
                    '%s doesn\'t support [DELETE] via the API',
                    get_class($object)
                )
            );
        }

        $uri = sprintf('%s/%s', $object::getResourceURI(), $object->getGUID());
        $url = new URL($this, $uri);
        $request = new Request($this, $url, Request::METHOD_DELETE);
        $response = $request->send();

        if (false !== $element = current($response->getElements())) {
            $object->fromStringArray($element, true);
        }

        return $object;
    }
}
