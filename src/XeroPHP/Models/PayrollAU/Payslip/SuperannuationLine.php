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
        return 'SuperannuationLine';
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
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'SuperMembershipID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'ContributionType' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'CalculationType' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'MinimumMonthlyEarnings' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'ExpenseAccountCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'LiabilityAccountCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'PaymentDateForThisPeriod' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'Percentage' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Amount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false)
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
        $this->_dirty['SuperMembershipID'] = $this->_data['SuperMembershipID'] != $value;
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
        $this->_dirty['ContributionType'] = $this->_data['ContributionType'] != $value;
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
        $this->_dirty['CalculationType'] = $this->_data['CalculationType'] != $value;
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
        $this->_dirty['MinimumMonthlyEarnings'] = true;
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
        $this->_dirty['ExpenseAccountCode'] = $this->_data['ExpenseAccountCode'] != $value;
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
        $this->_dirty['LiabilityAccountCode'] = $this->_data['LiabilityAccountCode'] != $value;
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
        $this->_dirty['PaymentDateForThisPeriod'] = $this->_data['PaymentDateForThisPeriod'] != $value;
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
        $this->_dirty['Percentage'] = $this->_data['Percentage'] != $value;
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
        $this->_dirty['Amount'] = $this->_data['Amount'] != $value;
        $this->_data['Amount'] = $value;
        return $this;
    }


}