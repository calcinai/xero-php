<?php

namespace XeroPHP\Tests\Remote;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use GuzzleHttp\Psr7\Response;
use XeroPHP\Application;
use XeroPHP\Remote\Model;
use XeroPHP\Tests\Remote\Model\ModelWithCollection;

class ModelTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessorMethods()
    {
        $object = new SimpleModel(null);
        $this->assertFalse(isset($object->test));
        $this->assertNull($object->test);
        $this->assertFalse(isset($object->TeST));
        $this->assertNull($object->TeST);
        $this->assertFalse(isset($object['test']));
        $this->assertNull($object['test']);
        $this->assertFalse(isset($object['TeST']));
        $this->assertNull($object['TeST']);

        $object->test = 'something';

        $this->assertTrue(isset($object->test));
        $this->assertSame('something', $object->test);
        $this->assertTrue(isset($object['test']));
        $this->assertSame('something', $object['TeST']);
        $this->assertSame('something', $object->TeST);
        $this->assertSame('something', $object['TeST']);

        $this->assertFalse(isset($object->TeST), '__isset is case sensitive');
        $this->assertFalse(isset($object['TeST']), 'offsetExists is case sensitive');
    }

    public function testGUIDMethods()
    {
        $object = new SimpleModel();
        $this->assertNull($object->getGUID());
        $this->assertFalse($object->hasGUID());

        $object->setGUID('5b96e86b-418e-48e8-8949-308c14aec278');

        $this->assertSame('5b96e86b-418e-48e8-8949-308c14aec278', $object->getGUID());
        $this->assertTrue($object->hasGUID());
    }

    public function testSetsEmptyCollection()
    {
        $testXML = '<Response><Models><Model><ModelID>test</ModelID><EarningsLines /></Model></Models></Response>';
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app = new Application('', '');
        $app->setTransport($client);

        $model = $app->loadByGUID(ModelWithCollection::class, 'test');
        $this->assertSame('test', $model->getModelID());
        $this->assertNull($model->getEarningsLines());
    }
}

class SimpleModel extends Model
{
    public static function getGUIDProperty()
    {
        return 'test';
    }

    public static function getProperties()
    {
        return ['test'];
    }

    public static function getSupportedMethods()
    {
        return ['test'];
    }

    public static function getResourceURI()
    {
        return 'test';
    }

    public static function isPageable()
    {
        return false;
    }

    public static function getAPIStem()
    {
        return 'test';
    }

    /**
     * @return mixed
     */
    public function getTest()
    {
        return isset($this->_data['test']) ? $this->_data['test'] : null;
    }

    /**
     * @param mixed $test
     */
    public function setTest($test)
    {
        $this->_data['test'] = $test;
    }

    public static function getRootNodeName()
    {
        return 'test';
    }
}
