<?php

namespace XeroPHP\Application;

use XeroPHP\Application;

class PrivateApplication extends Application
{
    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        //As we don't need to Authorize/RequestToken, it's populated here.
        $config['oauth']['token'] = $config['oauth']['consumer_key'];

        parent::__construct($config);
    }
}
