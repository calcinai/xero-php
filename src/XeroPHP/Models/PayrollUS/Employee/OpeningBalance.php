<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollUS\Paystub\EarningsLine;
use XeroPHP\Models\PayrollUS\Paystub\BenefitLine;
use XeroPHP\Models\PayrollUS\Paystub\DeductionLine;
use XeroPHP\Models\PayrollUS\Paystub\ReimbursementLine;

class OpeningBalance extends Remote\Object {

    /**
     * The EarningsLines of the OpeningBalance.
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * The BenefitLines of the OpeningBalance.
     *
     * @property BenefitLine[] BenefitLines
     */

    /**
     * The DeductionLines of the OpeningBalance.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * The ReimbursementLines of the OpeningBalance.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * Xero earnings rate identifier
     *
     * @property string EarningsTypeID
     */

    /**
     * Reimbursement type amount
     *
     * @property float Amount
     */

    /**
     * Xero benefit type identifier
     *
     * @property string BenefitTypeID
     */

    /**
     * Xero deduction type identifier
     *
     * @property string DeductionTypeID
     */

    /**
     * Xero reimbursement type identifier
     *
     * @property string ReimbursementTypeID
     */

    /**
     * You can specify an individual record by appending the value to the endpoint, i.e. GET
     * https://…/Employees/{identifier} This will return all employee information as well as employee’s
     * Bank Account and Pay Template
     *
     * @property string Recordfilter
     */

    /**
     * The Xero identifier for an employee e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string EmployeeID
     */

    /**
     * The ModifiedAfter filter is actually an HTTP header: ‘If-Modified-Since‘. A UTC timestamp
     * (yyyy-mm-ddThh:mm:ss) . Only employees created or modified since this timestamp will be returned
     * e.g. 2009-11-12T00:00:00
     *
     * @property \DateTime ModifiedAfter
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return 'OpeningBalances';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'OpeningBalance';
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
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods() {
        return array(
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties() {
        return array(
            'EarningsLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\EarningsLine', true, false),
            'BenefitLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\BenefitLine', true, false),
            'DeductionLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\DeductionLine', true, false),
            'ReimbursementLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\ReimbursementLine', true, false),
            'EarningsTypeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Amount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'BenefitTypeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'DeductionTypeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'ReimbursementTypeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Recordfilter' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'EmployeeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'ModifiedAfter' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false)
        );
    }


    /**
     * @return EarningsLine[]
     */
    public function getEarningsLines() {
        return $this->_data['EarningsLines'];
    }

    /**
     * @param EarningsLine $value
     * @return OpeningBalance
     */
    public function addEarningsLine(EarningsLine $value) {
        $this->propertyUpdated('EarningsLines', $value);
        $this->_data['EarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return BenefitLine[]
     */
    public function getBenefitLines() {
        return $this->_data['BenefitLines'];
    }

    /**
     * @param BenefitLine $value
     * @return OpeningBalance
     */
    public function addBenefitLine(BenefitLine $value) {
        $this->propertyUpdated('BenefitLines', $value);
        $this->_data['BenefitLines'][] = $value;
        return $this;
    }

    /**
     * @return DeductionLine[]
     */
    public function getDeductionLines() {
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine $value
     * @return OpeningBalance
     */
    public function addDeductionLine(DeductionLine $value) {
        $this->propertyUpdated('DeductionLines', $value);
        $this->_data['DeductionLines'][] = $value;
        return $this;
    }

    /**
     * @return ReimbursementLine[]
     */
    public function getReimbursementLines() {
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param ReimbursementLine $value
     * @return OpeningBalance
     */
    public function addReimbursementLine(ReimbursementLine $value) {
        $this->propertyUpdated('ReimbursementLines', $value);
        $this->_data['ReimbursementLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID() {
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setEarningsTypeID($value) {
        $this->propertyUpdated('EarningsTypeID', $value);
        $this->_data['EarningsTypeID'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount() {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     * @return OpeningBalance
     */
    public function setAmount($value) {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitTypeID() {
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setBenefitTypeID($value) {
        $this->propertyUpdated('BenefitTypeID', $value);
        $this->_data['BenefitTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionTypeID() {
        return $this->_data['DeductionTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setDeductionTypeID($value) {
        $this->propertyUpdated('DeductionTypeID', $value);
        $this->_data['DeductionTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementTypeID() {
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setReimbursementTypeID($value) {
        $this->propertyUpdated('ReimbursementTypeID', $value);
        $this->_data['ReimbursementTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordfilter() {
        return $this->_data['Recordfilter'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setRecordfilter($value) {
        $this->propertyUpdated('Recordfilter', $value);
        $this->_data['Recordfilter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeID() {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     * @return OpeningBalance
     */
    public function setEmployeeID($value) {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAfter() {
        return $this->_data['ModifiedAfter'];
    }

    /**
     * @param \DateTime $value
     * @return OpeningBalance
     */
    public function setModifiedAfter(\DateTime $value) {
        $this->propertyUpdated('ModifiedAfter', $value);
        $this->_data['ModifiedAfter'] = $value;
        return $this;
    }


}