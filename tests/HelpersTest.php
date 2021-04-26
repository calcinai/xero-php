<?php

namespace XeroPHP\tests;

use XeroPHP\Helpers;

class HelpersTest extends \PHPUnit_Framework_TestCase
{
    public function testXMLToArrayWithEmptyNodes()
    {
        $xml = new \SimpleXMLElement('<Test><A /><B></B></Test>');
        $arr = Helpers::XMLToArray($xml);

        $this->assertCount(2, $arr);
        $this->assertSame('', $arr['A']);
        $this->assertSame('', $arr['B']);
    }

    public function testXMLToArrayWithChildNodes()
    {
        $xml = new \SimpleXMLElement('<Test><Things><Thing>A</Thing><Thing>B</Thing></Things></Test>');
        $arr = Helpers::XMLToArray($xml);

        $this->assertCount(1, $arr);
        $this->assertCount(2, $arr['Things']);
        $this->assertContains('A', $arr['Things']);
        $this->assertContains('B', $arr['Things']);
    }

    public function testXMLToArrayWithAssocChildNodes()
    {
        $xml = new \SimpleXMLElement('<Test><Thing><Item>A</Item><Item>B</Item><C/></Thing></Test>');
        $arr = Helpers::XMLToArray($xml);

        $this->assertCount(1, $arr);
        $this->assertCount(2, $arr['Thing']);
        $this->assertSame('B', $arr['Thing']['Item']);
        $this->assertSame('', $arr['Thing']['C']);
    }
}
