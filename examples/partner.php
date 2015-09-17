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
        'signature_location'  => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY
    ),
    'curl' => array(
        CURLOPT_CAINFO          => 'certs/ca-bundle.crt',
        CURLOPT_SSLCERT         => 'certs/entrust-cert.pem',
        CURLOPT_SSLKEYPASSWD    => '1234',
        CURLOPT_SSLKEY          => 'certs/entrust-private.pem'
    )
);

$xero = new PartnerApplication($config);

$oauth_session = getOAuthSession();

// If no session found
if($oauth_session === null){

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

    setOAuthSession($oauth_response['oauth_token'], $oauth_response['oauth_token_secret']);

    printf('<a href="%s">Click here to Authorize</a>', $xero->getAuthorizeURL($oauth_response['oauth_token']));
    exit;

} elseif(isset($oauth_session['session_handle']) && !isset($oauth_session['expires'])) {
    // If session is expired refresh the token
    $url = new URL($xero, URL::OAUTH_ACCESS_TOKEN);
    $request = new Request($xero, $url);

    $request->setParameter('oauth_token', $oauth_session['token']);
    $request->setParameter('oauth_session_handle', $oauth_session['session_handle']);

    $request->send();
    $oauth_response = $request->getResponse()->getOAuthResponse();

    $expires = time() + intval($oauth_response['oauth_expires_in']);

    setOAuthSession($oauth_response['oauth_token'], $oauth_response['oauth_token_secret'], $expires, $oauth_response['oauth_session_handle']);

    $xero->getOAuthClient()
        ->setToken($oauth_response['oauth_token'])
        ->setTokenSecret($oauth_response['oauth_token_secret']);

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

        $expires = time() + intval($oauth_response['oauth_expires_in']);

        setOAuthSession($oauth_response['oauth_token'], $oauth_response['oauth_token_secret'], $expires, $oauth_response['oauth_session_handle']);

        //drop the qs
        $uri_parts = explode('?', $_SERVER['REQUEST_URI']);

        //Just for demo purposes
        header(sprintf('Location: http%s://%s%s', (isset($_SERVER['HTTPS']) ? 's' : ''), $_SERVER['HTTP_HOST'], $uri_parts[0]));
        exit;

    }
}

// We are in! Print organisation details...
print_r($xero->load('Accounting\\Organisation')->execute());

//The following two functions are just for a demo - you should use a more robust mechanism of storing tokens than this!
function setOAuthSession($token, $secret, $expires = null, $session_handle = null){
    $_SESSION['oauth'] = array(
        'token' => $token,
        'token_secret' => $secret,
        'expires' => $expires,
        'session_handle' => $session_handle
    );
}

function getOAuthSession(){
    //If it doesn't exist, return null
    if(!isset($_SESSION['oauth'])) {
        return null;
    }

    // If the session is expired or expiring, unset the expires key
    if($_SESSION['oauth']['expires'] !== null && $_SESSION['oauth']['expires'] <= (time() + 100)) {
        unset($_SESSION['oauth']['expires']);
    }

    return $_SESSION['oauth'];
}
