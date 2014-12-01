<?php

namespace XeroPHP\Models\Accounting\BankTransaction;

use XeroPHP\Remote;


class BankAccount extends Remote\Object {

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



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
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
                'Code',
                'AccountID'
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