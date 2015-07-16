<?php

namespace XeroPHP\Tests\Application;

use XeroPHP\Application\PartnerApplication;

class PartnerApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testNewInstance()
    {
        $config = array(
            'oauth' => array(
                'callback'              => 'http://localhost/',
                'consumer_key'          => 'k',
                'consumer_secret'       => 's',
                'rsa_private_key'       => 'file://certs/privatekey.pem',
                //'signature_location'  => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY
            ),
            'curl' => array(
                CURLOPT_CAINFO          => 'certs/ca-bundle.crt',
                CURLOPT_SSLCERT         => 'certs/entrust-cert.pem',
                CURLOPT_SSLKEYPASSWD    => '1234',
                CURLOPT_SSLKEY          => 'certs/entrust-private.pem'
            )
        );

        new PartnerApplication($config);
    }
}
