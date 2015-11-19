<?php

namespace XeroPHP\Remote;

use SimpleXMLElement;
use XeroPHP\Exception;
use XeroPHP\Helpers;
use XeroPHP\Remote\Exception\BadRequestException;
use XeroPHP\Remote\Exception\InternalErrorException;
use XeroPHP\Remote\Exception\NotAvailableException;
use XeroPHP\Remote\Exception\NotFoundException;
use XeroPHP\Remote\Exception\NotImplementedException;
use XeroPHP\Remote\Exception\OrganisationOfflineException;
use XeroPHP\Remote\Exception\RateLimitExceededException;
use XeroPHP\Remote\Exception\UnauthorizedException;

class Response {

    const STATUS_OK                   = 200;
    const STATUS_BAD_REQUEST          = 400;
    const STATUS_UNAUTHORISED         = 401;
    const STATUS_FORBIDDEN            = 403;
    const STATUS_NOT_FOUND            = 404;
    const STATUS_INTERNAL_ERROR       = 500;
    const STATUS_NOT_IMPLEMENTED      = 501;

    //Seriously, 1 code for 3 different things!
    const STATUS_NOT_AVAILABLE        = 503;
    const STATUS_RATE_LIMIT_EXCEEDED  = 503;
    const STATUS_ORGANISATION_OFFLINE = 503;

    private $request;

    private $status;
    private $content_type;
    private $response_body;

    private $oauth_response;

    private $elements;

    private $element_errors;
    private $element_warnings;

    private $root_error;

    public function __construct(Request $request, $response_body, array $curl_info) {

        $this->request = $request;
        $this->response_body = $response_body;
        $this->status = $curl_info['http_code'];

        list($this->content_type) = explode(';', $curl_info['content_type']);
    }

    /**
     * @throws BadRequestException
     * @throws Exception
     * @throws InternalErrorException
     * @throws NotAvailableException
     * @throws NotFoundException
     * @throws NotImplementedException
     * @throws OrganisationOfflineException
     * @throws RateLimitExceededException
     * @throws UnauthorizedException
     */
    public function parse() {

        $this->parseBody();

        switch($this->status) {
            case Response::STATUS_BAD_REQUEST:
                //This catches actual app errors
                if(isset($this->root_error)) {
                    $message = sprintf('%s (%s)', $this->root_error['message'], implode(', ', $this->element_errors));
                    $message .= $this->parseBadRequest();
                    throw new BadRequestException($message, $this->root_error['code']);
                } else {
                    throw new BadRequestException();
                }

            /** @noinspection PhpMissingBreakStatementInspection */
            case Response::STATUS_UNAUTHORISED:
                //This is where OAuth errors end up, this could maybe change to an OAuth exception
                if(isset($this->oauth_response['oauth_problem_advice'])) {
                    throw new UnauthorizedException($this->oauth_response['oauth_problem_advice']);
                }
            case Response::STATUS_FORBIDDEN:
                throw new UnauthorizedException();

            case Response::STATUS_NOT_FOUND:
                throw new NotFoundException();

            case Response::STATUS_INTERNAL_ERROR:
                throw new InternalErrorException();

            case Response::STATUS_NOT_IMPLEMENTED:
                throw new NotImplementedException();

            case Response::STATUS_NOT_AVAILABLE:
            case Response::STATUS_RATE_LIMIT_EXCEEDED:
            case Response::STATUS_ORGANISATION_OFFLINE:
                //There must be a better way than this?
                $response = urldecode($this->response_body);
                if(false !== stripos($response, 'Organisation is offline')){
                    throw new OrganisationOfflineException();
                } elseif(false !== stripos($response, 'Rate limit exceeded')){
                    throw new RateLimitExceededException();
                } else {
                    throw new NotAvailableException();
                }
        }
    }

	/**
	 * @return string
	 */
	private function parseBadRequest(){
		if (isset($this->elements)){
			$field_errors = [];
			foreach ($this->elements as $n => $element){
				if (isset($element['ValidationErrors'])){
					$errors[] = $element['ValidationErrors'][0]['Message'];
				}
			}
			return "\nValidation errors:\n".implode("\n", $errors);
		}
		return '';
	}

    public function getResponseBody(){
        return $this->response_body;
    }

    public function getElements() {
        return $this->elements;
    }

    public function getErrorsForElement($element_id) {
        if(isset($this->element_errors[$element_id])) {
            return $this->element_errors[$element_id];
        }

        return null;
    }

    public function getElementErrors() {
        return $this->element_errors;
    }

    public function getElementWarnings() {
        return $this->element_warnings;
    }

    public function getRootError() {
        return $this->root_error;
    }

    public function getOAuthResponse() {
        return $this->oauth_response;
    }

    public function parseBody() {

        if($this->request->getUrl()->isOAuth()){
            $this->parseHTML();
            return;
        }

        $this->elements = array();
        $this->element_errors = array();
        $this->element_warnings = array();
        $this->root_error = array();

        switch($this->content_type) {
            case Request::CONTENT_TYPE_XML:
                $this->parseXML();
                break;

            case Request::CONTENT_TYPE_JSON:
                $this->parseJSON();
                break;

            case Request::CONTENT_TYPE_HTML:
                $this->parseHTML();
                break;

            default:
                //Don't try to parse anything else.
                return;
        }

        foreach($this->elements as $index => $element)
            $this->findElementErrors($element, $index);
    }


    public function findElementErrors($element, $element_index) {
        foreach($element as $property => $value) {
            switch((string) $property) {
                case 'ValidationErrors':
                    if(is_array($value)) {
                        foreach($value as $error)
                            $this->element_errors[$element_index] = trim($error['Message'], '.');
                    }
                    break;
                case 'Warnings':
                    if(is_array($value)) {
                        foreach($value as $warning)
                            $this->element_warnings[$element_index] = trim($warning['Message'], '.');
                    }
                    break;

                default:
                    if(is_array($value)) {
                        $this->findElementErrors($value, $element_index);
                    }
            }
        }
    }


    public function parseXML() {

        $sxml = new SimpleXMLElement($this->response_body);

        // For lack of a better way to find the elements returned (every time)
        // XML has an array 2 levels deep due to its non-unique key nature.
        /** @var SimpleXMLElement $root_child */
        foreach($sxml as $child_index => $root_child) {

            switch($child_index) {
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

    public function parseJSON() {
        $json = json_decode($this->response_body, true);

        foreach($json as $child_index => $root_child) {

            switch($child_index) {
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

    //Xero sends text/html when it's an oauth response for some reason.
    public function parseHTML() {
        parse_str($this->response_body, $this->oauth_response);
    }


} 
