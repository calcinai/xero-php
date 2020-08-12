<?php

namespace XeroPHP\Tests\Remote;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
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

    public function testPracticeManagerClientListIsReturned()
    {
        $testXML = '<Response>
  <Status>OK</Status> 
  <Clients>
    <Client>
      <ID>255</ID>
      <Name>XYZ Australia, NZ Business Unit</Name>
      <Title /> <!-- AU Tax Enabled only-->
      <Gender /> <!-- AU Tax Enabled only-->
      <FirstName /> <!-- for individuals only -->
      <LastName /> <!-- for individuals only -->
      <OtherName /> <!-- for individuals only -->
      <Email>someone@example.com</Email> 
      <DateOfBirth>1970-11-26T00:00:00</DateOfBirth> 
      <Address /> 
      <City /> 
      <Region /> 
      <PostCode /> 
      <Country /> 
      <PostalAddress>
         Level 32, PWC Building 
         188 Quay Street
         Auckland Central
      </PostalAddress> 
      <PostalCity>Auckland</PostalCity> 
      <PostalRegion /> 
      <PostalPostCode>1001</PostalPostCode>  
      <PostalCountry /> 
      <Phone>(02) 1723 5265</Phone>
      <Fax /> 
      <Website /> 
      <ReferralSource />
      <ExportCode />
      <IsProspect>No</IsProspect>
      <IsArchived>No</IsArchived>
      <IsDeleted>No</IsDeleted>
      <AccountManager>
        <ID>2</ID>
        <Name>Jo Blogs</Name> 
      </AccountManager>
      <Type>
        <Name>20th of Month</Name> 
        <CostMarkup>30.00</CostMarkup> 
        <PaymentTerm>DayOfMonth</PaymentTerm>  <!-- DayOfMonth or WithinDays  -->
        <PaymentDay>20</PaymentDay> 
      </Type>
      <Contacts>
        <Contact>
          <ID>220</ID>
          <IsPrimary>yes</IsPrimary>
          <Name>Samantha Benecke</Name> 
          <Salutation>Sam</Salutation> 
          <Addressee>Mrs S Benecke</Addressee> 
          <Mobile /> 
          <Email /> 
          <Phone /> 
          <Position /> 
        </Contact>
      </Contacts>
    </Client>
    <Client>
      <ID>697</ID>
      <Name>A. Dutchess</Name> 
      <Address /> 
      <City /> 
      <Region /> 
      <PostCode /> 
      <Country /> 
      <PostalAddress>P O Box 123</PostalAddress> 
      <PostalCity>Wellington</PostalCity> 
      <PostalRegion /> 
      <PostalPostCode>6011</PostalPostCode>  
      <PostalCountry />
      <Phone /> 
      <Fax /> 
      <Website /> 
      <Contacts /> 
      <BillingClient>
        <ID>12345</ID>
        <Name>Billing Client</Name>
      </BillingClient>
    </Client>
  </Clients>
</Response>';
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app = new Application('', '');
        $app->setTransport($client);

        $models = $app->load(\XeroPHP\Models\PracticeManager\Client::class)->setParameter('detailed', true)
                      ->setParameter('modifiedsince', date('Y-m-d\TH:i:s'))->execute();

        /** @var \XeroPHP\Models\PracticeManager\Client $model */
        $model = $models->first();

        $this->assertEquals(255, $model->getID());
        $this->assertEquals('XYZ Australia, NZ Business Unit', $model->getName());

        foreach ($model->getContacts() as $contact) {
            $this->assertEquals(220, $contact->getID());
            $this->assertTrue($contact->getIsPrimary());
            $this->assertEquals('Samantha Benecke', $contact->getName());
        }
    }


    public function testPracticeManagerCustomFieldListIsReturned()
    {
        $testXML = '<Response>
  <Status>OK</Status>
  <CustomFieldDefinitions>
    <CustomFieldDefinition>
      <ID>123</ID>
      <Name>Name of Custom Field</Name>
      <Type>Dropdown List</Type> <!-- e.g. Text, Decimal, Date, Dropdown List, Value Link, etc -->
      <LinkUrl />  <!-- Optional - URL for Value Link field types -->
      <Options />  <!-- Optional - Options for Dropdown lists -->

      <!-- The following elements indicate if the field is used for clients, contacts, suppliers, jobs and/or leads -->
      <UseClient>false</UseClient>  <!-- true | false -->
      <UseContact>false</UseContact>  <!-- true | false -->
      <UseSupplier>false</UseSupplier>  <!-- true | false -->
      <UseJob>false</UseJob>  <!-- true | false -->
      <UseLead>false</UseLead>  <!-- true | false -->
      <UseJobTask>false</UseJobTask>  <!-- true | false -->
      <UseJobCost>false</UseJobCost>  <!-- true | false -->
      <UseJobTime>true</UseJobTime>  <!-- true | false -->
      <!-- Identifies XML element for accessing the field value during GET or PUT - valid values are: Text | Decimal | Number | Boolean | Date -->
      <ValueElement />
    </CustomFieldDefinition>
  </CustomFieldDefinitions>
</Response>';
        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app = new Application('', '');
        $app->setTransport($client);

        $models = $app->load(\XeroPHP\Models\PracticeManager\CustomField::class)->execute();

        /** @var \XeroPHP\Models\PracticeManager\CustomField $model */
        $model = $models->first();

        $this->assertEquals(123, $model->getID());
        $this->assertEquals('Name of Custom Field', $model->getName());
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
