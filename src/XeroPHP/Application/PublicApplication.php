<?php

namespace XeroPHP\Application;

use XeroPHP\Application;
use XeroPHP\Remote\OAuth\Client;

class PublicApplication extends Application {

    protected static $_type_config_defaults = array(
        'oauth' => array(
            'signature_method' => Client::SIGNATURE_HMAC_SHA1,
        ),
    );
}