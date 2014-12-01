<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\BankTransfer\FromBankAccount;
use XeroPHP\Models\Accounting\BankTransfer\ToBankAccount;

class BankTransfer extends Remote\Object {

    /**
     * See FromBankAccount
     *
     * @property FromBankAccount FromBankAccount
     */

    /**
     * See ToBankAccount
     *
     * @property ToBankAccount ToBankAccount
     */

    /**
     * 
     *
     * @property string Amount
     */

    /**
     * The date of the Transfer YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * The identifier of the Bank Transfer
     *
     * @property string BankTransferID
     */

    /**
     * The currency rate
     *
     * @property float CurrencyRate
     */

    /**
     * The Bank Transaction ID for the source account
     *
     * @property string FromBankTransactionID
     */

    /**
     * The Bank Transaction ID for the destination account
     *
     * @property string ToBankTransactionID
     */

    /**
     * Boolean to indicate if a Bank Transfer has an attachment
     *
     * @property bool HasAttachments
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'BankTransfers';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT
        );
    }

    public static function getProperties(){
            return array(
                'FromBankAccount',
                'ToBankAccount',
                'Amount',
                'Date',
                'BankTransferID',
                'CurrencyRate',
                'FromBankTransactionID',
                'ToBankTransactionID',
                'HasAttachments'
        );
    }


    /**
     * @return FromBankAccount
     */
    public function getFromBankAccount(){
        return $this->_data['FromBankAccount'];
    }

    /**
     * @param FromBankAccount $value
     * @return BankTransfer
     */
    public function setFromBankAccount(FromBankAccount $value){
        $this->_data['FromBankAccount'] = $value;
        return $this;
    }

    /**
     * @return ToBankAccount
     */
    public function getToBankAccount(){
        return $this->_data['ToBankAccount'];
    }

    /**
     * @param ToBankAccount $value
     * @return BankTransfer
     */
    public function setToBankAccount(ToBankAccount $value){
        $this->_data['ToBankAccount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAmount(){
        return $this->_data['Amount'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return BankTransfer
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransferID(){
        return $this->_data['BankTransferID'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setBankTransferID($value){
        $this->_data['BankTransferID'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param float $value
     * @return BankTransfer
     */
    public function setCurrencyRate($value){
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFromBankTransactionID(){
        return $this->_data['FromBankTransactionID'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setFromBankTransactionID($value){
        $this->_data['FromBankTransactionID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getToBankTransactionID(){
        return $this->_data['ToBankTransactionID'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setToBankTransactionID($value){
        $this->_data['ToBankTransactionID'] = $value;
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
     * @return BankTransfer
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}