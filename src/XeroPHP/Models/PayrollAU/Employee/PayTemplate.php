<?php

namespace XeroPHP\Models\PayrollAU\Employee;

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
     * The superannuation fund lines
     *
     * @property string[] SuperLines
     */

    /**
     * The reimbursement type lines
     *
     * @property string[] ReimbursementLines
     */

    /**
     * The leave type lines
     *
     * @property string[] LeaveLines
     */

    /**
     * Xero earnings rate identifier
     *
     * @property string EarningsRateID
     */

    /**
     * See Leave Type Calculation Types
     *
     * @property string CalculationType
     */

    /**
     * Hours per week for the EarningsLine. Applicable for ANNUALSALARY CalculationType
     *
     * @property string NumberOfUnitsPerWeek
     */

    /**
     * Annual Salary of employee
     *
     * @property string AnnualSalary
     */

    /**
     * Rate per unit of the EarningsLine.
     *
     * @property float RatePerUnit
     */

    /**
     * Normal number of units for EarningsLine.  Applicable when RateType is “MULTIPLE”
     *
     * @property string NormalNumberOfUnits
     */

    /**
     * Xero deduction type identifier
     *
     * @property string DeductionTypeID
     */

    /**
     * The percentage of the SuperLine. Applies on Percentage of Earnings CalculationType.
     *
     * @property string Percentage
     */

    /**
     * The amount of the reimbursement type
     *
     * @property float Amount
     */

    /**
     * Xero superannuation fund membership identifier
     *
     * @property string SuperMembershipID
     */

    /**
     * See Superannuation Contribution Type
     *
     * @property string ContributionType
     */

    /**
     *  Account code for the Expense Account. i.e 478
     *
     * @property string ExpenseAccountCode
     */

    /**
     *  Account code for the Liability Account. i.e 826
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Minimum monthly earnings. Applies for Percentage of Earnings calculation type only
     *
     * @property string[] MinimumMonthlyEarnings
     */

    /**
     * Xero reimbursement type identifier
     *
     * @property string ReimbursementTypeID
     */

    /**
     * The description of the reimbursement type
     *
     * @property string Description
     */

    /**
     * Xero leave type identifier.
     *
     * @property string LeaveTypeID
     */

    /**
     * Hours of leave accrued each year
     *
     * @property string[] AnnualNumberOfUnits
     */

    /**
     * Normal ordinary earnings number of units for leave line.
     *
     * @property string FullTimeNumberOfUnitsPerPeriod
     */

    /**
     * Number of units for leave line.
     *
     * @property string[] NumberOfUnits
     */



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
            'SuperLines' => array (false, null),
            'ReimbursementLines' => array (false, null),
            'LeaveLines' => array (false, null),
            'EarningsRateID' => array (false, null),
            'CalculationType' => array (false, null),
            'NumberOfUnitsPerWeek' => array (false, null),
            'AnnualSalary' => array (false, null),
            'RatePerUnit' => array (false, null),
            'NormalNumberOfUnits' => array (false, null),
            'DeductionTypeID' => array (false, null),
            'Percentage' => array (false, null),
            'Amount' => array (false, null),
            'SuperMembershipID' => array (false, null),
            'ContributionType' => array (false, null),
            'ExpenseAccountCode' => array (false, null),
            'LiabilityAccountCode' => array (false, null),
            'MinimumMonthlyEarnings' => array (false, null),
            'ReimbursementTypeID' => array (false, null),
            'Description' => array (false, null),
            'LeaveTypeID' => array (false, null),
            'AnnualNumberOfUnits' => array (false, null),
            'FullTimeNumberOfUnitsPerPeriod' => array (false, null),
            'NumberOfUnits' => array (false, null)
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
    public function getSuperLines(){
        return $this->_data['SuperLines'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addSuperLine($value){
        $this->_data['SuperLines'][] = $value;
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
    public function getLeaveLines(){
        return $this->_data['LeaveLines'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addLeaveLine($value){
        $this->_data['LeaveLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsRateID(){
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setEarningsRateID($value){
        $this->_data['EarningsRateID'] = $value;
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
     * @return string
     */
    public function getNumberOfUnitsPerWeek(){
        return $this->_data['NumberOfUnitsPerWeek'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setNumberOfUnitsPerWeek($value){
        $this->_data['NumberOfUnitsPerWeek'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnualSalary(){
        return $this->_data['AnnualSalary'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setAnnualSalary($value){
        $this->_data['AnnualSalary'] = $value;
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
     * @return string
     */
    public function getNormalNumberOfUnits(){
        return $this->_data['NormalNumberOfUnits'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setNormalNumberOfUnit($value){
        $this->_data['NormalNumberOfUnits'] = $value;
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
    public function getSuperMembershipID(){
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setSuperMembershipID($value){
        $this->_data['SuperMembershipID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContributionType(){
        return $this->_data['ContributionType'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setContributionType($value){
        $this->_data['ContributionType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccountCode(){
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setExpenseAccountCode($value){
        $this->_data['ExpenseAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiabilityAccountCode(){
        return $this->_data['LiabilityAccountCode'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setLiabilityAccountCode($value){
        $this->_data['LiabilityAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getMinimumMonthlyEarnings(){
        return $this->_data['MinimumMonthlyEarnings'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addMinimumMonthlyEarning($value){
        $this->_data['MinimumMonthlyEarnings'][] = $value;
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
    public function getLeaveTypeID(){
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setLeaveTypeID($value){
        $this->_data['LeaveTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnualNumberOfUnits(){
        return $this->_data['AnnualNumberOfUnits'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addAnnualNumberOfUnit($value){
        $this->_data['AnnualNumberOfUnits'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFullTimeNumberOfUnitsPerPeriod(){
        return $this->_data['FullTimeNumberOfUnitsPerPeriod'];
    }

    /**
     * @param string $value
     * @return PayTemplate
     */
    public function setFullTimeNumberOfUnitsPerPeriod($value){
        $this->_data['FullTimeNumberOfUnitsPerPeriod'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfUnits(){
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string[] $value
     * @return PayTemplate
     */
    public function addNumberOfUnit($value){
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }


}