<?php

namespace XeroPHP\Models\Accounting\Organisation;

use XeroPHP\Remote;


class Bill extends Remote\Object {

    /**
     * Day of Month (0-31)
     *
     * @property string Day
     */

    /**
     * One of the following values OFFOLLOWINGMONTH/DAYSAFTERBILLDATE/OFCURRENTMONTH
     *
     * @property string Type
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
        return 'Bill';
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
            'Day',
            'Type'
        );
    }


    /**
     * @return string
     */
    public function getDay(){
        return $this->_data['Day'];
    }

    /**
     * @param string $value
     * @return Bill
     */
    public function setDay($value){
        $this->_data['Day'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return Bill
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }


}