<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class TaxRate extends RemoteObject {

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
     * @property object[] TaxComponents
     */

    /**
     * The Status of the Tax Rate e.g. ACTIVE, DELETED 
     *
     * @property string[] Status
     */

    /**
     * See ReportTaxTypes 
     *
     * @property string ReportTaxType
     */

    /**
     * Boolean to describe if tax rate can be used for asset accounts i.e. true,false 
     *
     * @property bool[] CanApplyToAssets
     */

    /**
     * Boolean to describe if tax rate can be used for equity accounts i.e. true,false 
     *
     * @property bool CanApplyToEquity
     */

    /**
     * Boolean to describe if tax rate can be used for expense accounts i.e. true,false 
     *
     * @property bool[] CanApplyToExpenses
     */

    /**
     * Boolean to describe if tax rate can be used for liability accounts i.e. true,false 
     *
     * @property bool[] CanApplyToLiabilities
     */

    /**
     * Boolean to describe if tax rate can be used for revenue accounts i.e. true,false 
     *
     * @property bool CanApplyToRevenue
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
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
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
     * @return object
     */
    public function getTaxComponents(){
        return $this->_data['TaxComponents'];
    }

    /**
     * @param object[] $value
     * @return TaxRate
     */
    public function addTaxComponent($value){
        $this->_data['TaxComponents'][] = $value;
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
     * @return TaxRate
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
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
     * @return bool
     */
    public function getCanApplyToAssets(){
        return $this->_data['CanApplyToAssets'];
    }

    /**
     * @param bool[] $value
     * @return TaxRate
     */
    public function addCanApplyToAsset($value){
        $this->_data['CanApplyToAssets'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanApplyToEquity(){
        return $this->_data['CanApplyToEquity'];
    }

    /**
     * @param bool $value
     * @return TaxRate
     */
    public function setCanApplyToEquity($value){
        $this->_data['CanApplyToEquity'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanApplyToExpenses(){
        return $this->_data['CanApplyToExpenses'];
    }

    /**
     * @param bool[] $value
     * @return TaxRate
     */
    public function addCanApplyToExpense($value){
        $this->_data['CanApplyToExpenses'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanApplyToLiabilities(){
        return $this->_data['CanApplyToLiabilities'];
    }

    /**
     * @param bool[] $value
     * @return TaxRate
     */
    public function addCanApplyToLiability($value){
        $this->_data['CanApplyToLiabilities'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getCanApplyToRevenue(){
        return $this->_data['CanApplyToRevenue'];
    }

    /**
     * @param bool $value
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