<?php

namespace XeroPHP\Models\Accounting\TrackingCategory;

use XeroPHP\Remote;


class TrackingOption extends Remote\Object {

    /**
     * The Xero identifier for a tracking optione.g. ae777a87-5ef3-4fa0-a4f0-d10e1f13073a
     *
     * @property string TrackingOptionID
     */

    /**
     * The name of the tracking option e.g. Marketing, East
     *
     * @property string Name
     */

    /**
     * The status of a tracking option
     *
     * @property string Status
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
        return 'TrackingOption';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'TrackingOptionID';
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
            'TrackingOptionID',
            'Name',
            'Status'
        );
    }


    /**
     * @return string
     */
    public function getTrackingOptionID(){
        return $this->_data['TrackingOptionID'];
    }

    /**
     * @param string $value
     * @return TrackingOption
     */
    public function setTrackingOptionID($value){
        $this->_data['TrackingOptionID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return TrackingOption
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return TrackingOption
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }


}