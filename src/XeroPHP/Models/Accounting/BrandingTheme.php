<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class BrandingTheme extends RemoteObject {

    /**
     * Xero identifier 
     *
     * @property guid BrandingThemeID
     */

    /**
     * Name of branding theme 
     *
     * @property string Name
     */

    /**
     * Integer – ranked order of branding theme. The default branding theme has a value of 0 
     *
     * @property string SortOrder
     */

    /**
     * UTC timestamp of creation date of branding theme 
     *
     * @property date CreatedDateUTC
     */


    /**
     * @return guid
     */
    public function getBrandingThemeID(){
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param guid $value
     * @return BrandingTheme
     */
    public function setBrandingThemeID($value){
        $this->_data['BrandingThemeID'] = $value;
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
     * @return BrandingTheme
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSortOrder(){
        return $this->_data['SortOrder'];
    }

    /**
     * @param string $value
     * @return BrandingTheme
     */
    public function setSortOrder($value){
        $this->_data['SortOrder'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getCreatedDateUTC(){
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param date $value
     * @return BrandingTheme
     */
    public function setCreatedDateUTC($value){
        $this->_data['CreatedDateUTC'] = $value;
        return $this;
    }



}