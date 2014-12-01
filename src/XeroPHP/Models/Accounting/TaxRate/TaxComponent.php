<?php

namespace XeroPHP\Models\Accounting\TaxRate;

use XeroPHP\Remote;


class TaxComponent extends Remote\Object {

    /**
     * Name of Tax Component
     *
     * @property string Name
     */

    /**
     * Tax Rate (up to 4dp)
     *
     * @property float Rate
     */

    /**
     * Boolean to describe if Tax rate is compounded.Learn more
     *
     * @property float IsCompound
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
                'Name',
                'Rate',
                'IsCompound'
        );
    }


    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return TaxComponent
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getRate(){
        return $this->_data['Rate'];
    }

    /**
     * @param float $value
     * @return TaxComponent
     */
    public function setRate($value){
        $this->_data['Rate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getIsCompound(){
        return $this->_data['IsCompound'];
    }

    /**
     * @param float $value
     * @return TaxComponent
     */
    public function setIsCompound($value){
        $this->_data['IsCompound'] = $value;
        return $this;
    }


}