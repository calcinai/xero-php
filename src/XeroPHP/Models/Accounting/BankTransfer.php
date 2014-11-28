<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class BankTransfer extends RemoteObject {

    /**
     * See FromBankAccount 
     *
     * @property string FromBankAccount
     */

    /**
     * See ToBankAccount 
     *
     * @property string ToBankAccount
     */

    /**
     *  
     *
     * @property string Amount
     */

    /**
     * The date of the Transfer YYYY-MM-DD 
     *
     * @property date Date
     */

    /**
     * The identifier of the Bank Transfer 
     *
     * @property string BankTransferID
     */

    /**
     * The currency rate 
     *
     * @property string CurrencyRate
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
     * @property bool[] HasAttachments
     */


    /**
     * @return string
     */
    public function getFromBankAccount(){
        return $this->_data['FromBankAccount'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setFromBankAccount($value){
        $this->_data['FromBankAccount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getToBankAccount(){
        return $this->_data['ToBankAccount'];
    }

    /**
     * @param string $value
     * @return BankTransfer
     */
    public function setToBankAccount($value){
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
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return BankTransfer
     */
    public function setDate($value){
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
     * @return string
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param string $value
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
     * @param bool[] $value
     * @return BankTransfer
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}