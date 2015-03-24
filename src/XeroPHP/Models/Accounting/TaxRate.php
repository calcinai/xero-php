<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\TaxRate\TaxComponent;

class TaxRate extends Remote\Object {

    /**
     * Name of tax rate
     *
     * @property string Name
     */

    /**
     * See Tax Types
     *
     * @property string TaxType
     */

    /**
     * See TaxComponents
     *
     * @property TaxComponent[] TaxComponents
     */

    /**
     * The Status of the Tax Rate e.g. ACTIVE, DELETED
     *
     * @property float Status
     */

    /**
     * See ReportTaxTypes
     *
     * @property string ReportTaxType
     */

    /**
     * Boolean to describe if tax rate can be used for asset accounts i.e. true,false
     *
     * @property float[] CanApplyToAssets
     */

    /**
     * Boolean to describe if tax rate can be used for equity accounts i.e. true,false
     *
     * @property float CanApplyToEquity
     */

    /**
     * Boolean to describe if tax rate can be used for expense accounts i.e. true,false
     *
     * @property float[] CanApplyToExpenses
     */

    /**
     * Boolean to describe if tax rate can be used for liability accounts i.e. true,false
     *
     * @property float[] CanApplyToLiabilities
     */

    /**
     * Boolean to describe if tax rate can be used for revenue accounts i.e. true,false
     *
     * @property float CanApplyToRevenue
     */

    /**
     * Tax Rate (decimal to 4dp) e.g 12.5000
     *
     * @property float DisplayTaxRate
     */

    /**
     * Effective Tax Rate (decimal to 4dp) e.g 12.5000
     *
     * @property float EffectiveRate
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return 'TaxRates';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'TaxRate';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty(){
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods() {
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties() {
        return array(
            'Name' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'TaxType' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'TaxComponents' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TaxRate\\TaxComponent', true),
            'Status' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'ReportTaxType' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'CanApplyToAssets' => array (true, self::PROPERTY_TYPE_FLOAT, null, true),
            'CanApplyToEquity' => array (true, self::PROPERTY_TYPE_FLOAT, null, false),
            'CanApplyToExpenses' => array (true, self::PROPERTY_TYPE_FLOAT, null, true),
            'CanApplyToLiabilities' => array (true, self::PROPERTY_TYPE_FLOAT, null, true),
            'CanApplyToRevenue' => array (true, self::PROPERTY_TYPE_FLOAT, null, false),
            'DisplayTaxRate' => array (true, self::PROPERTY_TYPE_FLOAT, null, false),
            'EffectiveRate' => array (true, self::PROPERTY_TYPE_FLOAT, null, false)
        );
    }


    /**
     * @return string
     */
    public function getName() {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return TaxRate
     */
    public function setName($value) {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType() {
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return TaxRate
     */
    public function setTaxType($value) {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return TaxComponent[]
     */
    public function getTaxComponents() {
        return $this->_data['TaxComponents'];
    }

    /**
     * @param TaxComponent $value
     * @return TaxRate
     */
    public function addTaxComponent(TaxComponent $value) {
        $this->propertyUpdated('TaxComponents', $value);
        $this->_data['TaxComponents'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getStatus() {
        return $this->_data['Status'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setStatus($value) {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportTaxType() {
        return $this->_data['ReportTaxType'];
    }

    /**
     * @param string $value
     * @return TaxRate
     */
    public function setReportTaxType($value) {
        $this->propertyUpdated('ReportTaxType', $value);
        $this->_data['ReportTaxType'] = $value;
        return $this;
    }

    /**
     * @return float[]
     */
    public function getCanApplyToAssets() {
        return $this->_data['CanApplyToAssets'];
    }


    /**
     * @return float
     */
    public function getCanApplyToEquity() {
        return $this->_data['CanApplyToEquity'];
    }


    /**
     * @return float[]
     */
    public function getCanApplyToExpenses() {
        return $this->_data['CanApplyToExpenses'];
    }


    /**
     * @return float[]
     */
    public function getCanApplyToLiabilities() {
        return $this->_data['CanApplyToLiabilities'];
    }


    /**
     * @return float
     */
    public function getCanApplyToRevenue() {
        return $this->_data['CanApplyToRevenue'];
    }


    /**
     * @return float
     */
    public function getDisplayTaxRate() {
        return $this->_data['DisplayTaxRate'];
    }


    /**
     * @return float
     */
    public function getEffectiveRate() {
        return $this->_data['EffectiveRate'];
    }



}