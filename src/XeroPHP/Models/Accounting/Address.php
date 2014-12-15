<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Address extends Remote\Object {

    /**
     * 
     *
     * @property string AddressType
     */

    /**
     * 
     *
     * @property string AddressLine1
     */

    /**
     * 
     *
     * @property string AddressLine2
     */

    /**
     * 
     *
     * @property string AddressLine3
     */

    /**
     * 
     *
     * @property string AddressLine4
     */

    /**
     * 
     *
     * @property string City
     */

    /**
     * 
     *
     * @property string Region
     */

    /**
     * 
     *
     * @property string PostalCode
     */

    /**
     * 
     *
     * @property string Country
     */

    /**
     * 
     *
     * @property string AttentionTo
     */


    const ADDRESS_TYPE_POBOX    = 'POBOX'; 
    const ADDRESS_TYPE_STREET   = 'STREET'; 
    const ADDRESS_TYPE_DELIVERY = 'DELIVERY'; 


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
        return 'Address';
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
        return Remote\URL::API_CORE;
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
            'AddressType' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'AddressLine1' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AddressLine2' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AddressLine3' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AddressLine4' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'City' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Region' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'PostalCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Country' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'AttentionTo' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return string
     */
    public function getAddressType(){
        return $this->_data['AddressType'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAddressType($value){
        $this->_dirty['AddressType'] = $this->_data['AddressType'] != $value;
        $this->_data['AddressType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1(){
        return $this->_data['AddressLine1'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAddressLine1($value){
        $this->_dirty['AddressLine1'] = $this->_data['AddressLine1'] != $value;
        $this->_data['AddressLine1'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2(){
        return $this->_data['AddressLine2'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAddressLine2($value){
        $this->_dirty['AddressLine2'] = $this->_data['AddressLine2'] != $value;
        $this->_data['AddressLine2'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine3(){
        return $this->_data['AddressLine3'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAddressLine3($value){
        $this->_dirty['AddressLine3'] = $this->_data['AddressLine3'] != $value;
        $this->_data['AddressLine3'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine4(){
        return $this->_data['AddressLine4'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAddressLine4($value){
        $this->_dirty['AddressLine4'] = $this->_data['AddressLine4'] != $value;
        $this->_data['AddressLine4'] = $value;
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
     * @return Address
     */
    public function setCity($value){
        $this->_dirty['City'] = $this->_data['City'] != $value;
        $this->_data['City'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRegion(){
        return $this->_data['Region'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setRegion($value){
        $this->_dirty['Region'] = $this->_data['Region'] != $value;
        $this->_data['Region'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode(){
        return $this->_data['PostalCode'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setPostalCode($value){
        $this->_dirty['PostalCode'] = $this->_data['PostalCode'] != $value;
        $this->_data['PostalCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountry(){
        return $this->_data['Country'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setCountry($value){
        $this->_dirty['Country'] = $this->_data['Country'] != $value;
        $this->_data['Country'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAttentionTo(){
        return $this->_data['AttentionTo'];
    }

    /**
     * @param string $value
     * @return Address
     */
    public function setAttentionTo($value){
        $this->_dirty['AttentionTo'] = $this->_data['AttentionTo'] != $value;
        $this->_data['AttentionTo'] = $value;
        return $this;
    }


}