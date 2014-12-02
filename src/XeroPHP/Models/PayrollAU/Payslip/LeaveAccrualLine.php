<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class LeaveAccrualLine extends Remote\Object {

    /**
     * Xero identifier for the Leave type.
     *
     * @property string LeaveTypeID
     */

    /**
     * Number of units for the Leave line.
     *
     * @property string[] NumberOfUnits
     */

    /**
     * If you want to auto calculate leave.
     *
     * @property string AutoCalculate
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
        return 'LeaveAccrualLine';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'LeaveTypeID';
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
            'LeaveTypeID',
            'NumberOfUnits',
            'AutoCalculate'
        );
    }


    /**
     * @return string
     */
    public function getLeaveTypeID(){
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     * @return LeaveAccrualLine
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
     * @return LeaveAccrualLine
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAutoCalculate(){
        return $this->_data['AutoCalculate'];
    }

    /**
     * @param string $value
     * @return LeaveAccrualLine
     */
    public function setAutoCalculate($value){
        $this->_data['AutoCalculate'] = $value;
        return $this;
    }


}