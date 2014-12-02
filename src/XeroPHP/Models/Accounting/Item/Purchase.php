<?php

namespace XeroPHP\Models\Accounting\Item;

use XeroPHP\Remote;


class Purchase extends Remote\Object {

    /**
     * Unit Price of item
     *
     * @property string UnitPrice
     */

    /**
     * Account code to be used for purchased item
     *
     * @property string AccountCode
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
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
        return 'Purchase';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
    }


    /*
    * Get the stem of the API (core.xro) etc
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

    public static function getProperties(){
        return array(
            'UnitPrice',
            'AccountCode',
            'TaxType'
        );
    }


    /**
     * @return string
     */
    public function getUnitPrice(){
        return $this->_data['UnitPrice'];
    }

    /**
     * @param string $value
     * @return Purchase
     */
    public function setUnitPrice($value){
        $this->_data['UnitPrice'] = $value;
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
     * @return Purchase
     */
    public function setAccountCode($value){
        $this->_data['AccountCode'] = $value;
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
     * @return Purchase
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }


}