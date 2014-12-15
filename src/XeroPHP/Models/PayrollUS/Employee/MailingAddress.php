<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;


class MailingAddress extends Remote\Object {

    /**
     * Street Address for employee home address
     *
     * @property string StreetAddress
     */

    /**
     * Suite, Apartment or Unit information for employee home address
     *
     * @property string SuiteOrAptOrUnit
     */

    /**
     * City for employee home address
     *
     * @property string City
     */

    /**
     * State abbreviation for employee home address
     *
     * @property string State
     */

    /**
     * Zip (Post code) for employee home address
     *
     * @property string Zip
     */

    /**
     * The Latitude of employee home address
     *
     * @property string Lattitude
     */

    /**
     * The Longitude of employee home address
     *
     * @property string Longitude
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
        return 'MailingAddress';
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
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'StreetAddress' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'SuiteOrAptOrUnit' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'City' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'State' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Zip' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Lattitude' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Longitude' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return string
     */
    public function getStreetAddress(){
        return $this->_data['StreetAddress'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setStreetAddress($value){
        $this->_dirty['StreetAddress'] = $this->_data['StreetAddress'] != $value;
        $this->_data['StreetAddress'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuiteOrAptOrUnit(){
        return $this->_data['SuiteOrAptOrUnit'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setSuiteOrAptOrUnit($value){
        $this->_dirty['SuiteOrAptOrUnit'] = $this->_data['SuiteOrAptOrUnit'] != $value;
        $this->_data['SuiteOrAptOrUnit'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCity(){
        return $this->_data['City'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setCity($value){
        $this->_dirty['City'] = $this->_data['City'] != $value;
        $this->_data['City'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getState(){
        return $this->_data['State'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setState($value){
        $this->_dirty['State'] = $this->_data['State'] != $value;
        $this->_data['State'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getZip(){
        return $this->_data['Zip'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setZip($value){
        $this->_dirty['Zip'] = $this->_data['Zip'] != $value;
        $this->_data['Zip'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLattitude(){
        return $this->_data['Lattitude'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setLattitude($value){
        $this->_dirty['Lattitude'] = $this->_data['Lattitude'] != $value;
        $this->_data['Lattitude'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude(){
        return $this->_data['Longitude'];
    }

    /**
     * @param string $value
     * @return MailingAddress
     */
    public function setLongitude($value){
        $this->_dirty['Longitude'] = $this->_data['Longitude'] != $value;
        $this->_data['Longitude'] = $value;
        return $this;
    }


}