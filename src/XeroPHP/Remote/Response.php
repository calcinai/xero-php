<?php

namespace XeroPHP\Remote;

use SimpleXMLElement;
use XeroPHP\Helpers;
use XeroPHP\Remote\Exception\BadRequestException;
use XeroPHP\Remote\Exception\ForbiddenException;
use XeroPHP\Remote\Exception\InternalErrorException;
use XeroPHP\Remote\Exception\NotAvailableException;
use XeroPHP\Remote\Exception\NotFoundException;
use XeroPHP\Remote\Exception\NotImplementedException;
use XeroPHP\Remote\Exception\OrganisationOfflineException;
use XeroPHP\Remote\Exception\RateLimitExceededException;
use XeroPHP\Remote\Exception\ReportPermissionMissingException;
use XeroPHP\Remote\Exception\UnauthorizedException;
use XeroPHP\Remote\Exception\UnknownStatusException;

class Response
{
    static $STATUS_SUCCESS = [
        'OK' => 200,
        'CREATED' => 201,
        'ACCEPTED' => 202,
        'NON_AUTHORITATIVE_INFORMATION' => 203,
        'NO_CONTENT' => 204,
        'RESET_CONTENT' => 205,
        'PARTIAL_CONTENT' => 206,
        'MULTI_STATUS' => 207,
        'ALREADY_REPORTED' => 208,
        'IM_USED' => 226,
    ];

    const STATUS_OK = 200;

    const STATUS_BAD_REQUEST = 400;

    const STATUS_UNAUTHORISED = 401;

    const STATUS_FORBIDDEN = 403;

    const STATUS_NOT_FOUND = 404;

    const STATUS_INTERNAL_ERROR = 500;

    const STATUS_NOT_IMPLEMENTED = 501;

    //Seriously, 1 code for 3 different things!
    const STATUS_NOT_AVAILABLE = 503;

    const STATUS_RATE_LIMIT_EXCEEDED = 503;

    const STATUS_ORGANISATION_OFFLINE = 503;

    const STATUS_TOO_MANY_REQUESTS = 429;

    private $request;

    private $headers;

    private $status;

    private $response_body;

    private $oauth_response;

    private $elements;

    private $element_errors;

    private $element_warnings;

    private $root_error;

    public function __construct(Request $request, $response_body, $status, $headers)
    {
        $this->request = $request;
        $this->response_body = $response_body;
        $this->status = $status;
        $this->headers = $headers;
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
     * @throws ForbiddenException
     * @throws ReportPermissionMissingException
     * @throws UnknownStatusException
     */
    public function parse()
    {
        $this->parseBody();

        switch ($this->status) {
            case self::STATUS_BAD_REQUEST:
                //This catches actual app errors
                if (isset($this->root_error) && !empty($this->root_error)) {
                    $message = sprintf('%s (%s)', $this->root_error['message'], implode(', ', $this->element_errors));
                    $message .= $this->parseBadRequest();

                    throw new BadRequestException($message, $this->root_error['code']);
                }

                throw new BadRequestException();


            /** @noinspection PhpMissingBreakStatementInspection */
            // no break
            case self::STATUS_UNAUTHORISED:
                //This is where OAuth errors end up, this could maybe change to an OAuth exception
                if (isset($this->oauth_response['oauth_problem_advice'])) {
                    throw new UnauthorizedException($this->oauth_response['oauth_problem_advice']);
                }

                $response = urldecode($this->response_body);
                if (false !== stripos($response,
                        'You are not permitted to access this resource without the reporting role or higher privileges')) {
                    throw new ReportPermissionMissingException();
                }
                throw new ForbiddenException();

            case self::STATUS_FORBIDDEN:
                throw new ForbiddenException();

            case self::STATUS_NOT_FOUND:
                throw new NotFoundException();

            case self::STATUS_INTERNAL_ERROR:
                throw new InternalErrorException();

            case self::STATUS_NOT_IMPLEMENTED:
                throw new NotImplementedException();

            case self::STATUS_TOO_MANY_REQUESTS:
                throw RateLimitExceededException::createFromHeaders($this->headers);

            case self::STATUS_NOT_AVAILABLE:
            case self::STATUS_RATE_LIMIT_EXCEEDED:
            case self::STATUS_ORGANISATION_OFFLINE:
                //There must be a better way than this?
                $response = urldecode($this->response_body);
                if (false !== stripos($response, 'Organisation is offline')) {
                    throw new OrganisationOfflineException();
                }
                if (false !== stripos($response, 'Rate limit exceeded')) {
                    throw RateLimitExceededException::createFromHeaders($this->headers);
                }

                throw new NotAvailableException();
        }

        if (!in_array($this->status, self::$STATUS_SUCCESS)) {
            throw new UnknownStatusException('The API returned a non-successful status code that is not recognised.', $this->status);
        }
    }

    /**
     * @return string
     * @throws UnauthorizedException
     */
    private function parseBadRequest()
    {
        if (!empty($this->elements)) {
            $field_errors = [];
            foreach ($this->elements as $n => $element) {
                if (isset($element['ValidationErrors'])) {
                    $field_errors[] = $element['ValidationErrors'][0]['Message'];
                }
            }

            return "\nValidation errors:\n" . implode("\n", $field_errors);
        }

        if (isset($this->oauth_response['oauth_problem_advice'])) {
            throw new UnauthorizedException($this->oauth_response['oauth_problem_advice']);
        }

        return '';
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getResponseBody()
    {
        return $this->response_body;
    }

    public function getElements()
    {
        return $this->elements;
    }

    public function getErrorsForElement($element_id)
    {
        if (isset($this->element_errors[$element_id])) {
            return $this->element_errors[$element_id];
        }
    }

    public function getElementErrors()
    {
        return $this->element_errors;
    }

    public function getElementWarnings()
    {
        return $this->element_warnings;
    }

    public function getRootError()
    {
        return $this->root_error;
    }

    public function getOAuthResponse()
    {
        return $this->oauth_response;
    }

    public function parseBody()
    {
        $this->elements = [];
        $this->element_errors = [];
        $this->element_warnings = [];
        $this->root_error = [];

        if (!isset($this->headers[Request::HEADER_CONTENT_TYPE])) {
            //Nothing to parse
            return;
        }

        //Iterate in priority order
        foreach ($this->headers[Request::HEADER_CONTENT_TYPE] as $ct) {
            list($content_type) = explode(';', $ct);

            switch ($content_type) {
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
                    //Try the next content type
                    continue 2;

            }

            foreach ($this->elements as $index => $element) {
                $this->findElementErrors($element, $index);
            }

            //A matching content-type was found, break the foreach
            break;
        }
    }

    public function findElementErrors($element, $element_index)
    {
        foreach ($element as $property => $value) {
            switch ((string)$property) {
                case 'ValidationErrors':
                    if (is_array($value)) {
                        foreach ($value as $error) {
                            $this->element_errors[$element_index] = trim($error['Message'], '.');
                        }
                    }

                    break;
                case 'Warnings':
                    if (is_array($value)) {
                        foreach ($value as $warning) {
                            $this->element_warnings[$element_index] = trim($warning['Message'], '.');
                        }
                    }

                    break;

                default:
                    if (is_array($value)) {
                        $this->findElementErrors($value, $element_index);
                    }
            }
        }
    }

    public function parseXML()
    {
        $sxml = new SimpleXMLElement($this->response_body);

        // For lack of a better way to find the elements returned (every time)
        // XML has an array 2 levels deep due to its non-unique key nature.
        /** @var SimpleXMLElement $root_child */
        foreach ($sxml as $child_index => $root_child) {
            switch ($child_index) {
                case 'ErrorNumber':
                    $this->root_error['code'] = (string)$root_child;

                    break;
                case 'Type':
                    $this->root_error['type'] = (string)$root_child;

                    break;
                case 'Message':
                    $this->root_error['message'] = (string)$root_child;

                    break;
                case 'Payslip':
                case 'PayItems':
                case 'Settings':
                case 'Timesheet':
                    // some xero endpoints are 1D so we can parse them straight away
                    $this->elements[] = Helpers::XMLToArray($root_child);

                    break;

                default:
                    //Happy to make the assumption that there will only be one
                    //root node with > than 2D children.
                    foreach ($root_child->children() as $element_index => $element) {
                        $this->elements[] = Helpers::XMLToArray($element);
                    }
            }
        }
    }

    public function parseJSON()
    {
        $json = json_decode($this->response_body, true);

        foreach ($json as $child_index => $root_child) {
            switch ($child_index) {
                case 'ErrorNumber':
                    $this->root_error['code'] = $root_child;

                    break;
                case 'Type':
                    $this->root_error['type'] = $root_child;

                    break;
                case 'Message':
                    $this->root_error['message'] = $root_child;

                    break;
                case 'Payslip':
                case 'PayItems':
                    // some xero endpoints are 1D so we can parse them straight away
                    $this->elements[] = $root_child;

                    break;

                default:
                    //Happy to make the assumption that there will only be one
                    //root node with > than 2D children.
                    if (is_array($root_child)) {
                        foreach ($root_child as $element) {
                            $this->elements[] = $element;
                        }
                    }
            }
        }
    }

    //Xero sends text/html when it's an oauth response for some reason.
    public function parseHTML()
    {
        parse_str($this->response_body, $this->oauth_response);
    }
}
