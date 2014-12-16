<?php

namespace XeroPHP;

use XeroPHP\Remote\OAuth\Client;
use XeroPHP\Remote\Object;
use XeroPHP\Remote\Query;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

abstract class Application {

    protected static $_config_defaults = array (
        'xero' => array(
            'site'     => 'https://api.xero.com',
            'base_url' => 'https://api.xero.com',

            'core_version'     => '2.0',
            'payroll_version'  => '1.0',
            'file_version'     => '1.0',

            'model_namespace'   => '\\XeroPHP\\Models'
        ),

        //OAuth config
        'oauth' => array(
            'signature_method'      => Client::SIGNATURE_RSA_SHA1,
            'request_token_path'    => 'oauth/RequestToken',
            'access_token_path'     => 'oauth/AccessToken',
            'authorize_path'        => 'oauth/Authorize',
            'signature_location'    => Client::SIGN_LOCATION_HEADER
        ),

        'curl' => array (
            CURLOPT_USERAGENT       => 'XeroPHP',
            CURLOPT_CONNECTTIMEOUT  => 30,
            CURLOPT_TIMEOUT         => 20,
            CURLOPT_SSL_VERIFYPEER  => 2,
            CURLOPT_SSL_VERIFYHOST  => 2,
            CURLOPT_FOLLOWLOCATION  => false,
            CURLOPT_PROXY           => false,
            CURLOPT_PROXYUSERPWD    => false,
            CURLOPT_ENCODING        => '',
        )
    );


    protected $config;
    protected $oauth_client;

    public function __construct(array $user_config){
        //better here for overriding
        $this->config = array_replace_recursive(self::$_config_defaults, static::$_type_config_defaults, $user_config);

        $this->oauth_client = new Client($this->config['oauth']);
    }

    public function getOAuthClient(){
        return $this->oauth_client;
    }



    public function getConfig($key){

        if(!isset($this->config[$key]))
            throw new Exception("Invalid configuration key [$key]");

        return $this->config[$key];
    }


    public function loadByGUID($model, $guid){

        $query = $this->load($model);

        $full_class = $query->getFrom();

        $guid_property = $full_class::getGUIDProperty();
        if($guid_property === null)
            throw new Exception("Class does not have GUID property [$full_class]");

        $objects = $query->where(sprintf('%s=Guid("%s")', $guid_property, $guid))->execute();
        return current($objects);

    }


    public function load($model){

        $query = new Query($this);
        return $query->from($model);
    }


    public function save(Object $object){

        $object->validate();

        if($object->hasGUID() === false)
            return $this->create($object);
        elseif($object->isDirty())
            return $this->update($object);


    }

    private function update(Object $object){

        if(!$object::supportsMethod(Request::METHOD_POST))
            throw new Exception('%s doesn\'t support updating via API', get_class($object));

        //Put in an array with the first level containing only the 'root node'.
        $data = array($object::getRootNodeName() => $object->toStringArray());
        $url = new URL($this, sprintf('%s/%s', $object::getResourceURI(), $object->getGUID()));
        $request = new Request($this, $url, Request::METHOD_POST);

        $request->setBody(Helpers::arrayToXML($data))
                ->send();

        return $request->getResponse();

    }

    private function create(Object $object){

        if(!$object::supportsMethod(Request::METHOD_PUT))
            throw new Exception('%s doesn\'t support creating via API', get_class($object));

        //Put in an array with the first level containing only the 'root node'.
        $data = array($object::getRootNodeName() => $object->toStringArray());
        $url = new URL($this, $object::getResourceURI());
        $request = new Request($this, $url, Request::METHOD_PUT);

        $request->setBody(Helpers::arrayToXML($data))
                ->send();

        return $request->getResponse();
    }

    public function delete(Object $object){

    }

}