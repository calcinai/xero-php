<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class TrackingCategory extends RemoteObject {

    /**
     * The Xero identifier for a tracking categorye.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9 
     *
     * @property guid TrackingCategoryID
     */

    /**
     * The name of the tracking category e.g. Department, Region 
     *
     * @property string Name
     */

    /**
     * The status of a tracking category 
     *
     * @property string[] Status
     */

    /**
     * See Tracking Options 
     *
     * @property object[] Options
     */


    /**
     * @return guid
     */
    public function getTrackingCategoryID(){
        return $this->_data['TrackingCategoryID'];
    }

    /**
     * @param guid $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryID($value){
        $this->_data['TrackingCategoryID'] = $value;
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
     * @return TrackingCategory
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
     * @return TrackingCategory
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getOptions(){
        return $this->_data['Options'];
    }

    /**
     * @param object[] $value
     * @return TrackingCategory
     */
    public function addOption($value){
        $this->_data['Options'][] = $value;
        return $this;
    }



}