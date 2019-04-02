<?php

namespace XeroPHP\tests;

use XeroPHP\Webhook;
use XeroPHP\Application;
use XeroPHP\Webhook\Event;
use XeroPHP\Application\PrivateApplication;

class WebhookTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Application
     */
    private $application;

    protected function setUp()
    {
        $config = [
            'oauth' => [
                'callback' => 'oob',
                'consumer_key' => 'k',
                'consumer_secret' => 's',
                'rsa_private_key' => 'file://certs/private.pem',
                'rsa_public_key' => 'file://certs/public.pem',
            ],
            'webhook' => [
                'signing_key' => 'test_key',
            ],
        ];

        $this->application = new PrivateApplication($config);
    }

    /**
     * @expectedException \XeroPHP\Application\Exception
     */
    public function testMalformedPayload()
    {
        $payload = 'not valid json';
        $webhook = new Webhook($this->application, $payload);
    }

    /**
     * @expectedException \XeroPHP\Application\Exception
     */
    public function testPayloadMissingKeys()
    {
        $payload = '{}';
        $webhook = new Webhook($this->application, $payload);
    }

    public function testValidPayload()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 0, "entropy": "NLDZEGWUXNHESAQVGLYF"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertTrue($webhook->validate('ixznmr+Pdl6QymsWZM+9UkY4lu97q04sJyejmSOp25U='));
    }

    public function testInvalidPayload()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 0, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertFalse($webhook->validate('this will fail'));
    }

    public function testGetEventSequences()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertSame(0, $webhook->getFirstEventSequence());
        $this->assertSame(2, $webhook->getLastEventSequence());
    }

    public function testGetApplication()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertSame($this->application, $webhook->getApplication());
    }

    public function testGetEvents()
    {
        $payload = '{"events":[],"firstEventSequence": 0,"lastEventSequence": 2, "entropy": "ZGJDWFZBUNMATYWGAROW"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertCount(0, $webhook->getEvents());

        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"},{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:19:05.06Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);
        $this->assertCount(2, $webhook->getEvents());
    }

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
