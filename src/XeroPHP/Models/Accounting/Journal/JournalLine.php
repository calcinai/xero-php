<?php

namespace XeroPHP\Models\Accounting\Journal;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Account;
use XeroPHP\Models\Accounting\TaxRate;

class JournalLine extends Remote\Object {

    /**
     * Xero identifier
     *
     * @property string JournalLineID
     */

    /**
     * See Accounts
     *
     * @property Account AccountID
     */

    /**
     * See Accounts
     *
     * @property Account AccountCode
     */

    /**
     * See Account Types
     *
     * @property string AccountType
     */

    /**
     * See AccountCodes
     *
     * @property string AccountName
     */

    /**
     * Net amount of journal line. This will be a positive value for a debit and negative for a credit
     *
     * @property float NetAmount
     */

    /**
     * Gross amount of journal line (NetAmount + TaxAmount).
     *
     * @property float GrossAmount
     */

    /**
     * Total tax on a journal line
     *
     * @property float TaxAmount
     */

    /**
     * see TaxTypes
     *
     * @property string TaxType
     */

    /**
     * see TaxRates
     *
     * @property TaxRate TaxName
     */

    /**
     * see Tracking
     *
     * @property string[] TrackingCategories
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'JournalLine';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'JournalLineID';
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
        );
    }

    public static function getProperties(){
        return array(
            'JournalLineID',
            'AccountID',
            'AccountCode',
            'AccountType',
            'AccountName',
            'NetAmount',
            'GrossAmount',
            'TaxAmount',
            'TaxType',
            'TaxName',
            'TrackingCategories'
        );
    }


    /**
     * @return string
     */
    public function getJournalLineID(){
        return $this->_data['JournalLineID'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setJournalLineID($value){
        $this->_data['JournalLineID'] = $value;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccountID(){
        return $this->_data['AccountID'];
    }

    /**
     * @param Account $value
     * @return JournalLine
     */
    public function setAccountID(Account $value){
        $this->_data['AccountID'] = $value;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param Account $value
     * @return JournalLine
     */
    public function setAccountCode(Account $value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountType(){
        return $this->_data['AccountType'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setAccountType($value){
        $this->_data['AccountType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName(){
        return $this->_data['AccountName'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setAccountName($value){
        $this->_data['AccountName'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getNetAmount(){
        return $this->_data['NetAmount'];
    }

    /**
     * @param float $value
     * @return JournalLine
     */
    public function setNetAmount($value){
        $this->_data['NetAmount'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getGrossAmount(){
        return $this->_data['GrossAmount'];
    }

    /**
     * @param float $value
     * @return JournalLine
     */
    public function setGrossAmount($value){
        $this->_data['GrossAmount'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount(){
        return $this->_data['TaxAmount'];
    }

    /**
     * @param float $value
     * @return JournalLine
     */
    public function setTaxAmount($value){
        $this->_data['TaxAmount'] = $value;
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
     * @return JournalLine
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return TaxRate
     */
    public function getTaxName(){
        return $this->_data['TaxName'];
    }

    /**
     * @param TaxRate $value
     * @return JournalLine
     */
    public function setTaxName(TaxRate $value){
        $this->_data['TaxName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingCategories(){
        return $this->_data['TrackingCategories'];
    }

    /**
     * @param string[] $value
     * @return JournalLine
     */
    public function addTrackingCategory($value){
        $this->_data['TrackingCategories'][] = $value;
        return $this;
    }


}