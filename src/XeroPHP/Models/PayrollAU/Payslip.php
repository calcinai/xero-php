<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollAU\Payslip\EarningsLine;
use XeroPHP\Models\PayrollAU\Payslip\TimesheetEarningsLine;
use XeroPHP\Models\PayrollAU\Payslip\DeductionLine;
use XeroPHP\Models\PayrollAU\Payslip\LeaveAccrualLine;
use XeroPHP\Models\PayrollAU\PayItem;
use XeroPHP\Models\PayrollAU\Payslip\SuperannuationLine;
use XeroPHP\Models\PayrollAU\Payslip\TaxLine;
use XeroPHP\Models\PayrollAU\Payslip\LeaveEarningsLine;

class Payslip extends Remote\Object {

    /**
     * Xero identifier for payroll employee
     *
     * @property string EmployeeID
     */

    /**
     * Xero identifier for payroll payslip
     *
     * @property string PayslipID
     */

    /**
     * See EarningsLine
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * See TimesheetEarningsLine
     *
     * @property TimesheetEarningsLine[] TimesheetEarningsLines
     */

    /**
     * See DeductionLine
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * See LeaveAccrualLine
     *
     * @property LeaveAccrualLine[] LeaveAccrualLines
     */

    /**
     * See ReimbursementLine – see PayItems
     *
     * @property PayItem[] ReimbursementLines
     */

    /**
     * See SuperannuationLine
     *
     * @property SuperannuationLine[] SuperannuationLines
     */

    /**
     * See TaxLine
     *
     * @property TaxLine[] TaxLines
     */

    /**
     * Employee first name
     *
     * @property string FirstName
     */

    /**
     * Employee last name
     *
     * @property string LastName
     */

    /**
     * Employee Group name
     *
     * @property string EmployeeGroup
     */

    /**
     * Last edited
     *
     * @property string LastEdited
     */

    /**
     * The Total Wages for the PayRun
     *
     * @property float[] Wages
     */

    /**
     * The Total Deductions for the PayRun
     *
     * @property float[] Deductions
     */

    /**
     * The Total NetPay for the PayRun
     *
     * @property float NetPay
     */

    /**
     * The Total Tax for the PayRun
     *
     * @property float Tax
     */

    /**
     * The Total Super for the PayRun
     *
     * @property float Super
     */

    /**
     * The Total Reimbursement for the PayRun
     *
     * @property float[] Reimbursements
     */

    /**
     * See LeaveEarningsLine
     *
     * @property LeaveEarningsLine[] LeaveEarningsLines
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Payslip';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'Payslip';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'PayslipID';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
        return array(
            'EmployeeID',
            'PayslipID',
            'EarningsLines',
            'TimesheetEarningsLines',
            'DeductionLines',
            'LeaveAccrualLines',
            'ReimbursementLines',
            'SuperannuationLines',
            'TaxLines',
            'FirstName',
            'LastName',
            'EmployeeGroup',
            'LastEdited',
            'Wages',
            'Deductions',
            'NetPay',
            'Tax',
            'Super',
            'Reimbursements',
            'LeaveEarningsLines'
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
     * @return Payslip
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayslipID(){
        return $this->_data['PayslipID'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setPayslipID($value){
        $this->_data['PayslipID'] = $value;
        return $this;
    }

    /**
     * @return EarningsLine
     */
    public function getEarningsLines(){
        return $this->_data['EarningsLines'];
    }

    /**
     * @param EarningsLine[] $value
     * @return Payslip
     */
    public function addEarningsLine(EarningsLine $value){
        $this->_data['EarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return TimesheetEarningsLine
     */
    public function getTimesheetEarningsLines(){
        return $this->_data['TimesheetEarningsLines'];
    }

    /**
     * @param TimesheetEarningsLine[] $value
     * @return Payslip
     */
    public function addTimesheetEarningsLine(TimesheetEarningsLine $value){
        $this->_data['TimesheetEarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return DeductionLine
     */
    public function getDeductionLines(){
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine[] $value
     * @return Payslip
     */
    public function addDeductionLine(DeductionLine $value){
        $this->_data['DeductionLines'][] = $value;
        return $this;
    }

    /**
     * @return LeaveAccrualLine
     */
    public function getLeaveAccrualLines(){
        return $this->_data['LeaveAccrualLines'];
    }

    /**
     * @param LeaveAccrualLine[] $value
     * @return Payslip
     */
    public function addLeaveAccrualLine(LeaveAccrualLine $value){
        $this->_data['LeaveAccrualLines'][] = $value;
        return $this;
    }

    /**
     * @return PayItem
     */
    public function getReimbursementLines(){
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param PayItem[] $value
     * @return Payslip
     */
    public function addReimbursementLine(PayItem $value){
        $this->_data['ReimbursementLines'][] = $value;
        return $this;
    }

    /**
     * @return SuperannuationLine
     */
    public function getSuperannuationLines(){
        return $this->_data['SuperannuationLines'];
    }

    /**
     * @param SuperannuationLine[] $value
     * @return Payslip
     */
    public function addSuperannuationLine(SuperannuationLine $value){
        $this->_data['SuperannuationLines'][] = $value;
        return $this;
    }

    /**
     * @return TaxLine
     */
    public function getTaxLines(){
        return $this->_data['TaxLines'];
    }

    /**
     * @param TaxLine[] $value
     * @return Payslip
     */
    public function addTaxLine(TaxLine $value){
        $this->_data['TaxLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(){
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setFirstName($value){
        $this->_data['FirstName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(){
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setLastName($value){
        $this->_data['LastName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeGroup(){
        return $this->_data['EmployeeGroup'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setEmployeeGroup($value){
        $this->_data['EmployeeGroup'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastEdited(){
        return $this->_data['LastEdited'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setLastEdited($value){
        $this->_data['LastEdited'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getWages(){
        return $this->_data['Wages'];
    }

    /**
     * @param float[] $value
     * @return Payslip
     */
    public function addWage($value){
        $this->_data['Wages'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getDeductions(){
        return $this->_data['Deductions'];
    }

    /**
     * @param float[] $value
     * @return Payslip
     */
    public function addDeduction($value){
        $this->_data['Deductions'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getNetPay(){
        return $this->_data['NetPay'];
    }

    /**
     * @param float $value
     * @return Payslip
     */
    public function setNetPay($value){
        $this->_data['NetPay'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTax(){
        return $this->_data['Tax'];
    }

    /**
     * @param float $value
     * @return Payslip
     */
    public function setTax($value){
        $this->_data['Tax'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getSuper(){
        return $this->_data['Super'];
    }

    /**
     * @param float $value
     * @return Payslip
     */
    public function setSuper($value){
        $this->_data['Super'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getReimbursements(){
        return $this->_data['Reimbursements'];
    }

    /**
     * @param float[] $value
     * @return Payslip
     */
    public function addReimbursement($value){
        $this->_data['Reimbursements'][] = $value;
        return $this;
    }

    /**
     * @return LeaveEarningsLine
     */
    public function getLeaveEarningsLines(){
        return $this->_data['LeaveEarningsLines'];
    }

    /**
     * @param LeaveEarningsLine[] $value
     * @return Payslip
     */
    public function addLeaveEarningsLine(LeaveEarningsLine $value){
        $this->_data['LeaveEarningsLines'][] = $value;
        return $this;
    }


}