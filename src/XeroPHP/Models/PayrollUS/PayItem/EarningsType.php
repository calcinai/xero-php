<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;


class EarningsType extends Remote\Object {

    /**
     * Name of the earnings type (max length = 100)
     *
     * @property string EarningsType
     */

    /**
     * See Accounts
     *
     * @property string ExpenseAccountCode
     */

    /**
     * See EarningsCategory
     *
     * @property string EarningsCategory
     */

    /**
     * Only when EarningsCategory is OVERTIMEEARNINGS, ALLOWANCE, ADDITIONALEARNINGS
     *
     * @property string RateType
     */

    /**
     * Only when EarningsCategory is ADDITIONALEARNINGS, ALLOWANCE and RateType is RATEPERUNIT
     *
     * @property string TypeOfUnits
     */

    /**
     * Xero identifier
     *
     * @property string EarningsRateID
     */

    /**
     * This is the multiplier used to calculate the rate per unit, based on the employee’s ordinary
     * earnings rate. For example, for time and a half enter 1.5. Only applicable if RateType is MULTIPLE
     *
     * @property float Multiple
     */

    /**
     * Set it to true if time off is NOT to be accumulated based on the hours reported to this earnings
     * type
     *
     * @property string DoNotAccrueTimeOff
     */

    /**
     * Set it to true if this earnings type qualifies as a supplemental earnings according to the IRS
     * regulations, e.g bonus or commission
     *
     * @property string IsSupplemental
     */

    /**
     * Optional for EarningsCategory COMMISSION, BONUS, CASHTIPS, NONCASHTIPS, RETROACTIVEPAY,
     * CLERGYHOUSINGALLOWANCE, CLERGYHOUSINGINKIND (this will be the amount that will be added to the
     * employee’s earnings on a per pay period basis). The ALLOWANCE & ADDITIONALEARNINGS
     * EarningsCategory will also have the Amount field when the Rate Type is selected as FIXEDAMOUNT
     *
     * @property float Amount
     */


    const RATETYPE_FIXEDAMOUNT = 'FIXEDAMOUNT'; 
    const RATETYPE_MULTIPLE    = 'MULTIPLE'; 
    const RATETYPE_RATEPERUNIT = 'RATEPERUNIT'; 

    const EARNINGSCATEGORY_REGULAR_EARNINGS       = 'REGULAR EARNINGS'; 
    const EARNINGSCATEGORY_OVERTIMEEARNINGS       = 'OVERTIMEEARNINGS'; 
    const EARNINGSCATEGORY_ALLOWANCE              = 'ALLOWANCE'; 
    const EARNINGSCATEGORY_COMMISSION             = 'COMMISSION'; 
    const EARNINGSCATEGORY_BONUS                  = 'BONUS'; 
    const EARNINGSCATEGORY_CASHTIPS               = 'CASHTIPS'; 
    const EARNINGSCATEGORY_NONCASHTIPS            = 'NONCASHTIPS'; 
    const EARNINGSCATEGORY_ADDITIONALEARNINGS     = 'ADDITIONALEARNINGS'; 
    const EARNINGSCATEGORY_RETROACTIVEPAY         = 'RETROACTIVEPAY'; 
    const EARNINGSCATEGORY_CLERGYHOUSINGALLOWANCE = 'CLERGYHOUSINGALLOWANCE'; 
    const EARNINGSCATEGORY_CLERGYHOUSINGINKIND    = 'CLERGYHOUSINGINKIND'; 


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
        return 'EarningsType';
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
            'EarningsType' => array (true, null),
            'ExpenseAccountCode' => array (true, null),
            'EarningsCategory' => array (true, null),
            'RateType' => array (true, null),
            'TypeOfUnits' => array (true, null),
            'EarningsRateID' => array (false, null),
            'Multiple' => array (false, null),
            'DoNotAccrueTimeOff' => array (false, null),
            'IsSupplemental' => array (false, null),
            'Amount' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getEarningsType(){
        return $this->_data['EarningsType'];
    }

    /**
     * @param string $value
     * @return EarningsType
     */
    public function setEarningsType($value){
        $this->_data['EarningsType'] = $value;
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
     * @return EarningsType
     */
    public function setExpenseAccountCode($value){
        $this->_data['ExpenseAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsCategory(){
        return $this->_data['EarningsCategory'];
    }

    /**
     * @param string $value
     * @return EarningsType
     */
    public function setEarningsCategory($value){
        $this->_data['EarningsCategory'] = $value;
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
     * @return EarningsType
     */
    public function setRateType($value){
        $this->_data['RateType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfUnits(){
        return $this->_data['TypeOfUnits'];
    }

    /**
     * @param string $value
     * @return EarningsType
     */
    public function setTypeOfUnit($value){
        $this->_data['TypeOfUnits'] = $value;
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
     * @return EarningsType
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getMultiple(){
        return $this->_data['Multiple'];
    }

    /**
     * @param float $value
     * @return EarningsType
     */
    public function setMultiple($value){
        $this->_data['Multiple'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDoNotAccrueTimeOff(){
        return $this->_data['DoNotAccrueTimeOff'];
    }

    /**
     * @param string $value
     * @return EarningsType
     */
    public function setDoNotAccrueTimeOff($value){
        $this->_data['DoNotAccrueTimeOff'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsSupplemental(){
        return $this->_data['IsSupplemental'];
    }

    /**
     * @param string $value
     * @return EarningsType
     */
    public function setIsSupplemental($value){
        $this->_data['IsSupplemental'] = $value;
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
     * @return EarningsType
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}