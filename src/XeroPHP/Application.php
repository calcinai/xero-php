<?php

namespace XeroPHP;

use XeroPHP\Remote\OAuth\Client;
use XeroPHP\Remote\Object;
use XeroPHP\Remote\Query;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

abstract class Application {

    protected static $_config_defaults = array(
        'xero'  => array(
            'site'            => 'https://api.xero.com',
            'base_url'        => 'https://api.xero.com',
            'core_version'    => '2.0',
            'payroll_version' => '1.0',
            'file_version'    => '1.0',
            'model_namespace' => '\\XeroPHP\\Models'
        ),
        //OAuth config
        'oauth' => array(
            'signature_method'   => Client::SIGNATURE_RSA_SHA1,
            'signature_location' => Client::SIGN_LOCATION_HEADER,
            'authorize_url'      => 'https://api.xero.com/oauth/Authorize',
            'request_token_path' => 'oauth/RequestToken',
            'access_token_path'  => 'oauth/AccessToken'
        ),
        'curl'  => array(
            CURLOPT_USERAGENT      => 'XeroPHP',
            CURLOPT_CONNECTTIMEOUT => 30,
            CURLOPT_TIMEOUT        => 20,
            CURLOPT_SSL_VERIFYPEER => 2,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_PROXY          => false,
            CURLOPT_PROXYUSERPWD   => false,
            CURLOPT_ENCODING       => '',
        )
    );


    protected $config;
    protected $oauth_client;

    /**
     * @param array $user_config
     */
    public function __construct(array $user_config) {
        //better here for overriding
        $this->config = array_replace_recursive(self::$_config_defaults, static::$_type_config_defaults, $user_config);

        $this->oauth_client = new Client($this->config['oauth']);
    }

    /**
     * @return Client
     */
    public function getOAuthClient() {
        return $this->oauth_client;
    }

    public function getAuthorizeURL() {
        return $this->oauth_client->getAuthorizeURL();
    }


    /**
     * @param $key
     * @return mixed
     * @throws Exception
     */
    public function getConfig($key) {

        if(!isset($this->config[$key]))
            throw new Exception("Invalid configuration key [$key]");

        return $this->config[$key];
    }


    /**
     * Validates and expands the provided model class to a full PHP class
     *
     * @param $class
     * @return string
     * @throws Exception
     */
    public function validateModelClass($class){
        $config = $this->getConfig('xero');

        if($class[0] !== '\\')
            $class = sprintf('%s\\%s', $config['model_namespace'], $class);

        if(!class_exists($class))
            throw new Exception("Class does not exist [$class]");

        return $class;
    }


    /**
     * As you should never have a GUID for a non-existent object, will throw a NotFoundException.
     * You can also add the accept parameter to request PDFs (ie. of invoices)
     *
     * @param $model
     * @param $guid
     * @param $accept
     * @return mixed
     * @throws Exception
     * @throws Remote\Exception\NotFoundException
     */
    public function loadByGUID($model, $guid, $accept = Request::CONTENT_TYPE_XML) {

        $class = $this->validateModelClass($model);

        $uri = sprintf('%s/%s', $class::getResourceURI(), $guid);

        $url = new URL($this, $uri);
        $request = new Request($this, $url, Request::METHOD_GET, $accept);
        $request->send();

        if ($accept === Request::CONTENT_TYPE_XML) {
          //Return the first (if any) element from the response.
          foreach($request->getResponse()->getElements() as $element){
              $object = new $class();
              $object->fromStringArray($element);
              return $object;
          }
        } else {
          return $request->getResponse();
        }

    }


    /**
     * @param $model
     * @return $this
     * @throws Remote\Exception
     */
    public function load($model) {

        $query = new Query($this);
        return $query->from($model);
    }


    /**
     * @param Remote\Object $object
     * @return null
     * @throws Exception
     */
    public function save(Object $object) {

        //Saves any properties that don't want to be included in the normal loop (special saving endpoints)
        $this->savePropertiesDirectly($object);

        if($object->isDirty()) {
            $object->validate();

            //In this case it's new
            if($object->hasGUID()) {

                $method = Request::METHOD_POST;
                $uri = sprintf('%s/%s', $object::getResourceURI(), $object->getGUID());

            } else {
                $method = Request::METHOD_PUT;
                $uri = $object::getResourceURI();
            }

            if(!$object::supportsMethod($method))
                throw new Exception('%s doesn\'t support [%s] via the API', get_class($object), $method);

            //Put in an array with the first level containing only the 'root node'.
            $data = array($object::getRootNodeName() => $object->toStringArray());
            $url = new URL($this, $uri);
            $request = new Request($this, $url, $method);

            $request->setBody(Helpers::arrayToXML($data))->send();
            $response = $request->getResponse();

            if(false !== $element = current($response->getElements())) {
                $object->fromStringArray($element);
            }
            //Mark the object as clean since no exception was thrown
            $object->setClean();

            return $response;

        }
    }


    /**
     * @param array $objects
     * @return null
     * @throws Exception
     */
    public function saveAll(array $objects) {

        //Just get one type to compare with, doesn't matter which.
        $current_object = current($objects);
        $type = get_class($current_object);
        $has_guid =  $current_object->hasGUID();
        $object_arrays = array();

        foreach($objects as $object) {
            if($type !== get_class($object)) {
                throw new Exception('Array passed to ->saveAll() must be homogeneous.');
            }

            // Check if we have a GUID
            if($object->hasGUID() && $has_guid === false) {
                $has_guid = true;
            }

            $object_arrays[] = $object->toStringArray();
        }

        $request_method = $has_guid ? Request::METHOD_POST : Request::METHOD_PUT;

        $url = new URL($this, $type::getResourceURI());
        $request = new Request($this, $url, $request_method);

        //This might need to be parsed and stored some day.
        $root_node_name = Helpers::pluralize($type::getRootNodeName());
        $data = array($root_node_name => $object_arrays);

        $request->setBody(Helpers::arrayToXML($data));
        $request->setParameter('SummarizeErrors', 'false');
        $request->send();

        $response = $request->getResponse();

        foreach($response->getElements() as $element_index => $element) {
            if($response->getErrorsForElement($element_index) === null) {
                $objects[$element_index]->fromStringArray($element);
                $objects[$element_index]->setClean();
            }
        }

        return $response;
    }


    /**
     * Function to save properties directly which do not update via a POST
     *
     * This is called automatically from the save method for things like adding contacts to ContactGroups
     *
     * @param Object $object
     * @throws Exception
     */
    private function savePropertiesDirectly(Object $object){
        foreach($object::getProperties() as $property_name => $meta){
            if($meta[Object::KEY_SAVE_DIRECTLY] && $object->isPropertyDirty($property_name)){
                //Then actually save
                $property_objects = $object->$property_name;
                $property_type = get_class(current($property_objects));

                $url = new URL($this, sprintf('%s/%s/%s', $object::getResourceURI(), $object->getGUID(), $property_type::getResourceURI()));
                $request = new Request($this, $url, Request::METHOD_PUT);

                $property_array = array();
                foreach($property_objects as $property_object){
                    $property_array[] = $property_object->toStringArray();
                }

                $root_node_name = Helpers::pluralize($property_type::getRootNodeName());
                $request->setBody(Helpers::arrayToXML(array($root_node_name => $property_array)));

                $request->send();

                $response = $request->getResponse();
                foreach($response->getElements() as $element_index => $element) {
                    if($response->getErrorsForElement($element_index) === null) {
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
     * @param Remote\Object $object
     */
    public function delete(Object $object) {

    }

}
