<?php

namespace XeroPHP\Remote;

use XeroPHP\Application;

/**
 * Object for representing a complete endpoint on the Xero APIs.  It also handles special URLs that may be passed in, eg
 * OAuth related ones.
 *
 * Class URL
 *
 * @author Michael Calcinai
 */
class URL
{
    const API_CORE = 'api.xro';

    const API_PAYROLL = 'payroll.xro';

    const API_FILE = 'files.xro';

    const API_ASSET = 'assets.xro';

    const API_PRACTICE_MANAGER = 'practicemanager';

    const OAUTH_REQUEST_TOKEN = 'RequestToken';

    const OAUTH_ACCESS_TOKEN = 'AccessToken';

    /**
     * @var string The base API URL for the ap type
     */
    private $base_url;

    private $endpoint;

    /**
     * @var string the path
     */
    private $path;

    /**
     * @param Application $app
     * @param $endpoint
     * @param string|null $api
     *
     * @throws Exception
     * @throws \XeroPHP\Exception
     */
    public function __construct(Application $app, $endpoint, $api = null)
    {
        //Handle full URLs and pull them back apart.
        //Annoying internal references are http??? and absolute.
        if (strpos($endpoint, 'http') === 0) {
            if (preg_match('@^http(s)?://[^/]+/(?<api>[^/]+)/(?<version>[^/]+)/(?<endpoint>.+)$@i', $endpoint, $matches)) {
                $endpoint = $matches['endpoint'];
                $api = $matches['api'];
                //$version = $matches['version'];
            }
        }

        if ($api === null) {
            //default to core API for backward compatibility
            $api = self::API_CORE;
        }

        //This contains API versions and base URLs
        $xero_config = $app->getConfig('xero');
        $this->base_url = $xero_config['base_url'];
        $this->endpoint = $endpoint;

        //Check here that the URI hasn't been set by one of the OAuth methods and handle as normal
        if (!isset($this->path)) {
            switch ($api) {
                case self::API_CORE:
                    $version = $xero_config['core_version'];

                    break;
                case self::API_PAYROLL:
                    $version = $xero_config['payroll_version'];

                    break;
                case self::API_FILE:
                    $version = $xero_config['file_version'];

                    break;
                case self::API_PRACTICE_MANAGER:
                    $version = $xero_config['practice_manager_version'];

                    break;
                default:
                    throw new Exception('Invalid API passed to XeroPHP\\URL::__construct(). Must be XeroPHP\\URL::API_*');
            }

            $this->path = sprintf('%s/%s/%s', $api, $version, $this->endpoint);
        }
    }

    /**
     * @return string
     */
    public function getFullURL()
    {
        return sprintf('%s/%s', $this->base_url, $this->path);
    }
}
