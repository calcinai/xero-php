<?php

namespace XeroPHP\Models\PayrollAU\Setting;

use XeroPHP\Remote;


class Account extends Remote\Object {

    /**
     * Xero account identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string AccountID
     */

    /**
     * See Account Types
     *
     * @property string Type
     */

    /**
     * Customer defined account code eg. 200
     *
     * @property string Code
     */

    /**
     * Name of account
     *
     * @property string Name
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
        return Remote\URL::API_PAYROLL;
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
                'AccountID',
                'Type',
                'Code',
                'Name'
        );
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


}