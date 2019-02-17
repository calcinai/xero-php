<?php

namespace XeroPHP\Tests\Remote\OAuth;

use XeroPHP\Application\PrivateApplication;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function testAuthorizeUrlWithoutOauthToken()
    {
        $this->assertSame(
            $this->app()->getConfigOption('oauth', 'authorize_url'),
            $this->client()->getAuthorizeURL()
        );
    }

    public function testAuthorizeUrlAppendsOauthTokenQueryString()
    {
        $this->assertSame(
            $this->app()->getConfigOption('oauth', 'authorize_url').'?oauth_token=query_test',
            $this->client()->getAuthorizeURL('query_test')
        );
    }

    public function testAuthorizeUrlAppendsOauthTokenQueryStringToExistingQueryString()
    {
        $url = 'https://test.url/?example=query';

        $this->assertSame(
            $url.'&oauth_token=query_test',
            $this->client(['oauth' => ['authorize_url' => $url]])->getAuthorizeURL('query_test')
        );
    }

    protected function client($config = [])
    {
        return $this->app($config)->getOAuthClient();
    }

    protected function app($config = [])
    {
        return  new PrivateApplication(
            array_merge_recursive([
                'oauth' => ['consumer_key' => 'CONSUMER_KEY'],
            ], $config)
        );
    }
}
