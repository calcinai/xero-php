<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact\ContactPerson;
use XeroPHP\Models\Accounting\TrackingCategory;
use XeroPHP\Models\Accounting\BrandingTheme;
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
     * This can be updated via the API and the Xero UI (max length = 50)
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
     * @property string Addresses
     */

    /**
     * Store certain phone types for a contact – see phone types
     *
     * @property string Phones
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
     * @property string[] ContactGroups
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


    const CONTACT_STATUS_CODE_ACTIVE   = 'ACTIVE'; 
    const CONTACT_STATUS_CODE_ARCHIVED = 'ARCHIVED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Contacts';
    }


    /*
    * Get the stem of the API (core.xro) etc
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

    public static function getProperties(){
            return array(
                'ContactID',
                'ContactNumber',
                'AccountNumber',
                'ContactStatus',
                'Name',
                'FirstName',
                'LastName',
                'EmailAddress',
                'SkypeUserName',
                'ContactPersons',
                'BankAccountDetails',
                'TaxNumber',
                'AccountsReceivableTaxType',
                'AccountsPayableTaxType',
                'Addresses',
                'Phones',
                'UpdatedDateUTC',
                'IsSupplier',
                'IsCustomer',
                'DefaultCurrency',
                'XeroNetworkKey',
                'SalesDefaultAccountCode',
                'PurchasesDefaultAccountCode',
                'SalesTrackingCategories',
                'PurchasesTrackingCategories',
                'ContactGroups',
                'Website',
                'BrandingTheme',
                'BatchPayments',
                'Discount',
                'Balances',
                'PaymentTerms',
                'HasAttachments'
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
    public function setContactStatu($value){
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
        $this->_data['AccountsPayableTaxType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddresses(){
        return $this->_data['Addresses'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setAddress($value){
        $this->_data['Addresses'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhones(){
        return $this->_data['Phones'];
    }

    /**
     * @param string $value
     * @return Contact
     */
    public function setPhone($value){
        $this->_data['Phones'] = $value;
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
        $this->_data['PurchasesTrackingCategories'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactGroups(){
        return $this->_data['ContactGroups'];
    }

    /**
     * @param string[] $value
     * @return Contact
     */
    public function addContactGroup($value){
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
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}