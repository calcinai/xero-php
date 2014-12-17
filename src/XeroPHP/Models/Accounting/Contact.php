<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact\ContactPerson;
use XeroPHP\Models\Accounting\Organisation\PaymentTerm;

class Contact extends Remote\Object {

    /**
     * Xero identifier
     *
     * @property string ContactID
     */

    /**
     * This can be updated via the API only i.e. This field is read only on the Xero contact screen, used
     * to identify contacts in external systems (max length = 50)
     *
     * @property string ContactNumber
     */

    /**
     * A user defined account number.  This can be updated via the API and the Xero UI (max length = 50)
     *
     * @property string AccountNumber
     */

    /**
     * Current status of a contact – see contact status types
     *
     * @property string ContactStatus
     */

    /**
     * Name of contact organisation (max length = 500)
     *
     * @property string Name
     */

    /**
     * First name of contact person (max length = 255)
     *
     * @property string FirstName
     */

    /**
     * Last name of contact person (max length = 255)
     *
     * @property string LastName
     */

    /**
     * Email address of contact person (umlauts not supported) (max length = 500)
     *
     * @property string EmailAddress
     */

    /**
     * Skype user name of contact
     *
     * @property string SkypeUserName
     */

    /**
     * See contact persons
     *
     * @property ContactPerson[] ContactPersons
     */

    /**
     * Bank account number of contact
     *
     * @property string[] BankAccountDetails
     */

    /**
     * Tax number of contact – this is also known as the ABN (Australia), GST Number (New Zealand), VAT
     * Number (UK) or Tax ID Number (US and global) in the Xero UI depending on which regionalized version
     * of Xero you are using (max length = 50)
     *
     * @property string TaxNumber
     */

    /**
     * Default tax type used for contact on AR invoices
     *
     * @property string AccountsReceivableTaxType
     */

    /**
     * Default tax type used for contact on AP invoices
     *
     * @property string AccountsPayableTaxType
     */

    /**
     * Store certain address types for a contact – see address types
     *
     * @property Address[] Addresses
     */

    /**
     * Store certain phone types for a contact – see phone types
     *
     * @property Phone[] Phones
     */

    /**
     * UTC timestamp of last update to contact
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * true or false – Boolean that describes if a contact that has any AP invoices entered against them.
     * Cannot be set via PUT or POST – it is automatically set when an accounts payable invoice is
     * generated against this contact.
     *
     * @property bool IsSupplier
     */

    /**
     * true or false – Boolean that describes if a contact has any AR invoices entered against them.
     * Cannot be set via PUT or POST – it is automatically set when an accounts receivable invoice is
     * generated against this contact.
     *
     * @property bool IsCustomer
     */

    /**
     * Default currency for raising invoices against contact
     *
     * @property string DefaultCurrency
     */

    /**
     * Store XeroNetworkKey for contacts.
     *
     * @property string XeroNetworkKey
     */

    /**
     * The default sales account code for contacts
     *
     * @property string SalesDefaultAccountCode
     */

    /**
     * The default purchases account code for contacts
     *
     * @property string PurchasesDefaultAccountCode
     */

    /**
     * The default sales tracking categories for contacts
     *
     * @property TrackingCategory[] SalesTrackingCategories
     */

    /**
     * The default purchases tracking categories for contacts
     *
     * @property TrackingCategory[] PurchasesTrackingCategories
     */

    /**
     * Displays which contact groups a contact is included in
     *
     * @property ContactGroup[] ContactGroups
     */

    /**
     * Website address for contact (read only)
     *
     * @property string Website
     */

    /**
     * Default branding theme for contact (read only) – see Branding Themes
     *
     * @property BrandingTheme BrandingTheme
     */

    /**
     * batch payment details for contact (read only)
     *
     * @property string[] BatchPayments
     */

    /**
     * The default discount rate for the contact (read only)
     *
     * @property float Discount
     */

    /**
     * The AccountsReceivable(sales invoices) and AccountsPayable(bills) outstanding and overdue amounts
     * (read only)
     *
     * @property string[] Balances
     */

    /**
     * The default payment terms for the contact (read only)  – see Payment Terms
     *
     * @property PaymentTerm[] PaymentTerms
     */

    /**
     * A boolean to indicate if a contact has an attachment
     *
     * @property bool HasAttachments
     */


    const CONTACT_STATUS_ACTIVE   = 'ACTIVE'; 
    const CONTACT_STATUS_ARCHIVED = 'ARCHIVED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'Contacts';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'Contact';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'ContactID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'ContactID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'ContactNumber' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AccountNumber' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'ContactStatus' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'Name' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'FirstName' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'LastName' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'EmailAddress' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'SkypeUserName' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'ContactPersons' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact\\ContactPerson', true),
            'BankAccountDetails' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'TaxNumber' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AccountsReceivableTaxType' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AccountsPayableTaxType' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Addresses' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Address', true),
            'Phones' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Phone', true),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'IsSupplier' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false),
            'IsCustomer' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false),
            'DefaultCurrency' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'XeroNetworkKey' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'SalesDefaultAccountCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'PurchasesDefaultAccountCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'SalesTrackingCategories' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true),
            'PurchasesTrackingCategories' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true),
            'ContactGroups' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\ContactGroup', true),
            'Website' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'BrandingTheme' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\BrandingTheme', false),
            'BatchPayments' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'Discount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Balances' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'PaymentTerms' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Organisation\\PaymentTerm', true),
            'HasAttachments' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false)
        );
    }


    /**
     * @return string
     */
    public function getContactID(){
        return $this->_data['ContactID'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setContactID($value){
        $this->propertyUpdated('ContactID', $value);
        $this->_data['ContactID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactNumber(){
        return $this->_data['ContactNumber'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setContactNumber($value){
        $this->propertyUpdated('ContactNumber', $value);
        $this->_data['ContactNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(){
        return $this->_data['AccountNumber'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setAccountNumber($value){
        $this->propertyUpdated('AccountNumber', $value);
        $this->_data['AccountNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactStatus(){
        return $this->_data['ContactStatus'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setContactStatus($value){
        $this->propertyUpdated('ContactStatus', $value);
        $this->_data['ContactStatus'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setName($value){
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(){
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setFirstName($value){
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(){
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setLastName($value){
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress(){
        return $this->_data['EmailAddress'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setEmailAddress($value){
        $this->propertyUpdated('EmailAddress', $value);
        $this->_data['EmailAddress'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSkypeUserName(){
        return $this->_data['SkypeUserName'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setSkypeUserName($value){
        $this->propertyUpdated('SkypeUserName', $value);
        $this->_data['SkypeUserName'] = $value;
        return $this;
    }

    /**
     * @return ContactPerson
     */
    public function getContactPersons(){
        return $this->_data['ContactPersons'];
    }

    /**
     * @param ContactPerson[] $value
     * @return Contact
     */
    public function addContactPerson(ContactPerson $value){
        $this->propertyUpdated('ContactPersons', $value);
        $this->_data['ContactPersons'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccountDetails(){
        return $this->_data['BankAccountDetails'];
    }

    /**
     * @param string[] $value
     * @return Contact
     */
    public function addBankAccountDetail($value){
        $this->propertyUpdated('BankAccountDetails', $value);
        $this->_data['BankAccountDetails'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxNumber(){
        return $this->_data['TaxNumber'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setTaxNumber($value){
        $this->propertyUpdated('TaxNumber', $value);
        $this->_data['TaxNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountsReceivableTaxType(){
        return $this->_data['AccountsReceivableTaxType'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setAccountsReceivableTaxType($value){
        $this->propertyUpdated('AccountsReceivableTaxType', $value);
        $this->_data['AccountsReceivableTaxType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountsPayableTaxType(){
        return $this->_data['AccountsPayableTaxType'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setAccountsPayableTaxType($value){
        $this->propertyUpdated('AccountsPayableTaxType', $value);
        $this->_data['AccountsPayableTaxType'] = $value;
        return $this;
    }

    /**
     * @return Address
     */
    public function getAddresses(){
        return $this->_data['Addresses'];
    }

    /**
     * @param Address[] $value
     * @return Contact
     */
    public function addAddress(Address $value){
        $this->propertyUpdated('Addresses', $value);
        $this->_data['Addresses'][] = $value;
        return $this;
    }

    /**
     * @return Phone
     */
    public function getPhones(){
        return $this->_data['Phones'];
    }

    /**
     * @param Phone[] $value
     * @return Contact
     */
    public function addPhone(Phone $value){
        $this->propertyUpdated('Phones', $value);
        $this->_data['Phones'][] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return Contact
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsSupplier(){
        return $this->_data['IsSupplier'];
    }

    /**
     * @param bool $value
     * @return Contact
     */
    public function setIsSupplier($value){
        $this->propertyUpdated('IsSupplier', $value);
        $this->_data['IsSupplier'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCustomer(){
        return $this->_data['IsCustomer'];
    }

    /**
     * @param bool $value
     * @return Contact
     */
    public function setIsCustomer($value){
        $this->propertyUpdated('IsCustomer', $value);
        $this->_data['IsCustomer'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultCurrency(){
        return $this->_data['DefaultCurrency'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setDefaultCurrency($value){
        $this->propertyUpdated('DefaultCurrency', $value);
        $this->_data['DefaultCurrency'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getXeroNetworkKey(){
        return $this->_data['XeroNetworkKey'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setXeroNetworkKey($value){
        $this->propertyUpdated('XeroNetworkKey', $value);
        $this->_data['XeroNetworkKey'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalesDefaultAccountCode(){
        return $this->_data['SalesDefaultAccountCode'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setSalesDefaultAccountCode($value){
        $this->propertyUpdated('SalesDefaultAccountCode', $value);
        $this->_data['SalesDefaultAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchasesDefaultAccountCode(){
        return $this->_data['PurchasesDefaultAccountCode'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setPurchasesDefaultAccountCode($value){
        $this->propertyUpdated('PurchasesDefaultAccountCode', $value);
        $this->_data['PurchasesDefaultAccountCode'] = $value;
        return $this;
    }

    /**
     * @return TrackingCategory
     */
    public function getSalesTrackingCategories(){
        return $this->_data['SalesTrackingCategories'];
    }

    /**
     * @param TrackingCategory[] $value
     * @return Contact
     */
    public function addSalesTrackingCategory(TrackingCategory $value){
        $this->propertyUpdated('SalesTrackingCategories', $value);
        $this->_data['SalesTrackingCategories'][] = $value;
        return $this;
    }

    /**
     * @return TrackingCategory
     */
    public function getPurchasesTrackingCategories(){
        return $this->_data['PurchasesTrackingCategories'];
    }

    /**
     * @param TrackingCategory[] $value
     * @return Contact
     */
    public function addPurchasesTrackingCategory(TrackingCategory $value){
        $this->propertyUpdated('PurchasesTrackingCategories', $value);
        $this->_data['PurchasesTrackingCategories'][] = $value;
        return $this;
    }

    /**
     * @return ContactGroup
     */
    public function getContactGroups(){
        return $this->_data['ContactGroups'];
    }

    /**
     * @param ContactGroup[] $value
     * @return Contact
     */
    public function addContactGroup(ContactGroup $value){
        $this->propertyUpdated('ContactGroups', $value);
        $this->_data['ContactGroups'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite(){
        return $this->_data['Website'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setWebsite($value){
        $this->propertyUpdated('Website', $value);
        $this->_data['Website'] = $value;
        return $this;
    }

    /**
     * @return BrandingTheme
     */
    public function getBrandingTheme(){
        return $this->_data['BrandingTheme'];
    }

    /**
     * @param BrandingTheme $value
     * @return Contact
     */
    public function setBrandingTheme(BrandingTheme $value){
        $this->propertyUpdated('BrandingTheme', $value);
        $this->_data['BrandingTheme'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBatchPayments(){
        return $this->_data['BatchPayments'];
    }

    /**
     * @param string[] $value
     * @return Contact
     */
    public function addBatchPayment($value){
        $this->propertyUpdated('BatchPayments', $value);
        $this->_data['BatchPayments'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getDiscount(){
        return $this->_data['Discount'];
    }

    /**
     * @param float $value
     * @return Contact
     */
    public function setDiscount($value){
        $this->propertyUpdated('Discount', $value);
        $this->_data['Discount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBalances(){
        return $this->_data['Balances'];
    }

    /**
     * @param string[] $value
     * @return Contact
     */
    public function addBalance($value){
        $this->propertyUpdated('Balances', $value);
        $this->_data['Balances'][] = $value;
        return $this;
    }

    /**
     * @return PaymentTerm
     */
    public function getPaymentTerms(){
        return $this->_data['PaymentTerms'];
    }

    /**
     * @param PaymentTerm[] $value
     * @return Contact
     */
    public function addPaymentTerm(PaymentTerm $value){
        $this->propertyUpdated('PaymentTerms', $value);
        $this->_data['PaymentTerms'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool $value
     * @return Contact
     */
    public function setHasAttachment($value){
        $this->propertyUpdated('HasAttachments', $value);
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}