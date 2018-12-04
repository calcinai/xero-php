<?php

namespace XeroPHP\Tests\Remote\OAuth;

use XeroPHP\Application\PrivateApplication;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    public function test_authorize_url_without_oauth_token()
    {
        $this->assertSame(
            $this->app()->getConfigOption('oauth', 'authorize_url'),
            $this->client()->getAuthorizeURL()
        );
    }

    public function test_authorize_url_appends_oauth_token_query_string()
    {
        $this->assertSame(
            $this->app()->getConfigOption('oauth', 'authorize_url').'?oauth_token=query_test',
            $this->client()->getAuthorizeURL('query_test')
        );
    }

    public function test_authorize_url_appends_oauth_token_query_string_to_existing_query_string()
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
