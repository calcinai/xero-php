<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;


class PayRun extends Remote\Object {

    /**
     * Xero Identifier for the Pay Schedule
     *
     * @property string PayScheduleID
     */

    /**
     * Pay run period end date. Needed if it is an unscheduled pay run
     *
     * @property \DateTime PayRunPeriodEndDate
     */

    /**
     * See Pay run status types
     *
     * @property string PayRunStatus
     */

    /**
     * Xero identifier for pay run
     *
     * @property string PayRunID
     */

    /**
     * Period Start Date for the PayRun
     *
     * @property \DateTime PayRunPeriodStartDate
     */

    /**
     * Payment Date for the PayRun
     *
     * @property \DateTime PaymentDate
     */

    /**
     * Total Earnings for the PayRun
     *
     * @property string[] Earnings
     */

    /**
     * Total Deduction for the PayRun
     *
     * @property string[] Deductions
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

    /**
     * The update date for the PayRun
     *
     * @property \DateTime UpdateDateUTC
     */

    /**
     * See PayStubs
     *
     * @property string[] PayStubs
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
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'PayScheduleID' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'PayRunPeriodEndDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'PayRunStatus' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'PayRunID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'PayRunPeriodStartDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'PaymentDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'Earnings' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'Deductions' => array (false, self::PROPERTY_TYPE_STRING, null, true),
            'Reimbursement' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'NetPay' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'UpdateDateUTC' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'PayStubs' => array (false, self::PROPERTY_TYPE_STRING, null, true)
        );
    }


    /**
     * @return string
     */
    public function getPayScheduleID(){
        return $this->_data['PayScheduleID'];
    }

    /**
     * @param string $value
     * @return PayRun
     */
    public function setPayScheduleID($value){
        $this->_dirty['PayScheduleID'] = $this->_data['PayScheduleID'] != $value;
        $this->_data['PayScheduleID'] = $value;
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
        $this->_dirty['PayRunPeriodEndDate'] = $this->_data['PayRunPeriodEndDate'] != $value;
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
        $this->_dirty['PayRunStatus'] = $this->_data['PayRunStatus'] != $value;
        $this->_data['PayRunStatus'] = $value;
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
        $this->_dirty['PayRunID'] = $this->_data['PayRunID'] != $value;
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
        $this->_dirty['PayRunPeriodStartDate'] = $this->_data['PayRunPeriodStartDate'] != $value;
        $this->_data['PayRunPeriodStartDate'] = $value;
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
        $this->_dirty['PaymentDate'] = $this->_data['PaymentDate'] != $value;
        $this->_data['PaymentDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarnings(){
        return $this->_data['Earnings'];
    }

    /**
     * @param string[] $value
     * @return PayRun
     */
    public function addEarning($value){
        $this->_dirty['Earnings'] = true;
        $this->_data['Earnings'][] = $value;
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
        $this->_dirty['Deductions'] = true;
        $this->_data['Deductions'][] = $value;
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
        $this->_dirty['Reimbursement'] = $this->_data['Reimbursement'] != $value;
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
        $this->_dirty['NetPay'] = $this->_data['NetPay'] != $value;
        $this->_data['NetPay'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdateDateUTC(){
        return $this->_data['UpdateDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setUpdateDateUTC(\DateTime $value){
        $this->_dirty['UpdateDateUTC'] = $this->_data['UpdateDateUTC'] != $value;
        $this->_data['UpdateDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayStubs(){
        return $this->_data['PayStubs'];
    }

    /**
     * @param string[] $value
     * @return PayRun
     */
    public function addPayStub($value){
        $this->_dirty['PayStubs'] = true;
        $this->_data['PayStubs'][] = $value;
        return $this;
    }


}