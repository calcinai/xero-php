<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Currency extends Remote\Object {

    /**
     * A UTC timestamp (YYYYMMDDHHMMSS) . Only currencies  created or modified since this timestamp will be
     * returned e.g. 20090901000000
     *
     * @property \DateTime ModifiedAfter
     */

    /**
     * 3 letter alpha code for the currency – see list of currency codes
     *
     * @property string Code
     */

    /**
     * Name of Currency
     *
     * @property string Description
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return 'Currencies';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'Currency';
    }


    /**
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


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_GET
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
            'ModifiedAfter' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'Code' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return \DateTime
     */
    public function getModifiedAfter(){
        return $this->_data['ModifiedAfter'];
    }

    /**
     * @param \DateTime $value
     * @return Currency
     */
    public function setModifiedAfter(\DateTime $value){
        $this->propertyUpdated('ModifiedAfter', $value);
        $this->_data['ModifiedAfter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(){
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return Currency
     */
    public function setCode($value){
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return Currency
     */
    public function setDescription($value){
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;
        return $this;
    }


}