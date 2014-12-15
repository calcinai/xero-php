<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;


class EarningsRate extends Remote\Object {

    /**
     * Name of the earnings rate (max length = 100)
     *
     * @property float Name
     */

    /**
     * See Accounts
     *
     * @property string AccountCode
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
        return 'EarningsRate';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'EarningsRateID';
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
            'Name' => array (true, self::PROPERTY_TYPE_FLOAT, null, false),
            'AccountCode' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'TypeOfUnits' => array (true, self::PROPERTY_TYPE_STRING, null, true),
            'IsExemptFromTax' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'IsExemptFromSuper' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'EarningsType' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'EarningsRateID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'RateType' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'RatePerUnit' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Multiplier' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'AccrueLeave' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Amount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false)
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
        $this->_dirty['Name'] = $this->_data['Name'] != $value;
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     * @return EarningsRate
     */
    public function setAccountCode($value){
        $this->_dirty['AccountCode'] = $this->_data['AccountCode'] != $value;
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
        $this->_dirty['TypeOfUnits'] = true;
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
        $this->_dirty['IsExemptFromTax'] = $this->_data['IsExemptFromTax'] != $value;
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
        $this->_dirty['IsExemptFromSuper'] = $this->_data['IsExemptFromSuper'] != $value;
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
        $this->_dirty['EarningsType'] = $this->_data['EarningsType'] != $value;
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
        $this->_dirty['EarningsRateID'] = $this->_data['EarningsRateID'] != $value;
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
        $this->_dirty['RateType'] = $this->_data['RateType'] != $value;
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
        $this->_dirty['RatePerUnit'] = $this->_data['RatePerUnit'] != $value;
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
        $this->_dirty['Multiplier'] = $this->_data['Multiplier'] != $value;
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
        $this->_dirty['AccrueLeave'] = $this->_data['AccrueLeave'] != $value;
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
        $this->_dirty['Amount'] = $this->_data['Amount'] != $value;
        $this->_data['Amount'] = $value;
        return $this;
    }


}