<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class SuperannuationLine extends Remote\Object {

    /**
     * Xero identifier for payroll super fund membership ID
     *
     * @property string SuperMembershipID
     */

    /**
     * Superannuation contribution type
     *
     * @property string ContributionType
     */

    /**
     * Superannuation calculation type
     *
     * @property string CalculationType
     */

    /**
     * Superannuation minimum monthly earnings
     *
     * @property string[] MinimumMonthlyEarnings
     */

    /**
     * Superannuation expense account code
     *
     * @property string ExpenseAccountCode
     */

    /**
     * Superannuation liability account code
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Superannuation payment date for the current period (YYYY-MM-DD)
     *
     * @property \DateTime PaymentDateForThisPeriod
     */

    /**
     * Superannuation percentage
     *
     * @property string Percentage
     */

    /**
     * Superannuation amount
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
        return 'SuperannuationLine';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'SuperMembershipID';
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
            'SuperMembershipID',
            'ContributionType',
            'CalculationType',
            'MinimumMonthlyEarnings',
            'ExpenseAccountCode',
            'LiabilityAccountCode',
            'PaymentDateForThisPeriod',
            'Percentage',
            'Amount'
        );
    }


    /**
     * @return string
     */
    public function getSuperMembershipID(){
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     * @return SuperannuationLine
     */
    public function setSuperMembershipID($value){
        $this->_data['SuperMembershipID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContributionType(){
        return $this->_data['ContributionType'];
    }

    /**
     * @param string $value
     * @return SuperannuationLine
     */
    public function setContributionType($value){
        $this->_data['ContributionType'] = $value;
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
     * @return SuperannuationLine
     */
    public function setCalculationType($value){
        $this->_data['CalculationType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinimumMonthlyEarnings(){
        return $this->_data['MinimumMonthlyEarnings'];
    }

    /**
     * @param string[] $value
     * @return SuperannuationLine
     */
    public function addMinimumMonthlyEarning($value){
        $this->_data['MinimumMonthlyEarnings'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccountCode(){
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     * @return SuperannuationLine
     */
    public function setExpenseAccountCode($value){
        $this->_data['ExpenseAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiabilityAccountCode(){
        return $this->_data['LiabilityAccountCode'];
    }

    /**
     * @param string $value
     * @return SuperannuationLine
     */
    public function setLiabilityAccountCode($value){
        $this->_data['LiabilityAccountCode'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDateForThisPeriod(){
        return $this->_data['PaymentDateForThisPeriod'];
    }

    /**
     * @param \DateTime $value
     * @return SuperannuationLine
     */
    public function setPaymentDateForThisPeriod(\DateTime $value){
        $this->_data['PaymentDateForThisPeriod'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPercentage(){
        return $this->_data['Percentage'];
    }

    /**
     * @param string $value
     * @return SuperannuationLine
     */
    public function setPercentage($value){
        $this->_data['Percentage'] = $value;
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
     * @return SuperannuationLine
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}