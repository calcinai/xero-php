<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class ReimbursementLine extends Remote\Object {

    /**
     * Xero identifier for payroll reimbursement type
     *
     * @property string ReimbursementTypeID
     */

    /**
     * Reimbursement lines description (max length 50)
     *
     * @property string Description
     */

    /**
     * Reimbursement expense account. For posted pay run you should be able to see expense account code
     *
     * @property string ExpenseAccount
     */

    /**
     * Reimbursement amount
     *
     * @property float Amount
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
        return 'ReimbursementLine';
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
            'ReimbursementTypeID',
            'Description',
            'ExpenseAccount',
            'Amount'
        );
    }


    /**
     * @return string
     */
    public function getReimbursementTypeID(){
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     * @return ReimbursementLine
     */
    public function setReimbursementTypeID($value){
        $this->_data['ReimbursementTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return ReimbursementLine
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccount(){
        return $this->_data['ExpenseAccount'];
    }

    /**
     * @param string $value
     * @return ReimbursementLine
     */
    public function setExpenseAccount($value){
        $this->_data['ExpenseAccount'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(){
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     * @return ReimbursementLine
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}