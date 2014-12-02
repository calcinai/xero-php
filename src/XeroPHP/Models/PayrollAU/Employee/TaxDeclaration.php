<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;


class TaxDeclaration extends Remote\Object {

    /**
     * Xero employee identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string EmployeeID
     */

    /**
     * See Employment Basis Types
     *
     * @property string EmploymentBasis
     */

    /**
     * See TFN Exemption Types
     *
     * @property string TFNExemptionType
     */

    /**
     * The tax file number e.g 123123123
     *
     * @property string TaxFileNumber
     */

    /**
     * If the employee is Australian resident for tax purposes. e.g true or false
     *
     * @property string[] AustralianResidentForTaxPurposes
     */

    /**
     * If tax free threshold claimed. e.g true or false
     *
     * @property string TaxFreeThresholdClaimed
     */

    /**
     * If has tax offset estimated then the tax offset estimated amount. e.g 100
     *
     * @property float TaxOffsetEstimatedAmount
     */

    /**
     * If employee has HECS or HELP dept. e.g true or false
     *
     * @property string HasHELPDebt
     */

    /**
     * If employee has financial supplement dept. e.g true or false
     *
     * @property string HasSFSSDebt
     */

    /**
     * If the employee has requested that additional tax be withheld each pay run. e.g 50
     *
     * @property string UpwardVariationTaxWithholdingAmount
     */

    /**
     * If the employee is eligible to receive an additional percentage on top of ordinary earnings when
     * they take leave (typically 17.5%). e.g true or false
     *
     * @property string EligibleToReceiveLeaveLoading
     */

    /**
     * If the employee has approved withholding variation. e.g (0 – 100)
     *
     * @property string ApprovedWithholdingVariationPercentage
     */


    const EMPLOYMENTBASIS_FULLTIME          = 'FULLTIME'; 
    const EMPLOYMENTBASIS_PARTTIME          = 'PARTTIME'; 
    const EMPLOYMENTBASIS_CASUAL            = 'CASUAL'; 
    const EMPLOYMENTBASIS_LABOURHIRE        = 'LABOURHIRE'; 
    const EMPLOYMENTBASIS_SUPERINCOMESTREAM = 'SUPERINCOMESTREAM'; 

    const TFNEXEMPTIONTYPE_NOTQUOTED = 'NOTQUOTED'; 
    const TFNEXEMPTIONTYPE_PENDING   = 'PENDING'; 
    const TFNEXEMPTIONTYPE_PENSIONER = 'PENSIONER'; 
    const TFNEXEMPTIONTYPE_UNDER18   = 'UNDER18'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'TaxDeclaration';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
    }


    /*
    * Get the stem of the API (core.xro) etc
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

    public static function getProperties(){
        return array(
            'EmployeeID',
            'EmploymentBasis',
            'TFNExemptionType',
            'TaxFileNumber',
            'AustralianResidentForTaxPurposes',
            'TaxFreeThresholdClaimed',
            'TaxOffsetEstimatedAmount',
            'HasHELPDebt',
            'HasSFSSDebt',
            'UpwardVariationTaxWithholdingAmount',
            'EligibleToReceiveLeaveLoading',
            'ApprovedWithholdingVariationPercentage'
        );
    }


    /**
     * @return string
     */
    public function getEmployeeID(){
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmploymentBasis(){
        return $this->_data['EmploymentBasis'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setEmploymentBasis($value){
        $this->_data['EmploymentBasis'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTFNExemptionType(){
        return $this->_data['TFNExemptionType'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setTFNExemptionType($value){
        $this->_data['TFNExemptionType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxFileNumber(){
        return $this->_data['TaxFileNumber'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setTaxFileNumber($value){
        $this->_data['TaxFileNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAustralianResidentForTaxPurposes(){
        return $this->_data['AustralianResidentForTaxPurposes'];
    }

    /**
     * @param string[] $value
     * @return TaxDeclaration
     */
    public function addAustralianResidentForTaxPurpose($value){
        $this->_data['AustralianResidentForTaxPurposes'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxFreeThresholdClaimed(){
        return $this->_data['TaxFreeThresholdClaimed'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setTaxFreeThresholdClaimed($value){
        $this->_data['TaxFreeThresholdClaimed'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxOffsetEstimatedAmount(){
        return $this->_data['TaxOffsetEstimatedAmount'];
    }

    /**
     * @param float $value
     * @return TaxDeclaration
     */
    public function setTaxOffsetEstimatedAmount($value){
        $this->_data['TaxOffsetEstimatedAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHasHELPDebt(){
        return $this->_data['HasHELPDebt'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setHasHELPDebt($value){
        $this->_data['HasHELPDebt'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getHasSFSSDebt(){
        return $this->_data['HasSFSSDebt'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setHasSFSSDebt($value){
        $this->_data['HasSFSSDebt'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpwardVariationTaxWithholdingAmount(){
        return $this->_data['UpwardVariationTaxWithholdingAmount'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setUpwardVariationTaxWithholdingAmount($value){
        $this->_data['UpwardVariationTaxWithholdingAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEligibleToReceiveLeaveLoading(){
        return $this->_data['EligibleToReceiveLeaveLoading'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setEligibleToReceiveLeaveLoading($value){
        $this->_data['EligibleToReceiveLeaveLoading'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getApprovedWithholdingVariationPercentage(){
        return $this->_data['ApprovedWithholdingVariationPercentage'];
    }

    /**
     * @param string $value
     * @return TaxDeclaration
     */
    public function setApprovedWithholdingVariationPercentage($value){
        $this->_data['ApprovedWithholdingVariationPercentage'] = $value;
        return $this;
    }


}