<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Currency extends RemoteObject {

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