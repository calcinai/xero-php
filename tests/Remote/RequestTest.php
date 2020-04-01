<?php

namespace XeroPHP\Tests\Remote;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response;
use XeroPHP\Application;
use XeroPHP\Remote\Request as XeroRequest;
use XeroPHP\Remote\URL;
use XeroPHP\Remote\Exception\BadRequestException;

class RequestTest extends \PHPUnit_Framework_TestCase
{
    private function getMockedApplication($mockedResponses)
    {
        $app = new Application('', '');
        $mock = new MockHandler($mockedResponses);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $app->setTransport($client);
        return $app;
    }

    public function testBadRequestException()
    {
        $app = $this->getMockedApplication([
            new BadResponseException('Bad response', new GuzzleRequest('GET', 'test'), new Response(400))
        ]);
        $request = new XeroRequest($app, new URL($app, 'test'));

        $this->expectException(BadRequestException::class);
        $request->send();
    }

    public function testGuzzleExceptionsAreThrown()
    {
        $app = $this->getMockedApplication([
            new ConnectException('Failed to connect', new GuzzleRequest('GET', 'test'))
        ]);
        $request = new XeroRequest($app, new URL($app, 'test'));

        $this->expectException(ConnectException::class);
        $request->send();
    }
}
