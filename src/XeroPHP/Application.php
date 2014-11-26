<?php

namespace XeroPHP;

use XeroPHP\Remote\OAuth\Client;

abstract class Application {

    protected static $_config_defaults = array (
        'xero' => array(
            'site'     => 'https://api.xero.com',
            'base_url' => 'https://api.xero.com',

            'core_version'     => '2.0',
            'payroll_version'  => '1.0',
            'file_version'     => '1.0'
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

    public function __construct(array $user_config){
        //better here for overriding
        $this->config = array_replace_recursive(self::$_config_defaults, static::$_type_config_defaults, $user_config);
    }

    public function getConfig($key){

        if(!isset($this->config[$key]))
            throw new Exception("Invalid configuration key [$key]");

        return $this->config[$key];
    }

}