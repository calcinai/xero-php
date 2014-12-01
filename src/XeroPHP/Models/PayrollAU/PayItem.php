<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollAU\PayItem\EarningsRate;
use XeroPHP\Models\PayrollAU\PayItem\DeductionType;
use XeroPHP\Models\PayrollAU\PayItem\LeaveType;
use XeroPHP\Models\PayrollAU\PayItem\ReimbursementType;

class PayItem extends Remote\Object {

    /**
     * See EarningsRates
     *
     * @property EarningsRate[] EarningsRates
     */

    /**
     * See DeductionTypes
     *
     * @property DeductionType[] DeductionTypes
     */

    /**
     * See LeaveTypes
     *
     * @property LeaveType[] LeaveTypes
     */

    /**
     * See ReimbursementTypes
     *
     * @property ReimbursementType[] ReimbursementTypes
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'PayItems';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
            return array(
                'EarningsRates',
                'DeductionTypes',
                'LeaveTypes',
                'ReimbursementTypes'
        );
    }


    /**
     * @return EarningsRate
     */
    public function getEarningsRates(){
        return $this->_data['EarningsRates'];
    }

    /**
     * @param EarningsRate[] $value
     * @return PayItem
     */
    public function addEarningsRate(EarningsRate $value){
        $this->_data['EarningsRates'][] = $value;
        return $this;
    }

    /**
     * @return DeductionType
     */
    public function getDeductionTypes(){
        return $this->_data['DeductionTypes'];
    }

    /**
     * @param DeductionType[] $value
     * @return PayItem
     */
    public function addDeductionType(DeductionType $value){
        $this->_data['DeductionTypes'][] = $value;
        return $this;
    }

    /**
     * @return LeaveType
     */
    public function getLeaveTypes(){
        return $this->_data['LeaveTypes'];
    }

    /**
     * @param LeaveType[] $value
     * @return PayItem
     */
    public function addLeaveType(LeaveType $value){
        $this->_data['LeaveTypes'][] = $value;
        return $this;
    }

    /**
     * @return ReimbursementType
     */
    public function getReimbursementTypes(){
        return $this->_data['ReimbursementTypes'];
    }

    /**
     * @param ReimbursementType[] $value
     * @return PayItem
     */
    public function addReimbursementType(ReimbursementType $value){
        $this->_data['ReimbursementTypes'][] = $value;
        return $this;
    }


}