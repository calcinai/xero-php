<?php

namespace XeroPHP\Tests;

use PHPUnit\Framework\TestCase;
use XeroPHP\Application;
use XeroPHP\Exception;
use XeroPHP\Webhook;
use XeroPHP\Webhook\Event;

class WebhookTest extends TestCase
{
    /**
     * @var Application
     */
    private $application;

    public function setUp(): void
    {
        $this->application = new Application('token', 'tenantId');
        $this->application->setConfig([
            'webhook' => [
                'signing_key' => 'test_key',
            ]
        ]);
    }

    public function testMalformedPayload()
    {
        $this->expectException(Exception::class);

        $payload = 'not valid json';

        new Webhook($this->application, $payload);
    }

    public function testPayloadMissingKeys()
    {
        $this->expectException(Exception::class);

        $payload = '{}';

        new Webhook($this->application, $payload);
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testValidPayload()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 0, "entropy": "NLDZEGWUXNHESAQVGLYF"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertTrue($webhook->validate('ixznmr+Pdl6QymsWZM+9UkY4lu97q04sJyejmSOp25U='));
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testInvalidPayload()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 0, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertFalse($webhook->validate('this will fail'));
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testGetEventSequences()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertSame(0, $webhook->getFirstEventSequence());
        $this->assertSame(2, $webhook->getLastEventSequence());
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testGetApplication()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertSame($this->application, $webhook->getApplication());
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testGetEvents()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertCount(0, $webhook->getEvents());

        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"},{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:19:05.06Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertCount(2, $webhook->getEvents());
    }

    /**
     * @throws \XeroPHP\Exception
     */
    public function testDependencyInjection()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"},{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:19:05.06Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $mock = $this->getMockBuilder(Event::class)->disableOriginalConstructor()->getMock();

        $webhook = new Webhook($this->application, $payload, $mock);
        foreach ($webhook->getEvents() as $evt) {
            $this->assertInstanceOf(get_class($mock), $evt);
        }
    }
}
