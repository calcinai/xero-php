<?php

namespace XeroPHP\Models\PayrollAU\Setting;

use XeroPHP\Remote;


class TrackingCategory extends Remote\Object {

    /**
     * Xero tracking category identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string TrackingCategoryID
     */

    /**
     * Name of tracking category
     *
     * @property string TrackingCategoryName
     */



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
                'TrackingCategoryID',
                'TrackingCategoryName'
        );
    }


    /**
     * @return string
     */
    public function getTrackingCategoryID(){
        return $this->_data['TrackingCategoryID'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryID($value){
        $this->_data['TrackingCategoryID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingCategoryName(){
        return $this->_data['TrackingCategoryName'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryName($value){
        $this->_data['TrackingCategoryName'] = $value;
        return $this;
    }


}