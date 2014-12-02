<?php

namespace XeroPHP\Models\PayrollAU\Timesheet;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollAU\Setting\TrackingCategory;

class TimesheetLine extends Remote\Object {

    /**
     * The Xero identifier for an Earnings Rate
     *
     * @property string EarningsRateID
     */

    /**
     * The Xero identifier for a Tracking Category <TrackingOptionID>. The <TrackingOptionID> must belong
     * to the TrackingCategory selected as <TimesheetCategories> under Payroll Settings.
     *
     * @property TrackingCategory TrackingItemID
     */

    /**
     * Number of units of a Timesheet line
     *
     * @property string[] NumberOfUnits
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
        return 'TimesheetLine';
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
            'TrackingItemID',
            'NumberOfUnits'
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
     * @return TimesheetLine
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
        return $this;
    }

    /**
     * @return TrackingCategory
     */
    public function getTrackingItemID(){
        return $this->_data['TrackingItemID'];
    }

    /**
     * @param TrackingCategory $value
     * @return TimesheetLine
     */
    public function setTrackingItemID(TrackingCategory $value){
        $this->_data['TrackingItemID'] = $value;
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
     * @return TimesheetLine
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }


}