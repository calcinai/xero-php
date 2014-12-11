<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class TimesheetEarningsLine extends Remote\Object {

    /**
     * Xero identifier for payroll earnings rate.
     *
     * @property string EarningsRateID
     */

    /**
     * Rate per unit for earnings rate
     *
     * @property float RatePerUnit
     */

    /**
     * The Amount of the Timesheet Earnings Line.
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
        return 'TimesheetEarningsLine';
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
            'EarningsRateID' => array (false, null),
            'RatePerUnit' => array (false, null),
            'Amount' => array (false, null)
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
     * @return TimesheetEarningsLine
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
     * @return TimesheetEarningsLine
     */
    public function setRatePerUnit($value){
        $this->_data['RatePerUnit'] = $value;
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
     * @return TimesheetEarningsLine
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}