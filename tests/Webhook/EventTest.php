<?php

namespace XeroPHP\tests;

use XeroPHP\Webhook;
use XeroPHP\Application;
use XeroPHP\Application\PrivateApplication;

class EventTest extends \PHPUnit_Framework_TestCase
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
        $payload = '{"events":[{"resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);
        foreach ($webhook->getEvents() as $evt) {
        }
    }

    public function testGetWebhook()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame($webhook, $evt->getWebhook());
        }
    }

    public function testGetResourceUrl()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533', $evt->getResourceUrl());
        }
    }

    public function testGetResourceId()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('44aa0707-f718-4f1c-8d53-f2da9ca59533', $evt->getResourceId());
        }
    }

    public function testGetEventDate()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $string = $evt->getEventDateUtc();
            $this->assertSame('2018-02-09T09:18:28.917Z', $string);

            $obj = $evt->getEventDate();
            $this->assertSame(strtotime($string), $obj->getTimestamp());
        }
    }

    public function testGetEventType()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('UPDATE', $evt->getEventType());
        }
    }

    public function testGetEventCategory()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('INVOICE', $evt->getEventCategory());
        }
    }

    public function testGetEventClass()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"},{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"CONTACT","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"},{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"FUTURE_ENDPOINT","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $events = $webhook->getEvents();

        $evt = array_pop($events);
        $this->assertNull($evt->getEventClass());

        $evt = array_pop($events);
        $this->assertSame(\XeroPHP\Models\Accounting\Contact::class, $evt->getEventClass());

        $evt = array_pop($events);
        $this->assertSame(\XeroPHP\Models\Accounting\Invoice::class, $evt->getEventClass());
    }

    public function testGetTenantId()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('e629a03c-7ffe-4913-bd94-ff2fdb36a702', $evt->getTenantId());
        }
    }

    public function testGetTenantType()
    {
        $payload = '{"events":[{"resourceUrl":"https://api.xero.com/api.xro/2.0/Invoices/44aa0707-f718-4f1c-8d53-f2da9ca59533","resourceId":"44aa0707-f718-4f1c-8d53-f2da9ca59533","eventDateUtc":"2018-02-09T09:18:28.917Z","eventType":"UPDATE","eventCategory":"INVOICE","tenantId":"e629a03c-7ffe-4913-bd94-ff2fdb36a702","tenantType":"ORGANISATION"}],"firstEventSequence": 2,"lastEventSequence": 3, "entropy": "GATSEZXWIBPBRNQOTMOH"}';
        $webhook = new Webhook($this->application, $payload);

        $this->assertNotEmpty($webhook->getEvents());
        foreach ($webhook->getEvents() as $evt) {
            $this->assertSame('ORGANISATION', $evt->getTenantType());
        }
    }
}
