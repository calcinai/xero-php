<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class EarningsLine extends Remote\Object {

    /**
     * Xero identifier for payroll earnings rate.
     *
     * @property string EarningsRateID
     */

    /**
     * Rate per unit for earnings rate.
     *
     * @property float RatePerUnit
     */

    /**
     * Earnings rate number of units.
     *
     * @property float[] NumberOfUnits
     */

    /**
     * Earnings rate amount.  Only applicable if the EarningsRate RateType is Fixed
     *
     * @property string FixedAmount
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
        return 'EarningsLine';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'EarningsRateID';
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
            'EarningsRateID',
            'RatePerUnit',
            'NumberOfUnits',
            'FixedAmount'
        );
    }


    /**
     * @return string
     */
    public function getEarningsRateID(){
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     * @return EarningsLine
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
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
     * @return EarningsLine
     */
    public function setRatePerUnit($value){
        $this->_data['RatePerUnit'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getNumberOfUnits(){
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param float[] $value
     * @return EarningsLine
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFixedAmount(){
        return $this->_data['FixedAmount'];
    }

    /**
     * @param string $value
     * @return EarningsLine
     */
    public function setFixedAmount($value){
        $this->_data['FixedAmount'] = $value;
        return $this;
    }


}