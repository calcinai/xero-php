<?php

namespace XeroPHP\Models\PracticeManager;

use XeroPHP\Models\PracticeManager\Client\AccountManager;
use XeroPHP\Models\PracticeManager\Client\BillingClient;
use XeroPHP\Models\PracticeManager\Client\Contact;
use XeroPHP\Models\PracticeManager\Client\Group;
use XeroPHP\Models\PracticeManager\Client\JobManager;
use XeroPHP\Models\PracticeManager\Client\Note;
use XeroPHP\Models\PracticeManager\Client\Relationship;
use XeroPHP\Models\PracticeManager\Client\Type;
use XeroPHP\Remote;
use XeroPHP\Traits\PracticeManager\CustomFieldValueTrait;

class Client extends Remote\Model
{
    use CustomFieldValueTrait;

    /**
     * Xero identifier.
     *
     * @property string ID
     */

    /**
     * Full name of Client/organisation (max length = 255).
     *
     * @property string Name
     */

    /**
     * First name of Client person (max length = 255).
     *
     * @property string FirstName
     */

    /**
     * Last name of Client person (max length = 255).
     *
     * @property string LastName
     */

    /**
     * Other name of Client person (max length = 255).
     *
     * @property string OtherName
     */

    /**
     * Date of birth of Client person (max length = 255).
     *
     * @property string DateOfBirth
     */

    /**
     * Email address of Client person (umlauts not supported) (max length = 255).
     *
     * @property string Email
     */

    /**
     * Physical Address
     * @property string Address
     * @property string City
     * @property string Region
     * @property string PostCode
     * @property string Country
     */

    /**
     * Postal Address
     * @property string PostalAddress
     * @property string PostalCity
     * @property string PostalRegion
     * @property string PostalPostCode
     * @property string PostalCountry
     */

    /**
     * @property string Phone
     * @property string Fax
     * @property string Website
     * @property string ReferralSource
     * @property string ExportCode
     * @property string IsProspect
     * where the tax number is masked with *** except last 3 digits
     * @property string TaxNumber
     * @property string CompanyNumber
     * @property string BusinessNumber
     * e.g. Individual, Company, Trust, etc
     * @property string BusinessStructure
     * @property string BalanceMonth
     * Yes or No
     * @property string PrepareGST
     * Yes or No
     * @property string GSTRegistered
     * Monthly, 2 Monthly, 6 Monthly
     * @property string GSTPeriod
     * Invoice, Payment, Hybrid
     * @property string GSTBasis
     * Standard Option, Estimate Option, Ratio Option
     * @property string ProvisionalTaxBasis
     * @property string ProvisionalTaxRatio
     * Yes or No
     * @property string SignedTaxAuthority
     * @property string TaxAgent
     * With EOT, Without EOT, Unlinked
     * @property string AgencyStatus
     * IR3, IR3NR, IR4, IR6, IR7, IR9, PTS
     * @property string ReturnType
     *
     * The following fields apply to AU clients only
     * Yes or No
     * @property string PrepareActivityStatement
     * Yes or No
     * @property string PrepareTaxReturn
     *
     *
     * @property string AgencyStatus
     * @property string AgencyStatus
     */

    /**
     * See Client contacts.
     *
     * @property Contact[] Contacts
     */

    /**
     * See Account Manager.
     *
     * @property AccountManager AccountManager
     *
     */

    /**
     * See Job Manager.
     *
     * @property JobManager JobManager
     *
     */

    /**
     * See Type
     *
     * @property Type Type
     *
     */

    /**
     * See BillingClient
     *
     * @property BillingClient BillingClient
     *
     */

    /**
     * See Note
     *
     * @property Note[] Note
     *
     */

    /**
     * See Group
     *
     * @property Group[] Group
     *
     */

    /**
     * See Relationship
     *
     * @property Relationship[] Relationship
     *
     */

    /**
     * Get the resource uri of the class (Clients) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'client.api/list';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Client';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PRACTICE_MANAGER;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET,
        ];
    }

    public function getCustomFieldValueUri()
    {
        return 'client.api/get/%s/customfield';
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'ID'                       => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'Name'                     => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FirstName'                => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName'                 => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'OtherName'                => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'DateOfBirth'              => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Email'                    => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Address'                  => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'City'                     => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Region'                   => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostCode'                 => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Country'                  => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalAddress'            => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalCity'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalRegion'             => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalPostCode'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalCountry'            => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Phone'                    => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Fax'                      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Website'                  => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReferralSource'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExportCode'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsProspect'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxNumber'                => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CompanyNumber'            => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BusinessNumber'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BusinessStructure'        => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'BalanceMonth'             => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PrepareGST'               => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'GSTRegistered'            => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'GSTPeriod'                => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'GSTBasis'                 => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ProvisionalTaxBasis'      => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ProvisionalTaxRatio'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SignedTaxAuthority'       => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TaxAgent'                 => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AgencyStatus'             => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ReturnType'               => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PrepareActivityStatement' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PrepareTaxReturn'         => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Contacts'                 => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\Contact', true, false],
            'Notes'                    => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\Note', true, false],
            'Groups'                   => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\Group', true, false],
            'Relationships'            => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\Relationship', true, false],
            'AccountManager'           => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\AccountManager', false, false],
            'JobManager'               => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\JobManager', false, false],
            'Type'                     => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\Type', false, false],
            'BillingClient'            => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\BillingClient', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param int $value
     *
     * @return Client
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setFirstName($value)
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getOtherName()
    {
        return $this->_data['OtherName'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setOtherName($value)
    {
        $this->propertyUpdated('OtherName', $value);
        $this->_data['OtherName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDateOfBirth()
    {
        return $this->_data['DateOfBirth'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setDateOfBirth($value)
    {
        $this->propertyUpdated('DateOfBirth', $value);
        $this->_data['DateOfBirth'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data['Email'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setEmail($value)
    {
        $this->propertyUpdated('Email', $value);
        $this->_data['Email'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->_data['Address'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setAddress($value)
    {
        $this->propertyUpdated('Address', $value);
        $this->_data['Address'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_data['City'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setCity($value)
    {
        $this->propertyUpdated('City', $value);
        $this->_data['City'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->_data['Region'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setRegion($value)
    {
        $this->propertyUpdated('Region', $value);
        $this->_data['Region'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->_data['PostCode'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostCode($value)
    {
        $this->propertyUpdated('PostCode', $value);
        $this->_data['PostCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_data['Country'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setCountry($value)
    {
        $this->propertyUpdated('Country', $value);
        $this->_data['Country'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalAddress()
    {
        return $this->_data['PostalAddress'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostalAddress($value)
    {
        $this->propertyUpdated('PostalAddress', $value);
        $this->_data['PostalAddress'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCity()
    {
        return $this->_data['PostalCity'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostalCity($value)
    {
        $this->propertyUpdated('PostalCity', $value);
        $this->_data['PostalCity'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalRegion()
    {
        return $this->_data['PostalRegion'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostalRegion($value)
    {
        $this->propertyUpdated('PostalRegion', $value);
        $this->_data['PostalRegion'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalPostCode()
    {
        return $this->_data['PostalPostCode'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostalPostCode($value)
    {
        $this->propertyUpdated('PostalPostCode', $value);
        $this->_data['PostalPostCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCountry()
    {
        return $this->_data['PostalCountry'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPostalCountry($value)
    {
        $this->propertyUpdated('PostalCountry', $value);
        $this->_data['PostalCountry'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_data['Phone'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPhone($value)
    {
        $this->propertyUpdated('Phone', $value);
        $this->_data['Phone'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFax()
    {
        return $this->_data['Fax'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setFax($value)
    {
        $this->propertyUpdated('Fax', $value);
        $this->_data['Fax'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->_data['Website'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setWebsite($value)
    {
        $this->propertyUpdated('Website', $value);
        $this->_data['Website'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferralSource()
    {
        return $this->_data['ReferralSource'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setReferralSource($value)
    {
        $this->propertyUpdated('ReferralSource', $value);
        $this->_data['ReferralSource'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getExportCode()
    {
        return $this->_data['ExportCode'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setExportCode($value)
    {
        $this->propertyUpdated('ExportCode', $value);
        $this->_data['ExportCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsProspect()
    {
        return $this->_data['IsProspect'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setIsProspect($value)
    {
        $this->propertyUpdated('IsProspect', $value);
        $this->_data['IsProspect'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxNumber()
    {
        return $this->_data['TaxNumber'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setTaxNumber($value)
    {
        $this->propertyUpdated('TaxNumber', $value);
        $this->_data['TaxNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompanyNumber()
    {
        return $this->_data['CompanyNumber'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setCompanyNumber($value)
    {
        $this->propertyUpdated('CompanyNumber', $value);
        $this->_data['CompanyNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessNumber()
    {
        return $this->_data['BusinessNumber'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setBusinessNumber($value)
    {
        $this->propertyUpdated('BusinessNumber', $value);
        $this->_data['BusinessNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBusinessStructure()
    {
        return $this->_data['BusinessStructure'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setBusinessStructure($value)
    {
        $this->propertyUpdated('BusinessStructure', $value);
        $this->_data['BusinessStructure'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalanceMonth()
    {
        return $this->_data['BalanceMonth'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setBalanceMonth($value)
    {
        $this->propertyUpdated('BalanceMonth', $value);
        $this->_data['BalanceMonth'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrepareGST()
    {
        return $this->_data['PrepareGST'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPrepareGST($value)
    {
        $this->propertyUpdated('PrepareGST', $value);
        $this->_data['PrepareGST'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getGSTRegistered()
    {
        return $this->_data['GSTRegistered'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setGSTRegistered($value)
    {
        $this->propertyUpdated('GSTRegistered', $value);
        $this->_data['GSTRegistered'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getGSTPeriod()
    {
        return $this->_data['GSTPeriod'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setGSTPeriod($value)
    {
        $this->propertyUpdated('GSTPeriod', $value);
        $this->_data['GSTPeriod'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getGSTBasis()
    {
        return $this->_data['GSTBasis'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setGSTBasis($value)
    {
        $this->propertyUpdated('GSTBasis', $value);
        $this->_data['GSTBasis'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvisionalTaxBasis()
    {
        return $this->_data['ProvisionalTaxBasis'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setProvisionalTaxBasis($value)
    {
        $this->propertyUpdated('ProvisionalTaxBasis', $value);
        $this->_data['ProvisionalTaxBasis'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getProvisionalTaxRatio()
    {
        return $this->_data['ProvisionalTaxRatio'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setProvisionalTaxRatio($value)
    {
        $this->propertyUpdated('ProvisionalTaxRatio', $value);
        $this->_data['ProvisionalTaxRatio'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSignedTaxAuthority()
    {
        return $this->_data['SignedTaxAuthority'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setSignedTaxAuthority($value)
    {
        $this->propertyUpdated('SignedTaxAuthority', $value);
        $this->_data['SignedTaxAuthority'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxAgent()
    {
        return $this->_data['TaxAgent'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setTaxAgent($value)
    {
        $this->propertyUpdated('TaxAgent', $value);
        $this->_data['TaxAgent'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAgencyStatus()
    {
        return $this->_data['AgencyStatus'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setAgencyStatus($value)
    {
        $this->propertyUpdated('AgencyStatus', $value);
        $this->_data['AgencyStatus'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReturnType()
    {
        return $this->_data['ReturnType'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setReturnType($value)
    {
        $this->propertyUpdated('ReturnType', $value);
        $this->_data['ReturnType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrepareActivityStatement()
    {
        return $this->_data['PrepareActivityStatement'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPrepareActivityStatement($value)
    {
        $this->propertyUpdated('PrepareActivityStatement', $value);
        $this->_data['PrepareActivityStatement'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrepareTaxReturn()
    {
        return $this->_data['PrepareTaxReturn'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setPrepareTaxReturn($value)
    {
        $this->propertyUpdated('PrepareTaxReturn', $value);
        $this->_data['PrepareTaxReturn'] = $value;

        return $this;
    }

    /**
     * @return Contact[]|Remote\Collection
     */
    public function getContacts()
    {
        return $this->_data['Contacts'];
    }

    /**
     * @param Contact $value
     *
     * @return Client
     */
    public function addContact(Contact $value)
    {
        $this->propertyUpdated('Contacts', $value);
        if (!isset($this->_data['Contacts'])) {
            $this->_data['Contacts'] = new Remote\Collection();
        }
        $this->_data['Contacts'][] = $value;

        return $this;
    }

    /**
     * @return Note[]|Remote\Collection
     */
    public function getNotes()
    {
        return $this->_data['Notes'];
    }

    /**
     * @param Note $value
     *
     * @return Client
     */
    public function addNote(Note $value)
    {
        $this->propertyUpdated('Notes', $value);
        if (!isset($this->_data['Notes'])) {
            $this->_data['Notes'] = new Remote\Collection();
        }
        $this->_data['Notes'][] = $value;

        return $this;
    }

    /**
     * @return Group[]|Remote\Collection
     */
    public function getGroups()
    {
        return $this->_data['Groups'];
    }

    /**
     * @param Group $value
     *
     * @return Client
     */
    public function addGroup(Group $value)
    {
        $this->propertyUpdated('Groups', $value);
        if (!isset($this->_data['Groups'])) {
            $this->_data['Groups'] = new Remote\Collection();
        }
        $this->_data['Groups'][] = $value;

        return $this;
    }

    /**
     * @return Relationship[]|Remote\Collection
     */
    public function getRelationships()
    {
        return $this->_data['Relationships'];
    }

    /**
     * @param Relationship $value
     *
     * @return Client
     */
    public function addRelationship(Relationship $value)
    {
        $this->propertyUpdated('Relationships', $value);
        if (!isset($this->_data['Relationships'])) {
            $this->_data['Relationships'] = new Remote\Collection();
        }
        $this->_data['Relationships'][] = $value;

        return $this;
    }

    /**
     * @return AccountManager
     */
    public function getAccountManager()
    {
        return $this->_data['AccountManager'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setAccountManager($value)
    {
        $this->propertyUpdated('AccountManager', $value);
        $this->_data['AccountManager'] = $value;

        return $this;
    }

    /**
     * @return JobManager
     */
    public function getJobManager()
    {
        return $this->_data['JobManager'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setJobManager($value)
    {
        $this->propertyUpdated('JobManager', $value);
        $this->_data['JobManager'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillingClient()
    {
        return $this->_data['BillingClient'];
    }

    /**
     * @param string $value
     *
     * @return Client
     */
    public function setBillingClient($value)
    {
        $this->propertyUpdated('BillingClient', $value);
        $this->_data['BillingClient'] = $value;

        return $this;
    }
}
