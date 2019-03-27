<?php

namespace XeroPHP\tests\Application;

use XeroPHP\Application\PartnerApplication;

class PartnerApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $config = [
            'oauth' => [
                'callback' => 'http://localhost/',
                'consumer_key' => 'k',
                'consumer_secret' => 's',
                'rsa_private_key' => 'file://certs/privatekey.pem',
                //'signature_location'  => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY
            ],
            'curl' => [
                CURLOPT_CAINFO => 'certs/ca-bundle.crt',
            ],
        ];

        new PartnerApplication($config);
    }
}
