<?php

namespace XeroPHP\tests\Application;

use XeroPHP\Application\PublicApplication;

class PublicApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $config = [
            'oauth' => [
                'callback' => 'http://localhost/',
                'consumer_key' => 'k',
                'consumer_secret' => 's',
            ],
            'curl' => [
                CURLOPT_CAINFO => __DIR__.'/certs/ca-bundle.crt',
            ],
        ];

        new PublicApplication($config);
    }
}
