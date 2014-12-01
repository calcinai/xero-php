<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Currency extends Remote\Object {

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
                'Code',
                'Description'
        );
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
        $this->_data['Description'] = $value;
        return $this;
    }


}