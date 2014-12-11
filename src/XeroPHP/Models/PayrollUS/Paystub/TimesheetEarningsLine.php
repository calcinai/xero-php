<?php

namespace XeroPHP\Models\PayrollUS\Paystub;

use XeroPHP\Remote;


class TimesheetEarningsLine extends Remote\Object {

    /**
     * Xero identifier for payroll earnings type.
     *
     * @property string EarningsTypeID
     */

    /**
     * Rate per unit for earnings type
     *
     * @property float RatePerUnit
     */

    /**
     * Earnings rate number of units.
     *
     * @property float[] NumberOfUnits
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
            'EarningsTypeID' => array (false, null),
            'RatePerUnit' => array (false, null),
            'NumberOfUnits' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getEarningsTypeID(){
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     * @return TimesheetEarningsLine
     */
    public function setEarningsTypeID($value){
        $this->_data['EarningsTypeID'] = $value;
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
    public function getNumberOfUnits(){
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param float[] $value
     * @return TimesheetEarningsLine
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }


}