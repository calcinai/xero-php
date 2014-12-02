<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollAU\Setting\Account;

class ReimbursementType extends Remote\Object {

    /**
     * Name of the reimbursement type (max length = 50)
     *
     * @property string Name
     */

    /**
     * See Accounts
     *
     * @property Account AccountCode
     */

    /**
     * Xero identifier
     *
     * @property string ReimbursementTypeID
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
        return 'ReimbursementType';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'ReimbursementTypeID';
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
            'Name',
            'AccountCode',
            'ReimbursementTypeID'
        );
    }


    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return ReimbursementType
     */
    public function setName($value){
        $this->_data['Name'] = $value;
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
     * @return ReimbursementType
     */
    public function setAccountCode(Account $value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementTypeID(){
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     * @return ReimbursementType
     */
    public function setReimbursementTypeID($value){
        $this->_data['ReimbursementTypeID'] = $value;
        return $this;
    }


}