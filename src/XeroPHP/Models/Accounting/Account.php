<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Account extends Remote\Object {

    /**
     * Customer defined alpha numeric account code e.g 200 or SALES
     *
     * @property string Code
     */

    /**
     * Name of account
     *
     * @property string Name
     */

    /**
     * See Account Types
     *
     * @property string Type
     */

    /**
     * Description of Account. All accounts except bank accounts return this element
     *
     * @property string Description
     */

    /**
     * See Tax Types
     *
     * @property string TaxType
     */

    /**
     * Boolean – describes whether account can have payments applied to it
     *
     * @property bool EnablePaymentsToAccount
     */

    /**
     * Boolean – describes whether account code is available for use with expense claims
     *
     * @property bool ShowInExpenseClaims
     */

    /**
     * The Xero identifier for an account – specified as a string following the endpoint name
e.g.
     * /297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string AccountID
     */

    /**
     * See Account Class Types
     *
     * @property string Class
     */

    /**
     * See Account Status Codes
     *
     * @property string Status
     */

    /**
     * If this is a system account then this element is returned. See System Account types
     *
     * @property string SystemAccount
     */

    /**
     * Shown for bank accounts only
     *
     * @property string BankAccountNumber
     */

    /**
     * Shown for bank accounts only
     *
     * @property string CurrencyCode
     */

    /**
     * Shown if set
     *
     * @property string ReportingCode
     */

    /**
     * Shown if set
     *
     * @property string ReportingCodeName
     */

    /**
     * boolean to indicate if an account has an attachment
     *
     * @property bool HasAttachments
     */


    const ACCOUNT_CLASS_TYPE_ASSET     = 'ASSET'; 
    const ACCOUNT_CLASS_TYPE_EQUITY    = 'EQUITY'; 
    const ACCOUNT_CLASS_TYPE_EXPENSE   = 'EXPENSE'; 
    const ACCOUNT_CLASS_TYPE_LIABILITY = 'LIABILITY'; 
    const ACCOUNT_CLASS_TYPE_REVENUE   = 'REVENUE'; 

    const ACCOUNT_TYPE_BANK                    = 'BANK'; 
    const ACCOUNT_TYPE_CURRENT                 = 'CURRENT'; 
    const ACCOUNT_TYPE_CURRLIAB                = 'CURRLIAB'; 
    const ACCOUNT_TYPE_DEPRECIATN              = 'DEPRECIATN'; 
    const ACCOUNT_TYPE_DIRECTCOSTS             = 'DIRECTCOSTS'; 
    const ACCOUNT_TYPE_EQUITY                  = 'EQUITY'; 
    const ACCOUNT_TYPE_EXPENSE                 = 'EXPENSE'; 
    const ACCOUNT_TYPE_FIXED                   = 'FIXED'; 
    const ACCOUNT_TYPE_LIABILITY               = 'LIABILITY'; 
    const ACCOUNT_TYPE_NONCURRENT              = 'NONCURRENT'; 
    const ACCOUNT_TYPE_OTHERINCOME             = 'OTHERINCOME'; 
    const ACCOUNT_TYPE_OVERHEADS               = 'OVERHEADS'; 
    const ACCOUNT_TYPE_PREPAYMENT              = 'PREPAYMENT'; 
    const ACCOUNT_TYPE_REVENUE                 = 'REVENUE'; 
    const ACCOUNT_TYPE_SALES                   = 'SALES'; 
    const ACCOUNT_TYPE_TERMLIAB                = 'TERMLIAB'; 
    const ACCOUNT_TYPE_PAYGLIABILITY           = 'PAYGLIABILITY'; 
    const ACCOUNT_TYPE_SUPERANNUATIONEXPENSE   = 'SUPERANNUATIONEXPENSE'; 
    const ACCOUNT_TYPE_SUPERANNUATIONLIABILITY = 'SUPERANNUATIONLIABILITY'; 
    const ACCOUNT_TYPE_WAGESEXPENSE            = 'WAGESEXPENSE'; 
    const ACCOUNT_TYPE_WAGESPAYABLELIABILITY   = 'WAGESPAYABLELIABILITY'; 

    const ACCOUNT_STATUS_ACTIVE   = 'ACTIVE'; 
    const ACCOUNT_STATUS_ARCHIVED = 'ARCHIVED'; 

    const SYSTEM_ACCOUNT_DEBTORS                = 'DEBTORS'; 
    const SYSTEM_ACCOUNT_CREDITORS              = 'CREDITORS'; 
    const SYSTEM_ACCOUNT_BANKCURRENCYGAIN       = 'BANKCURRENCYGAIN'; 
    const SYSTEM_ACCOUNT_GST                    = 'GST'; 
    const SYSTEM_ACCOUNT_GSTONIMPORTS           = 'GSTONIMPORTS'; 
    const SYSTEM_ACCOUNT_HISTORICAL             = 'HISTORICAL'; 
    const SYSTEM_ACCOUNT_REALISEDCURRENCYGAIN   = 'REALISEDCURRENCYGAIN'; 
    const SYSTEM_ACCOUNT_RETAINEDEARNINGS       = 'RETAINEDEARNINGS'; 
    const SYSTEM_ACCOUNT_ROUNDING               = 'ROUNDING'; 
    const SYSTEM_ACCOUNT_TRACKINGTRANSFERS      = 'TRACKINGTRANSFERS'; 
    const SYSTEM_ACCOUNT_UNPAIDEXPCLM           = 'UNPAIDEXPCLM'; 
    const SYSTEM_ACCOUNT_UNREALISEDCURRENCYGAIN = 'UNREALISEDCURRENCYGAIN'; 
    const SYSTEM_ACCOUNT_WAGEPAYABLES           = 'WAGEPAYABLES'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'Accounts';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'Account';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'AccountID';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Hintable type
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'Code' => array (true, null),
            'Name' => array (true, null),
            'Type' => array (true, null),
            'Description' => array (false, null),
            'TaxType' => array (false, null),
            'EnablePaymentsToAccount' => array (false, null),
            'ShowInExpenseClaims' => array (false, null),
            'AccountID' => array (false, null),
            'Class' => array (false, null),
            'Status' => array (false, null),
            'SystemAccount' => array (false, null),
            'BankAccountNumber' => array (false, null),
            'CurrencyCode' => array (false, null),
            'ReportingCode' => array (false, null),
            'ReportingCodeName' => array (false, null),
            'HasAttachments' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getCode(){
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setCode($value){
        $this->_data['Code'] = $value;
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
     * @return Account
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType(){
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getEnablePaymentsToAccount(){
        return $this->_data['EnablePaymentsToAccount'];
    }

    /**
     * @param bool $value
     * @return Account
     */
    public function setEnablePaymentsToAccount($value){
        $this->_data['EnablePaymentsToAccount'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getShowInExpenseClaims(){
        return $this->_data['ShowInExpenseClaims'];
    }

    /**
     * @param bool $value
     * @return Account
     */
    public function setShowInExpenseClaim($value){
        $this->_data['ShowInExpenseClaims'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountID(){
        return $this->_data['AccountID'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setAccountID($value){
        $this->_data['AccountID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getClass(){
        return $this->_data['Class'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setClass($value){
        $this->_data['Class'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSystemAccount(){
        return $this->_data['SystemAccount'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setSystemAccount($value){
        $this->_data['SystemAccount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccountNumber(){
        return $this->_data['BankAccountNumber'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setBankAccountNumber($value){
        $this->_data['BankAccountNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(){
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setCurrencyCode($value){
        $this->_data['CurrencyCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportingCode(){
        return $this->_data['ReportingCode'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setReportingCode($value){
        $this->_data['ReportingCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportingCodeName(){
        return $this->_data['ReportingCodeName'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setReportingCodeName($value){
        $this->_data['ReportingCodeName'] = $value;
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
     * @return Account
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}