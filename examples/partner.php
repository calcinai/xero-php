<?php

use XeroPHP\Application\PartnerApplication;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

// Start a session for the oauth session storage
session_start();

//These are the minimum settings - for more options, refer to examples/config.php
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

$xero = new PartnerApplication($config);

//if no session or if it is expired
if(null === $oauth_session = getOAuthSession()){

    $url = new URL($xero, URL::OAUTH_REQUEST_TOKEN);
    $request = new Request($xero, $url);

    //Here's where you'll see if your keys are valid.  You can catch a BadRequestException.
    try {
        $request->send();
    } catch (Exception $e){
        echo($e->getCode());
        print_r($request->getResponse()->getOAuthResponse());
    }

    $oauth_response = $request->getResponse()->getOAuthResponse();
    $url = new URL($xero, URL::OAUTH_AUTHORIZE);

    setOAuthSession($oauth_response['oauth_token'], $oauth_response['oauth_token_secret']);

    printf('<a href="%s?oauth_token=%s">Click here to Authorize</a>', $url->getAuthorizeURL(), $oauth_response['oauth_token']);
    exit;

} else {

    $xero->getOAuthClient()
        ->setToken($oauth_session['token'])
        ->setTokenSecret($oauth_session['token_secret']);

    if(isset($_REQUEST['oauth_verifier'])){
        $xero->getOAuthClient()->setVerifier($_REQUEST['oauth_verifier']);

        $url = new URL($xero, URL::OAUTH_ACCESS_TOKEN);
        $request = new Request($xero, $url);

        $request->send();
        $oauth_response = $request->getResponse()->getOAuthResponse();

        setOAuthSession($oauth_response['oauth_token'], $oauth_response['oauth_token_secret'], $oauth_response['expires']);

        //drop the qs
        $uri_parts = explode('?', $_SERVER['REQUEST_URI']);

        //Just for demo purposes
        header(sprintf('Location: http%s://%s%s', (isset($_SERVER['HTTPS']) ? 's' : ''), $_SERVER['HTTP_HOST'], $uri_parts[0]));
        exit;

    }
}

// We are in! Grab some journals...
$journals = $xero->load('Accounting\\Journal')->execute();
echo sprintf('Found %s journals', count($journals));
/*
foreach ($journals as $journal) {
    print_r($journal);
}
*/

//The following two functions are just for a demo - you should use a more robust mechanism of storing tokens than this!
function setOAuthSession($token, $secret, $expires = null){
    $_SESSION['oauth'] = array(
        'token' => $token,
        'token_secret' => $secret,
        'expires' => $expires
    );
}

function getOAuthSession(){
    //If it doesn't exist or is expired, return null
    if(!isset($_SESSION['oauth']) || ($_SESSION['oauth']['expires'] !== null && $_SESSION['oauth']['expires'] <= time()))
        return null;

    return $_SESSION['oauth'];
}