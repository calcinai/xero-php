<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;


class OpeningBalance extends Remote\Object {

    /**
     * Opening Balance Date. (YYYY-MM-DD)
     *
     * @property \DateTime OpeningBalanceDate
     */

    /**
     * Opening Balance tax
     *
     * @property string Tax
     */

    /**
     * The EarningsLines of the OpeningBalance.
     *
     * @property string[] EarningsLines
     */

    /**
     * The DeductionLines of the OpeningBalance.
     *
     * @property string[] DeductionLines
     */

    /**
     * The SuperLines of the OpeningBalance.
     *
     * @property string[] SuperLines
     */

    /**
     * The ReimbursementLines of the OpeningBalance.
     *
     * @property string[] ReimbursementLines
     */

    /**
     * The LeaveLines of the OpeningBalance.
     *
     * @property string[] LeaveLines
     */

    /**
     * Xero earnings rate identifier
     *
     * @property float EarningsRateID
     */

    /**
     * Reimbursement type amount
     *
     * @property float Amount
     */

    /**
     * Xero deduction type identifier
     *
     * @property string DeductionTypeID
     */

    /**
     * Xero super membership ID
     *
     * @property string SuperMembershipID
     */

    /**
     * Calculation type for Super line
     *
     * @property string CalculationType
     */

    /**
     * Xero reimbursement type identifier
     *
     * @property string ReimbursementTypeID
     */

    /**
     * Xero leave type identifier
     *
     * @property string LeaveTypeID
     */

    /**
     * Leave number of units
     *
     * @property string[] NumberOfUnits
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
        return 'OpeningBalance';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
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
            'OpeningBalanceDate',
            'Tax',
            'EarningsLines',
            'DeductionLines',
            'SuperLines',
            'ReimbursementLines',
            'LeaveLines',
            'EarningsRateID',
            'Amount',
            'DeductionTypeID',
            'SuperMembershipID',
            'CalculationType',
            'ReimbursementTypeID',
            'LeaveTypeID',
            'NumberOfUnits'
        );
    }


    /**
     * @return \DateTime
     */
    public function getOpeningBalanceDate(){
        return $this->_data['OpeningBalanceDate'];
    }

    /**
     * @param \DateTime $value
     * @return OpeningBalance
     */
    public function setOpeningBalanceDate(\DateTime $value){
        $this->_data['OpeningBalanceDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTax(){
        return $this->_data['Tax'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setTax($value){
        $this->_data['Tax'] = $value;
        return $this;
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
    public function getSuperLines(){
        return $this->_data['SuperLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addSuperLine($value){
        $this->_data['SuperLines'][] = $value;
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
    public function getLeaveLines(){
        return $this->_data['LeaveLines'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addLeaveLine($value){
        $this->_data['LeaveLines'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getEarningsRateID(){
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param float $value
     * @return OpeningBalance
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
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
    public function getSuperMembershipID(){
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setSuperMembershipID($value){
        $this->_data['SuperMembershipID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCalculationType(){
        return $this->_data['CalculationType'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setCalculationType($value){
        $this->_data['CalculationType'] = $value;
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
    public function getLeaveTypeID(){
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setLeaveTypeID($value){
        $this->_data['LeaveTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfUnits(){
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string[] $value
     * @return OpeningBalance
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }


}