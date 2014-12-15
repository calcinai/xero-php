<?php

namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;


class TaxLine extends Remote\Object {

    /**
     * Name of the tax type
     *
     * @property string TaxTypeName
     */

    /**
     * Description of the tax line
     *
     * @property string Description
     */

    /**
     * The tax line amount
     *
     * @property float Amount
     */

    /**
     * The tax line liability account code. For posted pay run you should be able to see liability account
     * code
     *
     * @property string LiabilityAccount
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
        return 'TaxLine';
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
            'TaxTypeName' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Amount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'LiabilityAccount' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return string
     */
    public function getTaxTypeName(){
        return $this->_data['TaxTypeName'];
    }

    /**
     * @param string $value
     * @return TaxLine
     */
    public function setTaxTypeName($value){
        $this->_dirty['TaxTypeName'] = $this->_data['TaxTypeName'] != $value;
        $this->_data['TaxTypeName'] = $value;
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
     * @return TaxLine
     */
    public function setDescription($value){
        $this->_dirty['Description'] = $this->_data['Description'] != $value;
        $this->_data['Description'] = $value;
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
     * @return TaxLine
     */
    public function setAmount($value){
        $this->_dirty['Amount'] = $this->_data['Amount'] != $value;
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiabilityAccount(){
        return $this->_data['LiabilityAccount'];
    }

    /**
     * @param string $value
     * @return TaxLine
     */
    public function setLiabilityAccount($value){
        $this->_dirty['LiabilityAccount'] = $this->_data['LiabilityAccount'] != $value;
        $this->_data['LiabilityAccount'] = $value;
        return $this;
    }


}