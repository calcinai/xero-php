<?php

namespace XeroPHP\Tests\Remote;


use PHPUnit\Framework\TestCase;
use XeroPHP\Application;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\Response;
use XeroPHP\Remote\URL;

class ResponseTest extends TestCase
{

    public function testRootWarningsAreParsedJson()
    {
        $app = $this->getApplication();
        $response = new Response(new Request($app, new URL($app, 'test')),
            '{
  "Id": "1",
  "Status": "OK",
  "ProviderName": "",
  "DateTimeUTC": "/Date(1714648586607)/",
  "Invoices": [],
  "Warnings": [
    {
	    "Message": "This is a Warning Message."
    }
  ]
}', Response::STATUS_OK, [Request::HEADER_CONTENT_TYPE => [Request::CONTENT_TYPE_JSON.";"]]);

        $response->parse();

        $rootWarnings = $response->getRootWarnings();
        $this->assertCount(1, $rootWarnings);
        $this->assertArrayHasKey("Message", $rootWarnings[0]);
        $this->assertEquals("This is a Warning Message.", $rootWarnings[0]["Message"]);
    }

    public function testRootWarningsAreParsedXML()
    {
        $app = $this->getApplication();
        $response = new Response(new Request($app, new URL($app, 'test')),
            '<Response xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Id>2</Id>
    <Status>OK</Status>
    <ProviderName></ProviderName>
    <DateTimeUTC>2024-05-02T14:52:55.8388472Z</DateTimeUTC>
    <Invoices></Invoices>
    <Warnings>
        <Warning><Message>This is a Warning Message.</Message></Warning>
    </Warnings>
</Response>', Response::STATUS_OK, [Request::HEADER_CONTENT_TYPE => [Request::CONTENT_TYPE_XML.";"]]);

        $response->parse();

        $rootWarnings = $response->getRootWarnings();
        $this->assertCount(1, $rootWarnings);
        $this->assertArrayHasKey("Message", $rootWarnings[0]);
        $this->assertEquals("This is a Warning Message.", $rootWarnings[0]["Message"]);
    }

    public function testPaginatedValuesAreParsedXML()
    {
        $app = $this->getApplication();
        $response = new Response(new Request($app, new URL($app, 'test')),
            '<Response xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
    <Id>2</Id>
    <Status>OK</Status>
    <ProviderName></ProviderName>
    <DateTimeUTC>2024-05-02T14:52:55.8388472Z</DateTimeUTC>
    <PageInfo>
        <Page>1</Page>
        <PageSize>1000</PageSize>
        <TotalPages>2</TotalPages>
        <TotalRows>1275</TotalRows>
    </PageInfo>
    <Invoices></Invoices>
</Response>', Response::STATUS_OK, [Request::HEADER_CONTENT_TYPE => [Request::CONTENT_TYPE_XML.";"]]);

        $response->parse();

        $pageInfo = $response->getPageInfo();

        $this->assertEquals(1, $pageInfo->getPage());
        $this->assertEquals(1000, $pageInfo->getPageSize());
        $this->assertEquals(2, $pageInfo->getTotalPages());
        $this->assertEquals(1275, $pageInfo->getTotalRows());
    }

    protected function getApplication($config = [])
    {
        $xero_app = new Application('token', 'tenantId');
        $xero_app->setConfig($config);

        return $xero_app;
    }
}
