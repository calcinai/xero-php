<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class TrackingOption extends RemoteObject {

    /**
     * The Xero identifier for a tracking optione.g. ae777a87-5ef3-4fa0-a4f0-d10e1f13073a 
     *
     * @property guid TrackingOptionID
     */

    /**
     * The name of the tracking option e.g. Marketing, East 
     *
     * @property string Name
     */

    /**
     * The status of a tracking option 
     *
     * @property string[] Status
     */


    /**
     * @return guid
     */
    public function getTrackingOptionID(){
        return $this->_data['TrackingOptionID'];
    }

    /**
     * @param guid $value
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
     * @param string[] $value
     * @return TrackingOption
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }



}