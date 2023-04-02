<?php

namespace XeroPHP\Tests\Remote;

use PHPUnit\Framework\TestCase;
use XeroPHP\Application;
use XeroPHP\Remote\Query;

class QueryTest extends TestCase
{

   function testWhere() {

      $xero_app = $this->getApplication();

      // Where: DateTime(yyyy,mm,dd)
      $query = new Query($xero_app);
      $query->where('SomeDateKey', 'DateTime(2020,11,25)');
      $where = $query->getWhere();
      $this->assertSame("SomeDateKey==DateTime(2020,11,25)", $where, "DateTime function in where string should not have surrounding quotes (as per xero api documentation v2.0)");

      // Where: single parameter
      $query = new Query($xero_app);
      $single_param = 'SomeDateKey>=DateTime(2020,11,25)';
      $query->where($single_param);
      $where = $query->getWhere();
      $this->assertSame($single_param, $where, "Single parameter should be unchanged in where string");

      // Where: integer
      $query = new Query($xero_app);
      $query->where('SomeKey', 3);
      $where = $query->getWhere();
      $this->assertSame("SomeKey==3", $where, "Integer in where string should not have surrounding quotes");

      // Where: float
      $query = new Query($xero_app);
      $query->where('SomeKey', 3.7);
      $where = $query->getWhere();
      $this->assertSame("SomeKey==3.7", $where, "Float in where string should not have surrounding quotes");

      // Where: string
      $query = new Query($xero_app);
      $query->where('SomeKey', 'any string value');
      $where = $query->getWhere();
      $this->assertSame("SomeKey==\"any string value\"", $where, "String in where string should have surrounding quotes");

      // Where: string contains integer
      $query = new Query($xero_app);
      $query->where('SomeKey', '3');
      $where = $query->getWhere();
      $this->assertSame("SomeKey==\"3\"", $where, "Integer passed as string should have surrounding quotes");

      // Where: guid with key ending in ID
      $query = new Query($xero_app);
      $guid = "44aa0707-f718-4f1c-8d53-f2da9ca59533";
      $query->where('KeyEndingWithID', $guid);
      $where = $query->getWhere();
      $this->assertSame("KeyEndingWithID=Guid(\"$guid\")", $where, "Key ends in ID and value is guid string, should have guid format in where string");

      // Where: guid with key not ending in ID
      $query = new Query($xero_app);
      $guid = "44aa0707-f718-4f1c-8d53-f2da9ca59533";
      $query->where('SomeKey', $guid);
      $where = $query->getWhere();
      $this->assertSame("SomeKey==\"$guid\"", $where, "key does not end in ID and value is guid string, should be formatted as a string in where string");

      // Where: key ends in ID with non-guid value
      $query = new Query($xero_app);
      $not_a_guid = "Some-AlphaNu-meric-value9876";
      $query->where('KeyEndingWithID', $not_a_guid);
      $where = $query->getWhere();
      $this->assertSame("KeyEndingWithID==\"$not_a_guid\"", $where, "Key ends in ID but value is not a guid, should be formatted as a string in where string");

      // Where: "true"
      $query = new Query($xero_app);
      $query->where('SomeKey', "true");
      $where = $query->getWhere();
      $this->assertSame("SomeKey=true", $where, "'true' passed as string should have no quotes in where string");

      // Where: true (bool)
      $query = new Query($xero_app);
      $query->where('SomeKey', true);
      $where = $query->getWhere();
      $this->assertSame("SomeKey=true", $where, "true passed as bool should have no quotes in where string");

      // Where: "false"
      $query = new Query($xero_app);
      $query->where('SomeKey', "false");
      $where = $query->getWhere();
      $this->assertSame("SomeKey=false", $where, "'false' passed as string should have no quotes in where string");

      // Where: false (bool)
      $query = new Query($xero_app);
      $query->where('SomeKey', false);
      $where = $query->getWhere();
      $this->assertSame("SomeKey=false", $where, "false passed as bool should have no quotes in where string");

   }

   function testAndWhere() {

      $xero_app = $this->getApplication();
      $query = new Query($xero_app);
      $param_1 = 'SomeDateKey >= DateTime(2020,11,25)';
      $param_2 = 'SomeDateKey < DateTime(2020,12,25)';
      $query->where($param_1);
      $query->andWhere($param_2);

      $where = $query->getWhere();
      $this->assertSame("$param_1 AND $param_2", $where, "Where conditions should be linked by 'AND'");

   }

   protected function getApplication($config = [])
   {
      $xero_app = new Application('token', 'tenantId');
      $xero_app->setConfig($config);

      return $xero_app;
   }

}