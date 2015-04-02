<?php

namespace XeroPHP\Remote;

use XeroPHP\Application;
use XeroPHP\Exception;

/**
 * Object for representing a complete endpoint on the Xero APIs.  It also handles special URLs that may be passed in, eg
 * OAuth related ones.
 *
 * Class URL
 * @author Michael Calcinai
 * @package XeroPHP\Remote
 */
class URL {

    const API_CORE    = 'api.xro';
    const API_PAYROLL = 'payroll.xro';
    const API_FILE    = 'file.xro';

    const OAUTH_AUTHORIZE     = 'Authorize';
    const OAUTH_REQUEST_TOKEN = 'RequestToken';
    const OAUTH_ACCESS_TOKEN  = 'AccessToken';

    /**
     * @var string The base API URL for the ap type
     */
    private $base_url;
    private $endpoint;

    private $is_oauth;

    /**
     * @var string the path
     */
    private $path;

    /**
     * @param Application $app
     * @param $endpoint
     * @param null $api
     * @throws \XeroPHP\Exception
     */
    public function __construct(Application $app, $endpoint, $api = null) {

        if($api === null) {
            //Assume that it's an OAuth endpoint if no API is given.
            //If this becomes an issue it can just check every time, but it seems a little redundant
            $oauth_endpoints = $app->getConfig('oauth');
            $this->is_oauth = false;

            switch($endpoint) {
                case self::OAUTH_AUTHORIZE:
                    $this->path = $oauth_endpoints['authorize_path'];
                    $this->is_oauth = true;
                    break;
                case self::OAUTH_REQUEST_TOKEN:
                    $this->path = $oauth_endpoints['request_token_path'];
                    $this->is_oauth = true;
                    break;
                case self::OAUTH_ACCESS_TOKEN:
                    $this->path = $oauth_endpoints['access_token_path'];
                    $this->is_oauth = true;
                    break;
                default:
                    //default to core API for backward compatibility
                    $api = self::API_CORE;
            }
        }


        //This contains API versions and base URLs
        $xero_config = $app->getConfig('xero');
        $this->base_url = $xero_config['base_url'];
        $this->authorize_url = $xero_config['authorize_url'];
        $this->endpoint = $endpoint;

        //Check here that the URI hasn't been set by one of the OAuth methods and handle as normal
        if(!isset($this->path)) {
            switch($api) {
                case self::API_CORE:
                    $version = $xero_config['core_version'];
                    break;
                case self::API_PAYROLL:
                    $version = $xero_config['payroll_version'];
                    break;
                case self::API_FILE:
                    $version = $xero_config['file_version'];
                    break;
                default:
                    throw new Exception('Invalid API passed to XeroPHP\URL::__construct(). Must be XeroPHP\URL::API_*');
            }

            $this->path = sprintf('%s/%s/%s', $api, $version, $this->endpoint);
        }
    }


    public function isOAuth() {
        return $this->is_oauth;
    }

    /**
     * @return string
     */
    public function getFullURL() {
        return sprintf('%s/%s', $this->base_url, $this->path);
    }

    /**
     * @return string
     */
    public function getAuthorizeURL() {
        return sprintf('%s/%s', $this->authorize_url, $this->path);
    }


}