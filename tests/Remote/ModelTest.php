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
        $testXML      = '<Response><Models><Model><ModelID>test</ModelID><EarningsLines /></Model></Models></Response>';
        $mock         = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app    = new Application('', '');
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
      <Groups>
        <Group>
          <ID>783949</ID>
          <Name>1 Geotechnical Limited</Name>
        </Group>
      </Groups>
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

        $customFieldValueXml = '<Response>
  <Status>OK</Status>
  <CustomFields>
    <CustomField>
      <ID>1</ID>
      <Name>Date Field</Name>
      <Date>2010-10-11T00:00:00</Date>
    </CustomField>
    <CustomField>
      <ID>2</ID>
      <Name>Number Field</Name>
      <Number>123</Number>
    </CustomField>
    <CustomField>
      <ID>3</ID>
      <Name>Decimal Field</Name>
      <Decimal>123.45</Decimal>
    </CustomField>
    <CustomField>
      <ID>4</ID>
      <Name>Boolean Field</Name>
      <Boolean>true</Boolean>
    </CustomField>
    <CustomField>
      <ID>5</ID>
      <Name>Text Field</Name>
      <Text>some text</Text>
    </CustomField>
  </CustomFields>
</Response>';
        $mock                = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
            new Response(200, ['Content-Type' => 'text/xml'], $customFieldValueXml),
        ]);
        $handlerStack        = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app    = new Application('', '');
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

        $this->assertEquals(2, $model->getAccountManager()->getID());
        $this->assertEquals('Jo Blogs', $model->getAccountManager()->getName());

        $this->assertCount(1, $model->getGroups());

        $customFieldValues = $model->getCustomFieldValues();

        $this->assertCount(5, $customFieldValues);

        $dateFieldValue = $customFieldValues[0];
        $this->assertEquals(1, $dateFieldValue->getId());
        $this->assertEquals('Date Field', $dateFieldValue->getName());
        $this->assertEquals('2010-10-11 00:00:00', $dateFieldValue->getDate()->format('Y-m-d H:i:s'));

        $numberFieldValue = $customFieldValues[1];
        $this->assertEquals(2, $numberFieldValue->getId());
        $this->assertEquals('Number Field', $numberFieldValue->getName());
        $this->assertEquals(123, $numberFieldValue->getNumber());

        $decimalFieldValue = $customFieldValues[2];
        $this->assertEquals(3, $decimalFieldValue->getId());
        $this->assertEquals('Decimal Field', $decimalFieldValue->getName());
        $this->assertEquals(123.45, $decimalFieldValue->getDecimal());

        $booleanFieldValue = $customFieldValues[3];
        $this->assertEquals(4, $booleanFieldValue->getId());
        $this->assertEquals('Boolean Field', $booleanFieldValue->getName());
        $this->assertEquals(true, $booleanFieldValue->getBoolean());

        $textFieldValue = $customFieldValues[4];
        $this->assertEquals(5, $textFieldValue->getId());
        $this->assertEquals('Text Field', $textFieldValue->getName());
        $this->assertEquals('some text', $textFieldValue->getText());

    }

    public function testPracticeManagerCustomFieldListIsReturned()
    {
        $testXML      = '<Response>
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
        $mock         = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app    = new Application('', '');
        $app->setTransport($client);

        $models = $app->load(\XeroPHP\Models\PracticeManager\CustomField::class)->execute();

        /** @var \XeroPHP\Models\PracticeManager\CustomField $model */
        $model = $models->first();

        $this->assertEquals(123, $model->getID());
        $this->assertEquals('Name of Custom Field', $model->getName());
    }

    public function testPracticeManagerInvoiceListIsReturned()
    {
        $testXML      = '<Response>
  <Status>OK</Status> 
  <Invoices>
  <Invoice>
    <ID>I000123</ID>
    <InternalID>123</InternalID>
    <Type>Progress Invoice</Type> 
    <Status>Approved</Status>   <!-- Approved, Paid, Draft, Cancelled -->
    <JobText>J000123</JobText>
    <Date>2007-09-15T00:00:00</Date> 
    <DueDate>2007-09-22T00:00:00</DueDate> 
    <Amount>200.00</Amount> 
    <AmountTax>25.00</AmountTax> 
    <AmountIncludingTax>225.00</AmountIncludingTax> 
    <AmountPaid>100.00</AmountPaid> 
    <AmountOutstanding>125.00</AmountOutstanding> 
    <Client>
      <ID>1</ID>
      <Name>John Smith Limited</Name> 
    </Client>
    <Contact>
      <ID>512</ID>
      <Name>Andy Smith</Name> 
    </Contact>
    <Jobs>
      <Job>
        <ID>J000345</ID> 
        <Name>Brochure Design</Name> 
        <Description></Description> 
        <ClientOrderNumber />
        <Tasks>
          <Task>
            <ID>15</ID>
            <Name>Design</Name> 
            <Description></Description> 
            <Minutes>60</Minutes> 
            <BillableRate>150</BillableRate> 
            <Billable>Yes</Billable> 
            <Amount>150.00</Amount> 
            <AmountTax>18.75</AmountTax> 
            <AmountIncludingTax>168.75</AmountIncludingTax> 
          </Task>
        </Tasks>
        <Costs>
          <Cost>
            <Description>Courier</Description>
            <Note>Note</Note> 
            <Code>COURIER</Code> 
            <Billable>Yes</Billable> 
            <Quantity>1</Quantity> 
            <UnitCost>50.00</UnitCost> 
            <UnitPrice>50.00</UnitPrice> 
            <Amount>50.00</Amount> 
            <AmountTax>6.25</AmountTax> 
            <AmountIncludingTax>56.25</AmountIncludingTax> 
          </Cost>
        </Costs>
      </Job>
    </Jobs>
    <Tasks>
        <Task>
            <ID>495128309</ID>
            <Name>ASIC Administration</Name>
            <Description>Attending to requirements in respect of ASIC Annual Company Statement</Description>
            <Minutes>60</Minutes>
            <BillableRate>5000.00</BillableRate>
            <Billable>Yes</Billable>
            <Amount>5000.00</Amount>
            <AmountTax>500.00</AmountTax>
            <AmountIncludingTax>5500.00</AmountIncludingTax>
        </Task>
    </Tasks>
  </Invoice>
  </Invoices>
</Response>';
        $mock         = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app    = new Application('', '');
        $app->setTransport($client);

        $models = $app->load(\XeroPHP\Models\PracticeManager\Invoice::class)->execute();

        /** @var \XeroPHP\Models\PracticeManager\Invoice $model */
        $model = $models->first();

        $this->assertEquals('I000123', $model->getID());
        $this->assertEquals(123, $model->getInternalID());
        $this->assertEquals('John Smith Limited', $model->getClient()->getName());

        $this->assertCount(1, $model->getJobs());
        $this->assertCount(1, $model->getTasks());
    }

    public function testPracticeManagerInvoiceWithNoLineInfo()
    {
        $testXML      = '<Response>
  <Status>OK</Status> 
  <Invoices>
    <Invoice>
            <ID>17940</ID>
            <InternalID>154912192</InternalID>
            <Type>Progress Invoice</Type>
            <JobText>J000316</JobText>
            <Description></Description>
            <Date>2017-05-10T00:00:00</Date>
            <DueDate>2017-05-24T00:00:00</DueDate>
            <Amount>0.00</Amount>
            <AmountTax>0.00</AmountTax>
            <AmountIncludingTax>0.00</AmountIncludingTax>
            <AmountPaid>0.00</AmountPaid>
            <AmountOutstanding>0.00</AmountOutstanding>
            <Status>Paid</Status>
            <Client>
                <ID>11111</ID>
                <Name>Ting, Ting</Name>
            </Client>
            <Jobs>
                <Job>
                    <ID>J000316</ID>
                    <Name>Activity Statement - Quarterly</Name>
                    <Description>Preparation of Business Activity Statement</Description>
                    <ClientOrderNumber></ClientOrderNumber>
                    <Tasks>
                        <Task>
                            <ID>225771997</ID>
                            <Name>Prepare Activity Statement - March</Name>
                            <Description></Description>
                            <Minutes>0</Minutes>
                            <BillableRate></BillableRate>
                            <Billable>Yes</Billable>
                            <Amount>0.00</Amount>
                            <AmountTax>0.00</AmountTax>
                            <AmountIncludingTax>0.00</AmountIncludingTax>
                        </Task>
                    </Tasks>
                    <Costs />
                </Job>
            </Jobs>
        </Invoice>
  </Invoices>
</Response>';
        $mock         = new MockHandler([
            new Response(200, ['Content-Type' => 'text/xml'], $testXML),
        ]);
        $handlerStack = HandlerStack::create($mock);

        $client = new Client(['handler' => $handlerStack]);
        $app    = new Application('', '');
        $app->setTransport($client);

        $models = $app->load(\XeroPHP\Models\PracticeManager\Invoice::class)->execute();

        /** @var \XeroPHP\Models\PracticeManager\Invoice $model */
        $model = $models->first();

        $this->assertEquals('17940', $model->getID());
        $this->assertEquals(154912192, $model->getInternalID());
        $this->assertEquals('Ting, Ting', $model->getClient()->getName());

        $this->assertCount(1, $model->getJobs());
        $this->assertNull($model->getTasks());
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
