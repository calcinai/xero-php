<?php

namespace XeroPHP\Tests\Remote;

use XeroPHP\Remote\Query;

class QueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \XeroPHP\Application|\Prophecy\Prophecy\ObjectProphecy $xero
     */
    private $xero;

    /**
     * @var Query
     */
    private $query;

    public function setUp()
    {
        $this->xero = $this->prophesize('\XeroPHP\Application');
        $this->xero->validateModelClass('Accounting\\Contact')->willReturn('\XeroPHP\Models\Accounting\Contact');
        $this->xero->getConfig('xero')->willReturn([
            'base_url' => '',
            'core_version' => '',
        ]);
        $this->xero->getConfig('oauth')->willReturn([]);
        $this->query = new Query($this->xero->reveal());
        $this->query->from('Accounting\\Contact');
    }

    public function testWhereIsAddedOnEachCall()
    {
        $this->query->where('FirstName', 'John');
        $this->query->where('LastName', 'Doe');
        $this->query->where('Name == "ACME"');

        $this->assertEquals('(FirstName=="John") AND (LastName=="Doe") AND (Name == "ACME")', $this->query->getRequest()->getParameters()['where']);
    }

    public function testAddWhereAddsAddCondition()
    {
        $this->query->where('FirstName', 'John');
        $this->query->andWhere('LastName', 'Doe');
        $this->query->andWhere('Name == "ACME"');

        $this->assertEquals('(FirstName=="John") AND (LastName=="Doe") AND (Name == "ACME")', $this->query->getRequest()->getParameters()['where']);
    }

    public function testWhereWithValueStartingWithColon()
    {
        $this->query->where('FirstName', ':john');
        $this->assertEquals('(FirstName==":john")', $this->query->getRequest()->getParameters()['where']);
    }

    public function testParametersCanBeUsed()
    {
        $this->query->where('FirstName == :first_name');
        $this->query->andWhere('Website == :name OR Name == :name');
        $this->query->setParameters([
            'first_name' => 'John Snow',
            'name'       => 'ACME',
        ]);

        $this->assertEquals('(FirstName == "John Snow") AND (Website == "ACME" OR Name == "ACME")', $this->query->getRequest()->getParameters()['where']);
    }

    public function testExceptionIsThrownIfParameterValueIsNotSet()
    {
        $this->query->where('FirstName == :first_name');
    }

    public function testExceptionIsThrownIfUnusedParameterAreSet()
    {
        $this->query->setParameter('first_name', 'test');
    }

    public function testStringParameterIsCorrectlyApplied()
    {
        $this->query->where('FirstName == :first_name');
        $this->query->setParameter('first_name', 'John "Eduard" Snow');
        $this->assertEquals('(FirstName == "John \"Eduard\" Snow")', $this->query->getRequest()->getParameters()['where']);
    }

    public function testDateTimeIsCorrectlyApplied()
    {
        $this->query->where('DateOfBirth >= :date_of_birth');
        $this->query->setParameter('date_of_birth', new \DateTime('2015-12-30'));
        $this->assertEquals('(DateOfBirth >= DateTime(2015,12,30))', $this->query->getRequest()->getParameters()['where']);
    }

    public function testTrueIsCorrectlyApplied()
    {
        $this->query->where('IsSupplier == :is_supplier');
        $this->query->setParameter('is_supplier', true);
        $this->assertEquals('(IsSupplier == true)', $this->query->getRequest()->getParameters()['where']);
    }

    public function testFalseIsCorrectlyApplied()
    {
        $this->query->where('IsSupplier == :is_supplier');
        $this->query->setParameter('is_supplier', false);
        $this->assertEquals('(IsSupplier == false)', $this->query->getRequest()->getParameters()['where']);
    }

    public function testIntIsCorrectlyApplied()
    {
        $this->query->where('Name == :name');
        $this->query->setParameter('name', 1234);
        $this->assertEquals('(Name == 1234)', $this->query->getRequest()->getParameters()['where']);
    }

    public function testFloatIsCorrectlyApplied()
    {
        $this->query->where('Name == :name');
        $this->query->setParameter('name', 1234.1234);
        $this->assertEquals('(Name == 1234.1234)', $this->query->getRequest()->getParameters()['where']);
    }

    public function testIncludeArchived()
    {
        $request = $this->query->getRequest();
        $this->assertArrayNotHasKey('includeArchived', $request->getParameters(), 'includeArchive should not be set in Request by default');

        $this->query->includeArchived();
        $this->assertEquals(true, $this->query->getRequest()->getParameters()['includeArchived'], 'includeArchive is included in Request if set via includeArchived without argument');

        $this->query->includeArchived(true);
        $this->assertEquals(true, $this->query->getRequest()->getParameters()['includeArchived'], 'includeArchive is included in Request if set via includeArchived with true argument');

        $this->query->includeArchived(1);
        $this->assertEquals(true, $this->query->getRequest()->getParameters()['includeArchived'], 'includeArchive is included in Request if set via includeArchived with true argument');

        $this->query->includeArchived(false);
        $this->assertArrayNotHasKey('includedArchived', $this->query->getRequest()->getParameters(), 'includeArchive should not be set in Request if set to false');
    }
}
