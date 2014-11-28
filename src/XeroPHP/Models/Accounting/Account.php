<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Account extends RemoteObject {

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
     * @property enum Type
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
     * @property bool[] ShowInExpenseClaims
     */

    /**
     * Xero identifier 
     *
     * @property guid AccountID
     */

    /**
     * See Account Class Types 
     *
     * @property enum Class
     */

    /**
     * See Account Status Codes 
     *
     * @property enum[] Status
     */

    /**
     * If this is a system account then this element is returned. See System Account types 
     *
     * @property string SystemAccount
     */

    /**
     * Shown for bank accounts only 
     *
     * @property int BankAccountNumber
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
     * @property bool[] HasAttachments
     */


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
     * @return enum
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param enum $value
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
     * @param bool[] $value
     * @return Account
     */
    public function addShowInExpenseClaim($value){
        $this->_data['ShowInExpenseClaims'][] = $value;
        return $this;
    }

    /**
     * @return guid
     */
    public function getAccountID(){
        return $this->_data['AccountID'];
    }

    /**
     * @param guid $value
     * @return Account
     */
    public function setAccountID($value){
        $this->_data['AccountID'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getClass(){
        return $this->_data['Class'];
    }

    /**
     * @param enum $value
     * @return Account
     */
    public function setClass($value){
        $this->_data['Class'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param enum[] $value
     * @return Account
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
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
     * @return int
     */
    public function getBankAccountNumber(){
        return $this->_data['BankAccountNumber'];
    }

    /**
     * @param int $value
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
     * @param bool[] $value
     * @return Account
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}