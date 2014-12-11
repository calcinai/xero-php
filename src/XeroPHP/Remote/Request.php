<?php

namespace XeroPHP\Remote;

use XeroPHP\Application;
use XeroPHP\Exception;
use XeroPHP\Helpers;
use XeroPHP\Remote\OAuth\Client;


class Request {

    const METHOD_GET    = 'GET';
    const METHOD_PUT    = 'PUT';
    const METHOD_POST   = 'POST';
    const METHOD_DELETE = 'DELETE';

    const CONTENT_TYPE_XML  = 'text/xml';
    const CONTENT_TYPE_JSON = 'application/json';
    const CONTENT_TYPE_PDF  = 'application/pdf';

    const HEADER_ACCEPT             = 'Accept';
    const HEADER_CONTENT_TYPE       = 'Content-Type';
    const HEADER_CONTENT_LENGTH     = 'Content-Length';
    const HEADER_AUTHORIZATION      = 'Authorization';
    const HEADER_IF_MODIFIED_SINCE  = 'If-Modified-Since';

    private $app;
    private $url;
    private $method;
    private $headers;
    private $parameters;
    private $body;

    /**
     * A hint of what the root elements int he response will be.
     *
     * @var string
     */
    private $resource_hint;


    public function __construct(Application $app, URL $url, $method = self::METHOD_GET){

        $this->app = $app;
        $this->url = $url;
        $this->headers = array();
        $this->parameters = array();
        $this->resource_hint = null;

        switch($method){
            case self::METHOD_GET:
            case self::METHOD_PUT:
            case self::METHOD_POST:
            case self::METHOD_DELETE:
                $this->method = $method;
                break;
            default:
                throw new Exception("Invalid request method [$method]");
        }

        //Default to XML so you get the  xsi:type attribute in the root node.
        $this->setHeader(self::HEADER_ACCEPT, self::CONTENT_TYPE_XML);

    }

    public function send(){

        //Sign the request - this just sets the Authorization header
        $oauth_config = $this->app->getConfig('oauth');
        $oauth_client = new Client($oauth_config);
        $oauth_client->sign($this);

        // configure curl
        $ch = curl_init();
        curl_setopt_array($ch, $this->app->getConfig('curl'));

        curl_setopt($ch, CURLINFO_HEADER_OUT, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $this->getMethod());

        if(isset($this->body)){
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        }

        //build header array.  Don't provide glue so it'll return the array itself.
        //Maybe could be a but cleaner but nice to reuse code.
        $header_array = Helpers::flattenAssocArray($this->getHeaders(), '%s: %s');
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header_array);

        $full_uri = $this->getUrl()->getFullURL();
        //build parameter array - the only time there's a post body is with the XML
        $query_string = Helpers::flattenAssocArray($this->getParameters(), '%s=%s', '&');

        if(strlen($query_string) > 0)
            $full_uri .= "?$query_string";

        curl_setopt($ch, CURLOPT_URL, $full_uri);

        if($this->method === self::METHOD_POST || $this->method === self::METHOD_POST)
            curl_setopt($ch, CURLOPT_POST, true);

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);

        if ($response === false) {
            throw new Exception('Curl error: '.curl_error($ch));
        }

        $response = new Response($this, $response, $info);

        return $response;
    }

    public function setParameter($key, $value){
        $this->parameters[$key] = $value;

        return $this;
    }

    public function getParameters(){
        return $this->parameters;
    }

    /**
     * @param $key string Name of the header
     * @return null|string Header or null if not defined
     */
    public function getHeader($key){
        if(!isset($this->headers[$key]))
            return null;

        return $this->headers[$key];
    }

    public function getHeaders(){
        return $this->headers;
    }


    /**
     * @param $key string Name of the header
     * @param $val string Value of the header
     *
     * @return $this
     */
    public function setHeader($key, $val){
        $this->headers[$key] = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod(){
        return $this->method;
    }

    /**
     * @return URL
     */
    public function getUrl(){
        return $this->url;
    }

    /**
     * @return string
     */
    public function getResourceHint() {

        if($this->resource_hint !== null)
            return $this->resource_hint;

        //Else return the singular of the endpoint, as this is what it's commonly names after.
        return Helpers::singularize($this->url->getEndpoint());
    }

    /**
     * Hint what the response is going to contain for parsing objects into.
     *
     * @param string $resource_hint
     */
    public function setResourceHint($resource_hint) {
        $this->resource_hint = $resource_hint;
    }

    public function setBody($body, $content_type = self::CONTENT_TYPE_XML){

        $this->setHeader(self::HEADER_CONTENT_LENGTH, strlen($body));
        $this->setHeader(self::HEADER_CONTENT_TYPE, $content_type);

        $this->body = $body;

        return $this;
    }


}
