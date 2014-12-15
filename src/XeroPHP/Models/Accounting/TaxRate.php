<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\TaxRate\TaxComponent;

class TaxRate extends Remote\Object {

    /**
     * Name of tax rate
     *
     * @property float Name
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



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'TaxRates';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'TaxRate';
    }


    /*
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


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
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
    public static function getProperties(){
        return array(
            'Name' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
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
     * @return float
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setName($value){
        $this->_dirty['Name'] = $this->_data['Name'] != $value;
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType(){
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return TaxRate
     */
    public function setTaxType($value){
        $this->_dirty['TaxType'] = $this->_data['TaxType'] != $value;
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return TaxComponent
     */
    public function getTaxComponents(){
        return $this->_data['TaxComponents'];
    }

    /**
     * @param TaxComponent[] $value
     * @return TaxRate
     */
    public function addTaxComponent(TaxComponent $value){
        $this->_dirty['TaxComponents'] = true;
        $this->_data['TaxComponents'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setStatu($value){
        $this->_dirty['Status'] = $this->_data['Status'] != $value;
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReportTaxType(){
        return $this->_data['ReportTaxType'];
    }

    /**
     * @param string $value
     * @return TaxRate
     */
    public function setReportTaxType($value){
        $this->_dirty['ReportTaxType'] = $this->_data['ReportTaxType'] != $value;
        $this->_data['ReportTaxType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCanApplyToAssets(){
        return $this->_data['CanApplyToAssets'];
    }

    /**
     * @param float[] $value
     * @return TaxRate
     */
    public function addCanApplyToAsset($value){
        $this->_dirty['CanApplyToAssets'] = true;
        $this->_data['CanApplyToAssets'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCanApplyToEquity(){
        return $this->_data['CanApplyToEquity'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setCanApplyToEquity($value){
        $this->_dirty['CanApplyToEquity'] = $this->_data['CanApplyToEquity'] != $value;
        $this->_data['CanApplyToEquity'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCanApplyToExpenses(){
        return $this->_data['CanApplyToExpenses'];
    }

    /**
     * @param float[] $value
     * @return TaxRate
     */
    public function addCanApplyToExpense($value){
        $this->_dirty['CanApplyToExpenses'] = true;
        $this->_data['CanApplyToExpenses'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCanApplyToLiabilities(){
        return $this->_data['CanApplyToLiabilities'];
    }

    /**
     * @param float[] $value
     * @return TaxRate
     */
    public function addCanApplyToLiability($value){
        $this->_dirty['CanApplyToLiabilities'] = true;
        $this->_data['CanApplyToLiabilities'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCanApplyToRevenue(){
        return $this->_data['CanApplyToRevenue'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setCanApplyToRevenue($value){
        $this->_dirty['CanApplyToRevenue'] = $this->_data['CanApplyToRevenue'] != $value;
        $this->_data['CanApplyToRevenue'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getDisplayTaxRate(){
        return $this->_data['DisplayTaxRate'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setDisplayTaxRate($value){
        $this->_dirty['DisplayTaxRate'] = $this->_data['DisplayTaxRate'] != $value;
        $this->_data['DisplayTaxRate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getEffectiveRate(){
        return $this->_data['EffectiveRate'];
    }

    /**
     * @param float $value
     * @return TaxRate
     */
    public function setEffectiveRate($value){
        $this->_dirty['EffectiveRate'] = $this->_data['EffectiveRate'] != $value;
        $this->_data['EffectiveRate'] = $value;
        return $this;
    }


}