<?php

namespace XeroPHP\Remote\OAuth;

use XeroPHP\Exception;
use XeroPHP\Helpers;
use XeroPHP\Remote\OAuth\SignatureMethod\HMACSHA1;
use XeroPHP\Remote\OAuth\SignatureMethod\PLAINTEXT;
use XeroPHP\Remote\OAuth\SignatureMethod\RSASHA1;
use XeroPHP\Remote\Request;

/**
 * This is a class to manage a client OAuth session with the Xero APIs. It's loosely based on the functionality of
 * the SimpleOAuth class, which comes in the recommended php developer kit.
 *
 * @author Michael Calcinai
 * @package XeroPHP\Remote\OAuth
 */
class Client {

    //Supported hashing mechanisms
    const SIGNATURE_RSA_SHA1  = 'RSA-SHA1';
    const SIGNATURE_HMAC_SHA1 = 'HMAC-SHA1';
    const SIGNATURE_PLAINTEXT = 'PLAINTEXT';

    const OAUTH_VERSION = '1.0';

    const SIGN_LOCATION_HEADER = 'header';
    const SIGN_LOCATION_QUERY  = 'query_string';

    private $config;
    private $request;

    /*
     * "Cached" parameters - will change between signings.
     */
    private $oauth_params;

    private $token_secret;
    private $verifier;

    /**
     * @param array $config OAuth config
     */
    public function __construct(array $config) {
        $this->config = $config;
    }


    /**
     * This actually signs the request.  It can be called multiple times (for different requests) on the same instance
     * of the client.  This method puts it in the oauth params in the Authorization header by default.
     *
     * @param Request $request Request to sign
     * @throws Exception
     */
    public function sign(Request $request) {

        $this->request = $request;

        $oauth_params = $this->getOAuthParams();
        $oauth_params['oauth_signature'] = $this->getSignature();

        //put it where it needs to go in the request
        switch($this->config['signature_location']) {
            case self::SIGN_LOCATION_HEADER:
                //Needs escaping in the header, not in the QS
                $oauth_params['oauth_signature'] = Helpers::escape($oauth_params['oauth_signature']);

                $header = 'OAuth ' . Helpers::flattenAssocArray($oauth_params, '%s="%s"', ', ');
                $request->setHeader(Request::HEADER_AUTHORIZATION, $header);
                break;

            case self::SIGN_LOCATION_QUERY:
                foreach($oauth_params as $param_name => $param_value)
                    $request->setParameter($param_name, $param_value);
                break;

            default:
                throw new Exception('Invalid signing location specified.');
        }

        //Reset so this instance of the Client can sign subsequent requests.  Mainly for the nonce.
        $this->resetOAuthParams();
    }


    /**
     * Resets the instance for subsequent signing requests.
     */
    private function resetOAuthParams() {
        unset($this->oauth_params);
    }

    /**
     * Gets the skeleton Oauth parameter array.  The only one missing is the actual oauth_signature, which should get
     * populated from this data and then merged into it.
     *
     * @return array
     */
    private function getOAuthParams() {
        //this needs to be stateful until the request is signed, then it gets unset
        if(!isset($this->oauth_params)) {
            $this->oauth_params = array(
                'oauth_consumer_key'     => $this->getConsumerKey(),
                'oauth_signature_method' => $this->getSignatureMethod(),
                'oauth_timestamp'        => $this->getTimestamp(),
                'oauth_nonce'            => $this->getNonce(),
                'oauth_callback'         => $this->getCallback(),
                'oauth_version'          => self::OAUTH_VERSION
            );

            if(null !== $token = $this->getToken())
                $this->oauth_params['oauth_token'] = $token;

            if(null !== $verifier = $this->getVerifier())
                $this->oauth_params['oauth_verifier'] = $verifier;

        }

        return $this->oauth_params;
    }


    /**
     * Call the appropriate signature method's signing function.  Not all mechanisms use all of the parameters, but for
     * consistency, pass the same constructor to each one.
     *
     * @return string
     * @throws Exception
     */
    private function getSignature() {

        switch($this->getSignatureMethod()) {
            case self::SIGNATURE_RSA_SHA1:
                $signature = RSASHA1::generateSignature($this->config, $this->getSBS(), $this->getSigningSecret());
                break;
            case self::SIGNATURE_HMAC_SHA1:
                $signature = HMACSHA1::generateSignature($this->config, $this->getSBS(), $this->getSigningSecret());
                break;
            case self::SIGNATURE_PLAINTEXT:
                $signature = PLAINTEXT::generateSignature($this->config, $this->getSBS(), $this->getSigningSecret());
                break;
            default:
                throw new Exception("Invalid signature method [{$this->config['signature_method']}]");
        }

        return $signature;
    }


    /**
     * Get the Signature Base String for signing.  This is basically just all params (including the generated oauth ones)
     * ordered by key, then concatenated with the method and URL
     * GET&https%3A%2F%2Fapi.xero.com%2Fapi.xro%2F2.0%2FContacts&oauth_consumer etc.
     *
     * @return string
     */
    public function getSBS() {

        $oauth_params = $this->getOAuthParams();
        $request_params = $this->request->getParameters();

        $sbs_params = array_merge($request_params, $oauth_params);
        //Params need sorting so signing order is the same
        ksort($sbs_params);
        $sbs_string = Helpers::flattenAssocArray($sbs_params, '%s=%s', '&', true);

        $url = $this->request->getUrl()->getFullURL();

        //Every second thing seems to need escaping!
        return sprintf('%s&%s&%s', $this->request->getMethod(), Helpers::escape($url), Helpers::escape($sbs_string));
    }

    /**
     * This is the signing secret passed to HMAC and PLAINTEXT signing mechanisms.
     *
     * @return string
     */
    private function getSigningSecret() {
        $secret = $this->getConsumerSecret() . '&';

        if(null !== $token_secret = $this->getTokenSecret())
            $secret .= $token_secret;

        return $secret;
    }


    /**
     * Generic nonce generating function for the request.  It's important that it's long enough as the spec says the
     * server will reject any request that reuses one.
     *
     * @param int $length
     * @return string
     */
    private function getNonce($length = 20) {
        $nonce = '';

        for($i = 0; $i < $length; $i++) {
            $nonce .= base_convert(mt_rand(0, 35), 10, 36);
        }
        return $nonce;
    }


    /**
     * @return int
     */
    private function getTimestamp() {
        return time();
    }

    public function setToken($token) {
        $this->config['token'] = $token;

        return $this;
    }

    public function getToken() {
        if(isset($this->config['token']))
            return $this->config['token'];

        return null;
    }

    /**
     * @return string
     */
    private function getConsumerKey() {
        return $this->config['consumer_key'];
    }

    /**
     * @return string
     */
    private function getConsumerSecret() {
        return $this->config['consumer_secret'];
    }

    /**
     * @return string
     */
    private function getCallback() {
        return $this->config['callback'];
    }

    /**
     * @return string
     */
    private function getSignatureMethod() {
        return $this->config['signature_method'];
    }

    /**
     * @return string
     */
    public function getAuthorizeURL(){
        return $this->config['authorize_url'];
    }


    //Populated during 3-legged auth

    public function setTokenSecret($secret) {
        $this->token_secret = $secret;

        return $this;
    }

    public function getTokenSecret() {
        if(isset($this->token_secret))
            return $this->token_secret;

        return null;
    }

    public function setVerifier($verifier) {
        $this->verifier = $verifier;

        return $this;
    }

    public function getVerifier() {
        if(isset($this->verifier))
            return $this->verifier;

        return null;
    }


}
