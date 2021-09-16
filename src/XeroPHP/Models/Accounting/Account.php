<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\AttachmentTrait;

class Account extends Remote\Model
{
    use AttachmentTrait;

    /**
     * Customer defined alpha numeric account code e.g 200 or SALES (max length = 10).
     *
     * @property string Code
     */

    /**
     * Name of account (max length = 150).
     *
     * @property string Name
     */

    /**
     * See Account Types.
     *
     * @property string Type
     */

    /**
     * For bank accounts only (Account Type BANK).
     *
     * @property string BankAccountNumber
     */

    /**
     * Accounts with a status of ACTIVE can be updated to ARCHIVED. See Account Status Codes.
     *
     * @property string Status
     */

    /**
     * Description of the Account. Valid for all types of accounts except bank accounts (max length = 4000).
     *
     * @property string Description
     */

    /**
     * For bank accounts only. See Bank Account types.
     *
     * @property string BankAccountType
     */

    /**
     * For bank accounts only.
     *
     * @property string CurrencyCode
     */

    /**
     * See Tax Types.
     *
     * @property string TaxType
     */

    /**
     * Boolean – describes whether account can have payments applied to it.
     *
     * @property bool EnablePaymentsToAccount
     */

    /**
     * Boolean – describes whether account code is available for use with expense claims.
     *
     * @property bool ShowInExpenseClaims
     */

    /**
     * The Xero identifier for an account – specified as a string following the endpoint name
     * e.g.
     * /297c2dc5-cc47-4afd-8ec8-74990b8761e9.
     *
     * @property string AccountID
     */

    /**
     * See Account Class Types.
     *
     * @property string Class
     */

    /**
     * If this is a system account then this element is returned. See System Account types. Note that
     * non-system accounts may have this element set as either “” or null.
     *
     * @property string SystemAccount
     */

    /**
     * Shown if set.
     *
     * @property string ReportingCode
     */

    /**
     * Shown if set.
     *
     * @property string ReportingCodeName
     */

    /**
     * boolean to indicate if an account has an attachment (read only).
     *
     * @property bool HasAttachments
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */
    const ACCOUNT_CLASS_TYPE_ASSET = 'ASSET';

    const ACCOUNT_CLASS_TYPE_EQUITY = 'EQUITY';

    const ACCOUNT_CLASS_TYPE_EXPENSE = 'EXPENSE';

    const ACCOUNT_CLASS_TYPE_LIABILITY = 'LIABILITY';

    const ACCOUNT_CLASS_TYPE_REVENUE = 'REVENUE';

    const ACCOUNT_TYPE_BANK = 'BANK';

    const ACCOUNT_TYPE_CURRENT = 'CURRENT';

    const ACCOUNT_TYPE_CURRLIAB = 'CURRLIAB';

    const ACCOUNT_TYPE_DEPRECIATN = 'DEPRECIATN';

    const ACCOUNT_TYPE_DIRECTCOSTS = 'DIRECTCOSTS';

    const ACCOUNT_TYPE_EQUITY = 'EQUITY';

    const ACCOUNT_TYPE_EXPENSE = 'EXPENSE';

    const ACCOUNT_TYPE_FIXED = 'FIXED';

    const ACCOUNT_TYPE_INVENTORY = 'INVENTORY';

    const ACCOUNT_TYPE_LIABILITY = 'LIABILITY';

    const ACCOUNT_TYPE_NONCURRENT = 'NONCURRENT';

    const ACCOUNT_TYPE_OTHERINCOME = 'OTHERINCOME';

    const ACCOUNT_TYPE_OVERHEADS = 'OVERHEADS';

    const ACCOUNT_TYPE_PREPAYMENT = 'PREPAYMENT';

    const ACCOUNT_TYPE_REVENUE = 'REVENUE';

    const ACCOUNT_TYPE_SALES = 'SALES';

    const ACCOUNT_TYPE_TERMLIAB = 'TERMLIAB';

    const ACCOUNT_TYPE_PAYGLIABILITY = 'PAYGLIABILITY';

    const ACCOUNT_TYPE_SUPERANNUATIONEXPENSE = 'SUPERANNUATIONEXPENSE';

    const ACCOUNT_TYPE_SUPERANNUATIONLIABILITY = 'SUPERANNUATIONLIABILITY';

    const ACCOUNT_TYPE_WAGESEXPENSE = 'WAGESEXPENSE';

    const ACCOUNT_TYPE_WAGESPAYABLELIABILITY = 'WAGESPAYABLELIABILITY';

    const ACCOUNT_STATUS_ACTIVE = 'ACTIVE';

    const ACCOUNT_STATUS_ARCHIVED = 'ARCHIVED';

    const BANK_ACCOUNT_TYPE_BANK = 'BANK';

    const BANK_ACCOUNT_TYPE_CREDITCARD = 'CREDITCARD';

    const BANK_ACCOUNT_TYPE_PAYPAL = 'PAYPAL';

    const SYSTEM_ACCOUNT_DEBTORS = 'DEBTORS';

    const SYSTEM_ACCOUNT_CREDITORS = 'CREDITORS';

    const SYSTEM_ACCOUNT_BANKCURRENCYGAIN = 'BANKCURRENCYGAIN';

    const SYSTEM_ACCOUNT_GST = 'GST';

    const SYSTEM_ACCOUNT_GSTONIMPORTS = 'GSTONIMPORTS';

    const SYSTEM_ACCOUNT_HISTORICAL = 'HISTORICAL';

    const SYSTEM_ACCOUNT_REALISEDCURRENCYGAIN = 'REALISEDCURRENCYGAIN';

    const SYSTEM_ACCOUNT_RETAINEDEARNINGS = 'RETAINEDEARNINGS';

    const SYSTEM_ACCOUNT_ROUNDING = 'ROUNDING';

    const SYSTEM_ACCOUNT_TRACKINGTRANSFERS = 'TRACKINGTRANSFERS';

    const SYSTEM_ACCOUNT_UNPAIDEXPCLM = 'UNPAIDEXPCLM';

    const SYSTEM_ACCOUNT_UNREALISEDCURRENCYGAIN = 'UNREALISEDCURRENCYGAIN';

    const SYSTEM_ACCOUNT_WAGEPAYABLES = 'WAGEPAYABLES';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Accounts';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Account';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'AccountID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE,
        ];
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
            'Code' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'BankAccountNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BankAccountType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'EnablePaymentsToAccount' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'ShowInExpenseClaims' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'AccountID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Class' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'SystemAccount' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ReportingCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReportingCodeName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setCode($value)
    {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;

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
     * @return Account
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
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Account
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
    public function getBankAccountNumber()
    {
        return $this->_data['BankAccountNumber'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setBankAccountNumber($value)
    {
        $this->propertyUpdated('BankAccountNumber', $value);
        $this->_data['BankAccountNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccountType()
    {
        return $this->_data['BankAccountType'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setBankAccountType($value)
    {
        $this->propertyUpdated('BankAccountType', $value);
        $this->_data['BankAccountType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setCurrencyCode($value)
    {
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType()
    {
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setTaxType($value)
    {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getEnablePaymentsToAccount()
    {
        return $this->_data['EnablePaymentsToAccount'];
    }

    /**
     * @param bool $value
     *
     * @return Account
     */
    public function setEnablePaymentsToAccount($value)
    {
        $this->propertyUpdated('EnablePaymentsToAccount', $value);
        $this->_data['EnablePaymentsToAccount'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getShowInExpenseClaims()
    {
        return $this->_data['ShowInExpenseClaims'];
    }

    /**
     * @param bool $value
     *
     * @return Account
     */
    public function setShowInExpenseClaim($value)
    {
        $this->propertyUpdated('ShowInExpenseClaims', $value);
        $this->_data['ShowInExpenseClaims'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountID()
    {
        return $this->_data['AccountID'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setAccountID($value)
    {
        $this->propertyUpdated('AccountID', $value);
        $this->_data['AccountID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->_data['Class'];
    }

    /**
     * @return string
     */
    public function getSystemAccount()
    {
        return $this->_data['SystemAccount'];
    }

    /**
     * @return string
     */
    public function getReportingCode()
    {
        return $this->_data['ReportingCode'];
    }

    /**
     * @return string
     */
    public function getReportingCodeName()
    {
        return $this->_data['ReportingCodeName'];
    }

    /**
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }
}
