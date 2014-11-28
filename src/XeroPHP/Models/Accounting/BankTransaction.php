<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class BankTransaction extends RemoteObject {

    /**
     * See Bank Transaction Types 
     *
     * @property enum Type
     */

    /**
     * See Contacts 
     *
     * @property string Contact
     */

    /**
     * See LineItems 
     *
     * @property object[] Lineitems
     */

    /**
     * Bank account for transaction. See BankAccount 
     *
     * @property object BankAccount
     */

    /**
     * Boolean to show if transaction is reconciled 
     *
     * @property bool IsReconciled
     */

    /**
     * Date of transaction – YYYY-MM-DD 
     *
     * @property date Date
     */

    /**
     * reference for the transaction 
     *
     * @property string Reference
     */

    /**
     * The currency that invoice has been raised in (see Currencies) 
     *
     * @property string CurrencyCode
     */

    /**
     * Exchange rate to base currency when money is spent or received. e.g. 0.7500 Only used for bank transactions 
     * in non base currency. If this isn’t specified for non base currency accounts then either the user-defined 
     * rate (preference) or the XE.com day rate will be used 
     *
     * @property string CurrencyRate
     */

    /**
     * URL link to a source document – shown as "Go to App Name" 
     *
     * @property string Url
     */

    /**
     * See Bank Transaction Status Codes 
     *
     * @property enum[] Status
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount Types 
     *
     * @property enum[] LineAmountTypes
     */

    /**
     * Total of bank transaction excluding taxes 
     *
     * @property string SubTotal
     */

    /**
     * Total tax on bank transaction 
     *
     * @property string TotalTax
     */

    /**
     * Total of bank transaction tax inclusive 
     *
     * @property string Total
     */

    /**
     * Xero generated unique identifier for invoice 
     *
     * @property string BankTransactionID
     */

    /**
     * Last modified date UTC format 
     *
     * @property date UpdatedDateUTC
     */

    /**
     * Boolean to indicate if a bank transaction has an attachment 
     *
     * @property bool[] HasAttachments
     */


    /**
     * @return enum
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param enum $value
     * @return BankTransaction
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContact(){
        return $this->_data['Contact'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setContact($value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getLineitems(){
        return $this->_data['Lineitems'];
    }

    /**
     * @param object[] $value
     * @return BankTransaction
     */
    public function addLineitem($value){
        $this->_data['Lineitems'][] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getBankAccount(){
        return $this->_data['BankAccount'];
    }

    /**
     * @param object $value
     * @return BankTransaction
     */
    public function setBankAccount($value){
        $this->_data['BankAccount'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsReconciled(){
        return $this->_data['IsReconciled'];
    }

    /**
     * @param bool $value
     * @return BankTransaction
     */
    public function setIsReconciled($value){
        $this->_data['IsReconciled'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return BankTransaction
     */
    public function setDate($value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
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
     * @return BankTransaction
     */
    public function setCurrencyCode($value){
        $this->_data['CurrencyCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setCurrencyRate($value){
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setUrl($value){
        $this->_data['Url'] = $value;
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
     * @return BankTransaction
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param enum[] $value
     * @return BankTransaction
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubTotal(){
        return $this->_data['SubTotal'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setSubTotal($value){
        $this->_data['SubTotal'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalTax(){
        return $this->_data['TotalTax'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setTotalTax($value){
        $this->_data['TotalTax'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotal(){
        return $this->_data['Total'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransactionID(){
        return $this->_data['BankTransactionID'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setBankTransactionID($value){
        $this->_data['BankTransactionID'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param date $value
     * @return BankTransaction
     */
    public function setUpdatedDateUTC($value){
        $this->_data['UpdatedDateUTC'] = $value;
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
     * @return BankTransaction
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}