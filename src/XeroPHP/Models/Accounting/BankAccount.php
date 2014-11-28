<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class BankAccount extends RemoteObject {

    /**
     * BankAccount code (this value may not always be present for a bank account) 
     *
     * @property string Code
     */

    /**
     * BankAccount identifier 
     *
     * @property string AccountID
     */


    /**
     * @return string
     */
    public function getCode(){
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return BankAccount
     */
    public function setCode($value){
        $this->_data['Code'] = $value;
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
     * @return BankAccount
     */
    public function setAccountID($value){
        $this->_data['AccountID'] = $value;
        return $this;
    }



}