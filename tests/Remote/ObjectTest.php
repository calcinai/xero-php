<?php

namespace XeroPHP\Tests\Remote;

use XeroPHP\Application;
use XeroPHP\Remote\Object;

class ObjectTest extends \PHPUnit_Framework_TestCase
{
    public function testAccessorMethods()
    {
        $object = new SimpleObject(null);
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
        $this->assertEquals('something', $object->test);
        $this->assertTrue(isset($object['test']));
        $this->assertEquals('something', $object['TeST']);
        $this->assertEquals('something', $object->TeST);
        $this->assertEquals('something', $object['TeST']);

        $this->assertFalse(isset($object->TeST), '__isset is case sensitive');
        $this->assertFalse(isset($object['TeST']), 'offsetExists is case sensitive');
    }

    public function testGUIDMethods()
    {
        $object = new SimpleObject();
        $this->assertNull($object->getGUID());
        $this->assertFalse($object->hasGUID());

        $object->setGUID('5b96e86b-418e-48e8-8949-308c14aec278');

        $this->assertEquals('5b96e86b-418e-48e8-8949-308c14aec278', $object->getGUID());
        $this->assertTrue($object->hasGUID());
    }
}

class SimpleObject extends Object
{
    static function getGUIDProperty()
    {
        return 'test';
    }

    static function getProperties()
    {
        return ['test'];
    }

    static function getSupportedMethods()
    {
        return ['test'];
    }

    static function getResourceURI()
    {
        return 'test';
    }

    static function isPageable()
    {
        return false;
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

}
