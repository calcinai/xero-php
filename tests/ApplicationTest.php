<?php

namespace XeroPHP\Tests;

use XeroPHP\Application;
use XeroPHP\Application\PrivateApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    public function setUp()
    {
        $config = array(
            'oauth' => array(
                'callback'    => 'oob',
                'consumer_key'      => 'k',
                'consumer_secret'   => 's',
                'rsa_private_key'  => 'file://certs/private.pem',
                'rsa_public_key'   => 'file://certs/public.pem'
            )
        );

        $this->application = new PrivateApplication($config);
    }

    public function testGetAuthorizeURL()
    {
        $expectedUrl = $this->application->getOAuthClient()->getAuthorizeURL();
        $this->assertEquals($expectedUrl, $this->application->getAuthorizeURL());
        $this->assertEquals($expectedUrl . '?oauth_token=test', $this->application->getAuthorizeURL('test'));
    }
}
