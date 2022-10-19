<?php

namespace XeroPHP;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use XeroPHP\Remote\Collection;
use XeroPHP\Remote\Query;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

class Application
{
    const USER_AGENT_STRING = 'XeroPHP/%s (+https://github.com/calcinai/xero-php)';

    protected static $_config_defaults = [
        'xero' => [
            'base_url' => 'https://api.xero.com/',
            'default_content_type' => Request::CONTENT_TYPE_XML,

            'core_version' => '2.0',
            'payroll_version' => '1.0',
            'file_version' => '1.0',
            'practice_manager_version' => '3.0',
        ]
    ];

    /**
     * @var array
     */
    protected $config;

    /**
     * @var ClientInterface
     */
    private $transport;

    /**
     * @param $token
     * @param $tenantId
     */
    public function __construct($token, $tenantId)
    {
        $this->config = static::$_config_defaults;

        //Not sure if this is necessary, but it's one less thing to have to create outside the instance.
        $transport = new Client([
            'headers' => [
                'User-Agent' => sprintf(static::USER_AGENT_STRING, Helpers::getPackageVersion()),
                'Authorization' => sprintf('Bearer %s', $token),
                'Xero-tenant-id' => $tenantId,
            ]
        ]);

        $this->transport = $transport;
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
        if (!isset($this->config[$key])) {
            throw new Exception("Invalid configuration key [{$key}]");
        }

        return $this->config[$key];
    }

    /**
     * @param string $config
     * @param mixed $option
     * @return mixed
     * @throws Exception
     */
    public function getConfigOption($config, $option)
    {
        if (!isset($this->getConfig($config)[$option])) {
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
        if (!isset($this->config[$config])) {
            throw new Exception("Invalid configuration key [{$config}]");
        }
        $this->config[$config][$option] = $value;

        return $this->config;
    }

    /**
     * @return ClientInterface
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param ClientInterface $client
     * @return ClientInterface
     */
    public function setTransport(ClientInterface $client)
    {
        return $this->transport = $client;
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

        if (!class_exists($class)) {
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
        return '\\XeroPHP\\Models\\' . $class;
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
        /** @var Remote\Model $class */
        $class = $this->validateModelClass($model);

        if(!$guid){
            throw new Remote\Exception\NotFoundException;
        }

        $uri = sprintf('%s/%s', $class::getResourceURI(), $guid);
        $api = $class::getAPIStem();

        $url = new URL($this, $uri, $api);
        $request = new Request($this, $url, Request::METHOD_GET);
        $request->send();

        //Return the first (if any) element from the response.
        foreach ($request->getResponse()->getElements() as $element) {

            /** @var $object Remote\Model */
            $object = new $class($this);
            $object->fromStringArray($element);

            return $object;
        }

        //This will never happen; if not found an exception will be thrown
        return null;
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
     * @return Collection|array
     */
    public function loadByGUIDs($model, $guids)
    {
        /** @var $class Remote\Model */
        $class = $this->validateModelClass($model);

        if(empty($guids)){
            return [];
        }

        $uri = sprintf('%s', $class::getResourceURI());
        $api = $class::getAPIStem();

        $url = new URL($this, $uri, $api);
        $request = new Request($this, $url, Request::METHOD_GET);
        $request->setParameter('IDs', $guids);
        $request->send();
        $elements = new Collection();

        foreach ($request->getResponse()->getElements() as $element) {

            /** @var $object Remote\Model */
            $object = new $class($this);
            $object->fromStringArray($element);
            $elements->append($object);
        }

        return $elements;
    }

    /**
     * @param string $model
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

        if (!$object->isDirty()) {
            return null;
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

        if (!$object::supportsMethod($method)) {
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

        /** @var $type Remote\Model */
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
                $property_type = get_class(current($property_objects->getArrayCopy()));

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
     * @return Remote\Model
     */
    public function delete(Remote\Model $object)
    {
        if (!$object::supportsMethod(Request::METHOD_DELETE)) {
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
