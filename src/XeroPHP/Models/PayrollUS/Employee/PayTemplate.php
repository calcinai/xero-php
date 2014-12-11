<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;


class PayTemplate extends Remote\Object {

    /**
     * The earnings rate lines
     *
     * @property float[] EarningsLines
     */

    /**
     * The deduction type lines
     *
     * @property string[] DeductionLines
     */

    /**
     * The reimbursement type lines
     *
     * @property string[] ReimbursementLines
     */

    /**
     * The benefit type lines
     *
     * @property string[] BenefitLines
     */

    /**
     * Xero earnings rate identifier
     *
     * @property string EarningsTypeID
     */

    /**
     * The Units or Hours for the earnings line
     *
     * @property string[] UnitsOrHours
     */

    /**
     * Rate per unit for the EarningsLine.
     *
     * @property float RatePerUnit
     */

    /**
     * The amount of the reimbursement type
     *
     * @property float Amount
     */

    /**
     * Xero deduction type identifier
     *
     * @property string DeductionTypeID
     */

    /**
     * See Benefit Line Calculation Type
     *
     * @property string CalculationType
     */

    /**
     * Maximum amount an employee can receive
     *
     * @property float EmployeeMax
     */

    /**
     * The percentage of deduction line
     *
     * @property string Percentage
     */

    /**
     * Xero identifier for reimbursement type
     *
     * @property string ReimbursementTypeID
     */

    /**
     * The description of the reimbursement line
     *
     * @property string Description
     */

    /**
     * Xero identifier for benefit type
     *
     * @property string BenefitTypeID
     */


    const DEDUCTION_LINE_CALCULATION_TYPE_FIXEDAMOUNT       = 'FIXEDAMOUNT'; 
    const DEDUCTION_LINE_CALCULATION_TYPE_STANDARDAMOUNT    = 'STANDARDAMOUNT'; 
    const DEDUCTION_LINE_CALCULATION_TYPE_PERCENTAGEOFGROSS = 'PERCENTAGEOFGROSS'; 

    const BENEFIT_LINE_CALCULATION_TYPE_FIXEDAMOUNT    = 'FIXEDAMOUNT'; 
    const BENEFIT_LINE_CALCULATION_TYPE_STANDARDAMOUNT = 'STANDARDAMOUNT'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'PayTemplate';
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
        return Remote\URL::API_PAYROLL;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Hintable type
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'EarningsLines' => array (false, null),
            'DeductionLines' => array (false, null),
            'ReimbursementLines' => array (false, null),
            'BenefitLines' => array (false, null),
            'EarningsTypeID' => array (false, null),
            'UnitsOrHours' => array (false, null),
            'RatePerUnit' => array (false, null),
            'Amount' => array (false, null),
            'DeductionTypeID' => array (false, null),
            'CalculationType' => array (false, null),
            'EmployeeMax' => array (false, null),
            'Percentage' => array (false, null),
            'ReimbursementTypeID' => array (false, null),
            'Description' => array (false, null),
            'BenefitTypeID' => array (false, null)
        );
    }


    /**
     * @return float
     */
    public function getEarningsLines(){
        return $this->_data['EarningsLines'];
    }

    /**
     * @param float[] $value
     * @return PayTemplate
     */
    public function addEarningsLine($value){
        $this->_data['EarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionLines(){
        return $this->_data['DeductionLines'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addDeductionLine($value){
        $this->_data['DeductionLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementLines(){
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addReimbursementLine($value){
        $this->_data['ReimbursementLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitLines(){
        return $this->_data['BenefitLines'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addBenefitLine($value){
        $this->_data['BenefitLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID(){
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setEarningsTypeID($value){
        $this->_data['EarningsTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnitsOrHours(){
        return $this->_data['UnitsOrHours'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addUnitsOrHour($value){
        $this->_data['UnitsOrHours'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getRatePerUnit(){
        return $this->_data['RatePerUnit'];
    }

    /**
     * @param float $value
     * @return PayTemplate
     */
    public function setRatePerUnit($value){
        $this->_data['RatePerUnit'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(){
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     * @return PayTemplate
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionTypeID(){
        return $this->_data['DeductionTypeID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setDeductionTypeID($value){
        $this->_data['DeductionTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCalculationType(){
        return $this->_data['CalculationType'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setCalculationType($value){
        $this->_data['CalculationType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getEmployeeMax(){
        return $this->_data['EmployeeMax'];
    }

    /**
     * @param float $value
     * @return PayTemplate
     */
    public function setEmployeeMax($value){
        $this->_data['EmployeeMax'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPercentage(){
        return $this->_data['Percentage'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setPercentage($value){
        $this->_data['Percentage'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementTypeID(){
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setReimbursementTypeID($value){
        $this->_data['ReimbursementTypeID'] = $value;
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
     * @return PayTemplate
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitTypeID(){
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setBenefitTypeID($value){
        $this->_data['BenefitTypeID'] = $value;
        return $this;
    }


}