<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class TaxComponent extends RemoteObject {

    /**
     * Name of Tax Component 
     *
     * @property string Name
     */

    /**
     * Tax Rate (up to 4dp) 
     *
     * @property string Rate
     */

    /**
     * Boolean to describe if Tax rate is compounded.Learn more 
     *
     * @property bool IsCompound
     */


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
     * @return string
     */
    public function getRate(){
        return $this->_data['Rate'];
    }

    /**
     * @param string $value
     * @return TaxComponent
     */
    public function setRate($value){
        $this->_data['Rate'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCompound(){
        return $this->_data['IsCompound'];
    }

    /**
     * @param bool $value
     * @return TaxComponent
     */
    public function setIsCompound($value){
        $this->_data['IsCompound'] = $value;
        return $this;
    }



}