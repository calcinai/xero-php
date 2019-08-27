<?php

namespace XeroPHP\Tests\Remote\OAuth;

use XeroPHP\Application\PrivateApplication;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

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

    public function testNonceIsAString()
    {
        $this->assertInternalType('string', $this->nonce());
    }

    public function testNonceIsTwentyCharacters()
    {
        $this->assertSame(20, strlen($this->nonce()));
    }

    public function testNonceIsAlphaNumeric()
    {
        $this->assertSame(20, preg_match_all('/[A-Z]|[a-z]|[0-9]/', $this->nonce()));
    }

    public function testNoneIsDifferentEachTime()
    {
        $this->assertNotSame($this->nonce(), $this->nonce());
    }

    protected function nonce()
    {
        // this is probably the easiest way to get a nonce from the client
        // as of right now. This could be improved, but that can happen later.
        // Until then, we'll just wrap it up in this method to make the
        // tests a little cleaner to understand what is being tested.

        $url = new URL($this->app(), URL::OAUTH_REQUEST_TOKEN);
        $request = new Request($this->app(), $url);
        $sbs = $this->client()->getSBS($request);
        $parameters = [];

        $parameterString = rawurldecode(explode('&', $sbs)[2]);
        parse_str($parameterString, $parameters);
        return $parameters['oauth_nonce'];
    }

    protected function client($config = [])
    {
        return $this->app($config)->getOAuthClient();
    }

    protected function app($config = [])
    {
        return new PrivateApplication(
            array_merge_recursive([
                'oauth' => [
                    'consumer_key' => 'CONSUMER_KEY',
                    'callback' => 'CALLBACK',
                ],
            ], $config)
        );
    }
}
