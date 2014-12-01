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
    */
    public static function getResourceURI(){
        return 'TaxRates';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    public static function getProperties(){
            return array(
                'Name',
                'TaxType',
                'TaxComponents',
                'Status',
                'ReportTaxType',
                'CanApplyToAssets',
                'CanApplyToEquity',
                'CanApplyToExpenses',
                'CanApplyToLiabilities',
                'CanApplyToRevenue',
                'DisplayTaxRate',
                'EffectiveRate'
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
        $this->_data['EffectiveRate'] = $value;
        return $this;
    }


}