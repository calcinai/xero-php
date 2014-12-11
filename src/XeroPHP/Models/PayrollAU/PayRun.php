<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;


class PayRun extends Remote\Object {

    /**
     * See PayrollCalendars
     *
     * @property string PayrollCalendarID
     */

    /**
     * Xero identifier for pay run
     *
     * @property string PayRunID
     */

    /**
     * Period Start Date for the PayRun (YYYY-MM-DD)
     *
     * @property \DateTime PayRunPeriodStartDate
     */

    /**
     * Period End Date for the PayRun (YYYY-MM-DD)
     *
     * @property \DateTime PayRunPeriodEndDate
     */

    /**
     * See PayRun Status types
     *
     * @property string PayRunStatus
     */

    /**
     * Payment Date for the PayRun (YYYY-MM-DD)
     *
     * @property \DateTime PaymentDate
     */

    /**
     * Payslip message for the PayRun
     *
     * @property string PayslipMessage
     */

    /**
     * See Payslip
     *
     * @property Payslip[] Payslips
     */

    /**
     * Total Wages for the PayRun
     *
     * @property string[] Wages
     */

    /**
     * Total Deduction for the PayRun
     *
     * @property string[] Deductions
     */

    /**
     * Total Tax for the PayRun
     *
     * @property float Tax
     */

    /**
     * Total Super for the PayRun
     *
     * @property string Super
     */

    /**
     * Total Reimbursement for the PayRun
     *
     * @property string Reimbursement
     */

    /**
     * Total NetPay for the PayRun
     *
     * @property string NetPay
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'PayRuns';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'PayRun';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'PayRunID';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
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
            'PayrollCalendarID' => array (true, null),
            'PayRunID' => array (false, null),
            'PayRunPeriodStartDate' => array (false, '\DateTime'),
            'PayRunPeriodEndDate' => array (false, '\DateTime'),
            'PayRunStatus' => array (false, null),
            'PaymentDate' => array (false, '\DateTime'),
            'PayslipMessage' => array (false, null),
            'Payslips' => array (false, 'PayrollAU\Payslip'),
            'Wages' => array (false, null),
            'Deductions' => array (false, null),
            'Tax' => array (false, null),
            'Super' => array (false, null),
            'Reimbursement' => array (false, null),
            'NetPay' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getPayrollCalendarID(){
        return $this->_data['PayrollCalendarID'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setPayrollCalendarID($value){
        $this->_data['PayrollCalendarID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayRunID(){
        return $this->_data['PayRunID'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setPayRunID($value){
        $this->_data['PayRunID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayRunPeriodStartDate(){
        return $this->_data['PayRunPeriodStartDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPayRunPeriodStartDate(\DateTime $value){
        $this->_data['PayRunPeriodStartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayRunPeriodEndDate(){
        return $this->_data['PayRunPeriodEndDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPayRunPeriodEndDate(\DateTime $value){
        $this->_data['PayRunPeriodEndDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayRunStatus(){
        return $this->_data['PayRunStatus'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setPayRunStatu($value){
        $this->_data['PayRunStatus'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate(){
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPaymentDate(\DateTime $value){
        $this->_data['PaymentDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayslipMessage(){
        return $this->_data['PayslipMessage'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setPayslipMessage($value){
        $this->_data['PayslipMessage'] = $value;
        return $this;
    }

    /**
     * @return Payslip
     */
    public function getPayslips(){
        return $this->_data['Payslips'];
    }

    /**
     * @param Payslip[] $value
     * @return PayRun
     */
    public function addPayslip(Payslip $value){
        $this->_data['Payslips'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getWages(){
        return $this->_data['Wages'];
    }

    /**
     * @param string[] $value
     * @return PayRun
     */
    public function addWage($value){
        $this->_data['Wages'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductions(){
        return $this->_data['Deductions'];
    }

    /**
     * @param string[] $value
     * @return PayRun
     */
    public function addDeduction($value){
        $this->_data['Deductions'][] = $value;
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
     * @return PayRun
     */
    public function setTax($value){
        $this->_data['Tax'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuper(){
        return $this->_data['Super'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setSuper($value){
        $this->_data['Super'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursement(){
        return $this->_data['Reimbursement'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setReimbursement($value){
        $this->_data['Reimbursement'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNetPay(){
        return $this->_data['NetPay'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setNetPay($value){
        $this->_data['NetPay'] = $value;
        return $this;
    }


}