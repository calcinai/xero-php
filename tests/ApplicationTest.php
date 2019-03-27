<?php

namespace XeroPHP\tests;

use XeroPHP\Application;
use XeroPHP\Application\PrivateApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    protected function setUp()
    {
        $config = [
            'oauth' => [
                'callback' => 'oob',
                'consumer_key' => 'k',
                'consumer_secret' => 's',
                'rsa_private_key' => 'file://certs/private.pem',
                'rsa_public_key' => 'file://certs/public.pem',
            ],
        ];

        $this->application = new PrivateApplication($config);
    }

    public function testGetAuthorizeURL()
    {
        $expectedUrl = $this->application->getOAuthClient()->getAuthorizeURL();
        $this->assertSame($expectedUrl, $this->application->getAuthorizeURL());
        $this->assertSame(
            $expectedUrl.'?oauth_token=test',
            $this->application->getAuthorizeURL('test')
        );
    }
}
