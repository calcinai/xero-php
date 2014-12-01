<?php

namespace XeroPHP\Remote;

class Response {

    const STATUS_OK				= 200;
    const STATUS_BAD_REQUEST	= 400;
    const STATUS_NO_AUTH		= 401;
    const STATUS_NOT_FOUND		= 404;
    const STATUS_ERROR			= 500;

    private $status;
    private $response_body;
    private $response_parsed;

    public function __construct($response_body, array $curl_info){

        $this->response_body = $response_body;
        $this->status = $curl_info['http_code'];

        $content_type = substr($curl_info['content_type'], 0, strrpos($curl_info['content_type'], ';'));
        $this->parseBody($content_type);

        switch($this->status){
            case self::STATUS_BAD_REQUEST:
            case self::STATUS_NO_AUTH:
            case self::STATUS_NOT_FOUND:
            case self::STATUS_ERROR:
                foreach($this->response_parsed->Elements as $element)
                    if(isset($element->HasValidationErrors) && $element->HasValidationErrors == true)
                        throw new Exception($element->ValidationErrors[0]->Message, $this->response_parsed->ErrorNumber);
                    //This can be improved.  There doesn't seem to be a lot of documentation on what makes up errors

                throw new Exception($this->response_parsed->Message, $this->response_parsed->ErrorNumber);
        }

    }

    public function getPayload(){
        return $this->response_parsed;
    }

    public function parseBody($content_type){
        switch($content_type){
            case Request::CONTENT_TYPE_XML:
                $data = self::parseXML($this->response_body);
                break;
            case Request::CONTENT_TYPE_JSON:
                $data = self::parseJSON($this->response_body);
                break;
            default:
                throw new Exception("Parsing method not implemented for [$content_type]");
        }

        $this->response_parsed = $data;
    }


    public static function parseXML($xml){
        return new SimpleXMLElement($xml);
    }

    public static function parseJSON($json){
        return json_decode($json);
    }

} 