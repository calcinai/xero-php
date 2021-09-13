<?php

namespace XeroPHP\Remote;

use GuzzleHttp\Psr7\Request as PsrRequest;
use GuzzleHttp\Psr7\Uri;
use XeroPHP\Application;

class Request
{
    const METHOD_GET = 'GET';

    const METHOD_PUT = 'PUT';

    const METHOD_POST = 'POST';

    const METHOD_DELETE = 'DELETE';

    const CONTENT_TYPE_HTML = 'text/html';

    const CONTENT_TYPE_XML = 'text/xml';

    const CONTENT_TYPE_JSON = 'application/json';

    const CONTENT_TYPE_PDF = 'application/pdf';

    const HEADER_ACCEPT = 'Accept';

    const HEADER_CONTENT_TYPE = 'Content-Type';

    const HEADER_CONTENT_LENGTH = 'Content-Length';

    const HEADER_AUTHORIZATION = 'Authorization';

    const HEADER_IF_MODIFIED_SINCE = 'If-Modified-Since';

    private $app;

    private $url;

    private $method;

    private $headers;

    private $parameters;

    private $body;

    /**
     * @var \XeroPHP\Remote\Response;
     */
    private $response;

    /**
     * Request constructor.
     * @param Application $app
     * @param URL $url
     * @param string $method
     * @throws Exception
     * @throws \XeroPHP\Exception
     */
    public function __construct(Application $app, URL $url, $method = self::METHOD_GET)
    {
        $this->app = $app;
        $this->url = $url;
        $this->headers = [];
        $this->parameters = [];

        switch ($method) {
            case self::METHOD_GET:
            case self::METHOD_PUT:
            case self::METHOD_POST:
            case self::METHOD_DELETE:
                $this->method = $method;

                break;
            default:
                throw new Exception("Invalid request method [{$method}]");
        }

        //Default to XML so you get the  xsi:type attribute in the root node.
        $this->setHeader(self::HEADER_ACCEPT, $app->getConfigOption('xero', 'default_content_type'));

        $xero_config = $this->app->getConfig('xero');
        if (isset($xero_config['unitdp'])) {
            $this->setParameter('unitdp', $xero_config['unitdp']);
        }
    }

    /**
     * @throws Exception
     * @throws Exception\BadRequestException
     * @throws Exception\ForbiddenException
     * @throws Exception\InternalErrorException
     * @throws Exception\NotAvailableException
     * @throws Exception\NotFoundException
     * @throws Exception\NotImplementedException
     * @throws Exception\OrganisationOfflineException
     * @throws Exception\RateLimitExceededException
     * @throws Exception\ReportPermissionMissingException
     * @throws Exception\UnauthorizedException
     */
    public function send()
    {
        $uri = Uri::withQueryValues(new Uri($this->getUrl()->getFullURL()), $this->getParameters());

        $request = new PsrRequest($this->getMethod(), $uri, $this->getHeaders(), $this->body);

        try {
            $guzzleResponse = $this->app->getTransport()->send($request);
        }  catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $guzzleResponse = $e->getResponse();
        }
        $this->response = new Response($this,
            $guzzleResponse->getBody()->getContents(),
            $guzzleResponse->getStatusCode(),
            $guzzleResponse->getHeaders()
        );
        $this->response->parse();
        return $this->response;
    }

    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param $key string Name of the header
     *
     * @return string|null Header or null if not defined
     */
    public function getHeader($key)
    {
        if (!isset($this->headers[$key])) {
            return null;
        }

        return $this->headers[$key];
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * @return \XeroPHP\Remote\Response|null
     */
    public function getResponse()
    {
        if (isset($this->response)) {
            return $this->response;
        }

        return null;
    }

    /**
     * @param $key string Name of the header
     * @param $val string Value of the header
     *
     * @return $this
     */
    public function setHeader($key, $val)
    {
        $this->headers[$key] = $val;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return URL
     */
    public function getUrl()
    {
        return $this->url;
    }

    public function setBody($body, $content_type = self::CONTENT_TYPE_XML)
    {
        $this->setHeader(self::HEADER_CONTENT_LENGTH, strlen($body));
        $this->setHeader(self::HEADER_CONTENT_TYPE, $content_type);

        $this->body = $body;

        return $this;
    }
}
