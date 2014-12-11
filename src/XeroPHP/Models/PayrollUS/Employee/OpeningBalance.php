<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;


class OpeningBalance extends Remote\Object {

    /**
     * The EarningsLines of the OpeningBalance.
     *
     * @property string[] EarningsLines
     */

    /**
     * The BenefitLines of the OpeningBalance.
     *
     * @property string[] BenefitLines
     */

    /**
     * The DeductionLines of the OpeningBalance.
     *
     * @property string[] DeductionLines
     */

    /**
     * The ReimbursementLines of the OpeningBalance.
     *
     * @property string[] ReimbursementLines
     */

    /**
     * Xero earnings rate identifier
     *
     * @property string EarningsTypeID
     */

    /**
     * Reimbursement type amount
     *
     * @property float Amount
     */

    /**
     * Xero benefit type identifier
     *
     * @property string BenefitTypeID
     */

    /**
     * Xero deduction type identifier
     *
     * @property string DeductionTypeID
     */

    /**
     * Xero reimbursement type identifier
     *
     * @property string ReimbursementTypeID
     */

    /**
     * You can specify an individual record by appending the value to the endpoint, i.e. GET
     * https://…/Employees/{identifier} This will return all employee information as well as employee’s
     * Bank Account and Pay Template
     *
     * @property string Recordfilter
     */

    /**
     * The Xero identifier for an employee e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string EmployeeID
     */

    /**
     * The ModifiedAfter filter is actually an HTTP header: ‘If-Modified-Since‘. A UTC timestamp
     * (yyyy-mm-ddThh:mm:ss) . Only employees created or modified since this timestamp will be returned
     * e.g. 2009-11-12T00:00:00
     *
     * @property \DateTime ModifiedAfter
     */

    /**
     * By default the number of records returned per call is 100. You can add GET
     * https://…/Employees?page=2  to get the next set of records.
     *
     * @property string page
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
        return 'OpeningBalance';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return '';
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
            'EarningsLines' => array (false, null),
            'BenefitLines' => array (false, null),
            'DeductionLines' => array (false, null),
            'ReimbursementLines' => array (false, null),
            'EarningsTypeID' => array (false, null),
            'Amount' => array (false, null),
            'BenefitTypeID' => array (false, null),
            'DeductionTypeID' => array (false, null),
            'ReimbursementTypeID' => array (false, null),
            'Recordfilter' => array (false, null),
            'EmployeeID' => array (false, null),
            'ModifiedAfter' => array (false, '\DateTime'),
            'page' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getEarningsLines(){
        return $this->_data['EarningsLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addEarningsLine($value){
        $this->_data['EarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitLines(){
        return $this->_data['BenefitLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addBenefitLine($value){
        $this->_data['BenefitLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionLines(){
        return $this->_data['DeductionLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addDeductionLine($value){
        $this->_data['DeductionLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementLines(){
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addReimbursementLine($value){
        $this->_data['ReimbursementLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID(){
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setEarningsTypeID($value){
        $this->_data['EarningsTypeID'] = $value;
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
     * @return OpeningBalance
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitTypeID(){
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setBenefitTypeID($value){
        $this->_data['BenefitTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionTypeID(){
        return $this->_data['DeductionTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setDeductionTypeID($value){
        $this->_data['DeductionTypeID'] = $value;
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
     * @return OpeningBalance
     */
    public function setReimbursementTypeID($value){
        $this->_data['ReimbursementTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordfilter(){
        return $this->_data['Recordfilter'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setRecordfilter($value){
        $this->_data['Recordfilter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeID(){
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAfter(){
        return $this->_data['ModifiedAfter'];
    }

    /**
     * @param \DateTime $value
     * @return OpeningBalance
     */
    public function setModifiedAfter(\DateTime $value){
        $this->_data['ModifiedAfter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getpage(){
        return $this->_data['page'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setpage($value){
        $this->_data['page'] = $value;
        return $this;
    }


}