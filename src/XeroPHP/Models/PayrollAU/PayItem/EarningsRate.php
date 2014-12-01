<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollAU\Setting\Account;

class EarningsRate extends Remote\Object {

    /**
     * Name of the earnings rate (max length = 100)
     *
     * @property float Name
     */

    /**
     * See Accounts
     *
     * @property Account AccountCode
     */

    /**
     * Type of units used to record earnings (max length = 50). Only When RateType is RATEPERUNIT
     *
     * @property string[] TypeOfUnits
     */

    /**
     * Most payments are subject to tax, so you should only set this value if you are sure that a payment
     * is exempt from PAYG withholding
     *
     * @property string IsExemptFromTax
     */

    /**
     * See the ATO website for details of which payments are exempt from SGC
     *
     * @property string IsExemptFromSuper
     */

    /**
     * See EarningsTypes
     *
     * @property string EarningsType
     */

    /**
     * Xero identifier
     *
     * @property string EarningsRateID
     */

    /**
     * See RateTypes
     *
     * @property string RateType
     */

    /**
     * Default rate per unit (optional). Only applicable if RateType is RATEPERUNIT.
     *
     * @property float RatePerUnit
     */

    /**
     * This is the multiplier used to calculate the rate per unit, based on the employee’s ordinary
     * earnings rate. For example, for time and a half enter 1.5. Only applicable if RateType is MULTIPLE
     *
     * @property float Multiplier
     */

    /**
     * Indicates that this earnings rate should accrue leave. Only applicable if RateType is MULTIPLE
     *
     * @property float AccrueLeave
     */

    /**
     * Option Amount for FIXEDAMOUNT RateType EarningsRate
     *
     * @property float Amount
     */


    const EARNINGSTYPE_FIXED                = 'FIXED'; 
    const EARNINGSTYPE_ORDINARYTIMEEARNINGS = 'ORDINARYTIMEEARNINGS'; 
    const EARNINGSTYPE_OVERTIMEEARNINGS     = 'OVERTIMEEARNINGS'; 
    const EARNINGSTYPE_ALLOWANCE            = 'ALLOWANCE'; 

    const RATETYPE_FIXEDAMOUNT = 'FIXEDAMOUNT'; 
    const RATETYPE_MULTIPLE    = 'MULTIPLE'; 
    const RATETYPE_RATEPERUNIT = 'RATEPERUNIT'; 


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
                'Name',
                'AccountCode',
                'TypeOfUnits',
                'IsExemptFromTax',
                'IsExemptFromSuper',
                'EarningsType',
                'EarningsRateID',
                'RateType',
                'RatePerUnit',
                'Multiplier',
                'AccrueLeave',
                'Amount'
        );
    }


    /**
     * @return float
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param float $value
     * @return EarningsRate
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
     * @return EarningsRate
     */
    public function setAccountCode(Account $value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfUnits(){
        return $this->_data['TypeOfUnits'];
    }

    /**
     * @param string[] $value
     * @return EarningsRate
     */
    public function addTypeOfUnit($value){
        $this->_data['TypeOfUnits'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsExemptFromTax(){
        return $this->_data['IsExemptFromTax'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setIsExemptFromTax($value){
        $this->_data['IsExemptFromTax'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsExemptFromSuper(){
        return $this->_data['IsExemptFromSuper'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setIsExemptFromSuper($value){
        $this->_data['IsExemptFromSuper'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsType(){
        return $this->_data['EarningsType'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setEarningsType($value){
        $this->_data['EarningsType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsRateID(){
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRateType(){
        return $this->_data['RateType'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setRateType($value){
        $this->_data['RateType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getRatePerUnit(){
        return $this->_data['RatePerUnit'];
    }

    /**
     * @param float $value
     * @return EarningsRate
     */
    public function setRatePerUnit($value){
        $this->_data['RatePerUnit'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getMultiplier(){
        return $this->_data['Multiplier'];
    }

    /**
     * @param float $value
     * @return EarningsRate
     */
    public function setMultiplier($value){
        $this->_data['Multiplier'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAccrueLeave(){
        return $this->_data['AccrueLeave'];
    }

    /**
     * @param float $value
     * @return EarningsRate
     */
    public function setAccrueLeave($value){
        $this->_data['AccrueLeave'] = $value;
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
     * @return EarningsRate
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}