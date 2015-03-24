<?php

namespace XeroPHP\Models\Accounting\ManualJournal;

use XeroPHP\Remote;


class JournalLine extends Remote\Object {

    /**
     * total for line. Debits are positive, credits are negative value
     *
     * @property string LineAmount
     */

    /**
     * See Accounts
     *
     * @property string AccountCode
     */

    /**
     * Description for journal line
     *
     * @property string Description
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * Optional Tracking Category – see Tracking.  Any JournalLine can have a maximum of 2
     * <TrackingCategory> elements.
     *
     * @property string Tracking
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return null;
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'JournalLine';
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
            'LineAmount' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'AccountCode' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'TaxType' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'Tracking' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return string
     */
    public function getLineAmount(){
        return $this->_data['LineAmount'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setLineAmount($value){
        $this->propertyUpdated('LineAmount', $value);
        $this->_data['LineAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setAccountCode($value){
        $this->propertyUpdated('AccountCode', $value);
        $this->_data['AccountCode'] = $value;
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
     * @return JournalLine
     */
    public function setDescription($value){
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType(){
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setTaxType($value){
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTracking(){
        return $this->_data['Tracking'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setTracking($value){
        $this->propertyUpdated('Tracking', $value);
        $this->_data['Tracking'] = $value;
        return $this;
    }


}