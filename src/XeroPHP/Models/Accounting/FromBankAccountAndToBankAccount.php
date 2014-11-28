<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class FromBankAccountAndToBankAccount extends RemoteObject {

    /**
     * The Account Code of the Bank Account 
     *
     * @property string Code
     */

    /**
     * The ID of the Bank Account 
     *
     * @property string AccountID
     */

    /**
     * The Name Bank Account 
     *
     * @property string Name
     */


    /**
     * @return string
     */
    public function getCode(){
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return FromBankAccountAndToBankAccount
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
     * @return FromBankAccountAndToBankAccount
     */
    public function setAccountID($value){
        $this->_data['AccountID'] = $value;
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
     * @return FromBankAccountAndToBankAccount
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }



}