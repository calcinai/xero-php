<?php

namespace XeroPHP\Application;

use XeroPHP\Application;
use XeroPHP\Remote\OAuth\Client;

class PublicApplication extends Application
{
    public function __construct($config)
    {
        $config['oauth']['signature_method'] = Client::SIGNATURE_HMAC_SHA1;

        parent::__construct($config);
    }
}
