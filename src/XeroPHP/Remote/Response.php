<?php

namespace XeroPHP\Remote;

use SimpleXMLElement;

use XeroPHP\Exception;
use XeroPHP\Helpers;

use XeroPHP\Remote\Exception\BadRequestException;
use XeroPHP\Remote\Exception\InternalErrorException;
use XeroPHP\Remote\Exception\NotFoundException;
use XeroPHP\Remote\Exception\RateLimitExceededException;
use XeroPHP\Remote\Exception\UnauthorizedException;

class Response {

    const STATUS_OK				= 200;
    const STATUS_BAD_REQUEST	= 400;
    const STATUS_UNAUTHORISED	= 401;
    const STATUS_FORBIDDEN		= 403;
    const STATUS_NOT_FOUND		= 404;
    const STATUS_INTERNAL_ERROR	     = 500;
    const STATUS_NOT_IMPLEMENTED     = 501;
    const STATUS_RATE_LIMIT_EXCEEDED = 503;
    const STATUS_NOT_AVAILABLE		 = 503;

    private $request;

    private $status;
    private $content_type;
    private $response_body;

    private $elements;

    private $element_errors;
    private $element_warnings;

    private $root_error;

    public function __construct(Request $request, $response_body, array $curl_info){

        $this->request = $request;
        $this->response_body = $response_body;
        $this->status = $curl_info['http_code'];

        list($this->content_type) = explode(';', $curl_info['content_type']);
        $this->parseBody();

        switch($this->status) {
            case Response::STATUS_BAD_REQUEST:
                $message = sprintf('%s (%s)', $this->root_error['message'], implode(', ', $this->element_errors));
                throw new BadRequestException($message, $this->root_error['code']);
            case Response::STATUS_UNAUTHORISED:
            case Response::STATUS_FORBIDDEN:
                throw new UnauthorizedException();
            case Response::STATUS_NOT_FOUND:
                throw new NotFoundException();
            case Response::STATUS_INTERNAL_ERROR:
            case Response::STATUS_NOT_IMPLEMENTED:
                throw new InternalErrorException();
            case Response::STATUS_RATE_LIMIT_EXCEEDED:
                throw new RateLimitExceededException();

        }

    }

    public function getElements(){
        return $this->elements;
    }

    public function getElementErrors(){
        return $this->element_errors;
    }

    public function getElementWarnings(){
        return $this->element_warnings;
    }

    public function getRootError(){
        return $this->root_error;
    }

    public function parseBody(){

        $this->elements = array();
        $this->element_errors = array();
        $this->element_warnings = array();
        $this->root_error = array();

        switch($this->content_type){
            case Request::CONTENT_TYPE_XML:
                self::parseXML();
                break;
            case Request::CONTENT_TYPE_JSON:
                self::parseJSON();
                break;

            default:
                throw new Exception("Parsing method not implemented for [{$this->content_type}]");
        }

        foreach($this->elements as $element)
            $this->findElementErrors($element);
    }


    public function findElementErrors($element){
        foreach($element as $property => $value){
            switch((string) $property){
                case 'ValidationErrors':
                    if(is_array($value)){
                        foreach($value as $error)
                            $this->element_errors[] = trim($error['Message'], '.');
                    }
                    break;
                case 'Warnings':
                    if(is_array($value)){
                        foreach($value as $warning)
                            $this->element_warnings[] = trim($warning['Message'], '.');
                    }
                    break;

                default:
                    if(is_array($value)){
                        $this->findElementErrors($value);
                    }
            }
        }
    }


    public function parseXML(){

        $sxml = new SimpleXMLElement($this->response_body);
        $root_error = array();

        // For lack of a better way to find the elements returned (every time)
        // XML has an array 2 levels deep due to its non-unique key nature.
        foreach($sxml as $child_index => $root_child){

            switch($child_index){
                case 'ErrorNumber':
                    $this->root_error['code'] = (string) $root_child;
                    break;
                case 'Type':
                    $this->root_error['type'] = (string) $root_child;
                    break;
                case 'Message':
                    $this->root_error['message'] = (string) $root_child;
                    break;

                default:
                    //Happy to make the assumption that there will only be one root node with > than 2D children.
                    foreach($root_child->children() as $element_index => $element)
                        $this->elements[] = Helpers::XMLToArray($element);
            }
        }

    }

    public function parseJSON(){
        $json = json_decode($this->response_body, true);
        $root_error = array();

        foreach($json as $child_index => $root_child){

            switch($child_index){
                case 'ErrorNumber':
                    $this->root_error['code'] = $root_child;
                    break;
                case 'Type':
                    $this->root_error['type'] = $root_child;
                    break;
                case 'Message':
                    $this->root_error['message'] = $root_child;
                    break;

                default:
                    //Happy to make the assumption that there will only be one root node with > than 2D children.
                    if(is_array($root_child))
                        foreach($root_child as $element)
                            $this->elements[] = $element;
            }
        }

    }


} 