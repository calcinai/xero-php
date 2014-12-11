<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;


class ReimbursementType extends Remote\Object {

    /**
     * Name of the reimbursement type (max length = 50)
     *
     * @property string ReimbursementType
     */

    /**
     * See Accounts
     *
     * @property string ExpenseOrLiabilityAccountCode
     */

    /**
     * Xero identifier
     *
     * @property string ReimbursementTypeID
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'ReimbursementType';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'ReimbursementTypeID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
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

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Hintable type
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'ReimbursementType' => array (true, null),
            'ExpenseOrLiabilityAccountCode' => array (true, null),
            'ReimbursementTypeID' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getReimbursementType(){
        return $this->_data['ReimbursementType'];
    }

    /**
     * @param string $value
     * @return ReimbursementType
     */
    public function setReimbursementType($value){
        $this->_data['ReimbursementType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseOrLiabilityAccountCode(){
        return $this->_data['ExpenseOrLiabilityAccountCode'];
    }

    /**
     * @param string $value
     * @return ReimbursementType
     */
    public function setExpenseOrLiabilityAccountCode($value){
        $this->_data['ExpenseOrLiabilityAccountCode'] = $value;
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