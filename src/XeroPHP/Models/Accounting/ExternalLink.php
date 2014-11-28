<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class ExternalLink extends RemoteObject {

    /**
     * Day of Month (0-31) 
     *
     * @property string Day
     */

    /**
     * One of the following values OFFOLLOWINGMONTH/DAYSAFTERBILLDATE/OFCURRENTMONTH 
     *
     * @property date Type
     */


    /**
     * @return string
     */
    public function getDay(){
        return $this->_data['Day'];
    }

    /**
     * @param string $value
     * @return ExternalLink
     */
    public function setDay($value){
        $this->_data['Day'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param date $value
     * @return ExternalLink
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }



}