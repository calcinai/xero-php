<?php

namespace XeroPHP\Tests\Remote;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use XeroPHP\Application;
use XeroPHP\Remote\Exception\UnknownStatusException;
use XeroPHP\Remote\Request as XeroRequest;
use XeroPHP\Remote\URL;
use XeroPHP\Remote\Exception\BadRequestException;
use XeroPHP\Remote\Exception\RateLimitExceededException;

class RequestTest extends TestCase
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

    public function testOauth1RateLimitExceededIsThrown()
    {
        $app = $this->getMockedApplication([
            new Response(
                503,
                [ 'X-Rate-Limit-Problem' => 'daily' ],
                'oauth_problem=rate limit exceeded&oauth_problem_advice=please wait before retrying the xero api'
            )
        ]);
        $request = new XeroRequest($app, new URL($app, 'test'));

        $exception = null;
        try {
            $request->send();
        } catch (RateLimitExceededException $e) {
            $exception = $e;
        }

        $this->assertInstanceOf(RateLimitExceededException::class, $exception);
        $this->assertSame('daily', $exception->getRateLimitProblem());
    }

    public function testOauth2RateLimitExceededIsThrown()
    {
        $app = $this->getMockedApplication([
            new Response(
                429,
                [ 'X-Rate-Limit-Problem' => 'minute', 'Retry-After' => '8' ],
                ''
            )
        ]);
        $request = new XeroRequest($app, new URL($app, 'test'));

        $exception = null;
        try {
            $request->send();
        } catch (RateLimitExceededException $e) {
            $exception = $e;
        }

        $this->assertInstanceOf(RateLimitExceededException::class, $exception);
        $this->assertSame('minute', $exception->getRateLimitProblem());
        $this->assertSame(8, $exception->getRetryAfter());
    }

    public function testUnknownStatusExceptionIsThrown()
    {
        $app = $this->getMockedApplication([
            new Response(599)
        ]);
        $request = new XeroRequest($app, new URL($app, 'test'));

        $this->expectException(UnknownStatusException::class);
        $request->send();
    }
}
