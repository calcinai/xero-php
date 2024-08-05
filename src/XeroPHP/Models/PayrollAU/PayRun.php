<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

/**
 * @property string $PayrollCalendarID See PayrollCalendars.
 * @property string $PayRunID Xero identifier for pay run.
 * @property \DateTimeInterface $PayRunPeriodStartDate Period Start Date for the PayRun (YYYY-MM-DD).
 * @property \DateTimeInterface $PayRunPeriodEndDate Period End Date for the PayRun (YYYY-MM-DD).
 * @property string $PayRunStatus See PayRun Status types.
 * @property \DateTimeInterface $PaymentDate Payment Date for the PayRun (YYYY-MM-DD).
 * @property string $PayslipMessage Payslip message for the PayRun.
 * @property Payslip[] $Payslips See Payslip.
 * @property float $Wages Total Wages for the PayRun.
 * @property float $Deductions Total Deduction for the PayRun.
 * @property float $Tax Total Tax for the PayRun.
 * @property float $Super Total Super for the PayRun.
 * @property float $Reimbursement Total Reimbursement for the PayRun.
 * @property float $NetPay Total NetPay for the PayRun.
 */
class PayRun extends Remote\Model
{
    const STATUS_POSTED = 'POSTED';
    
    const STATUS_DRAFT = 'DRAFT';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PayRuns';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayRun';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayRunID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET,
        ];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'PayrollCalendarID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'PayRunID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PayRunPeriodStartDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PayRunPeriodEndDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PayRunStatus' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PaymentDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PayslipMessage' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Payslips' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip', true, false],
            'Wages' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Deductions' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Tax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Super' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Reimbursement' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'NetPay' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data['PayrollCalendarID'];
    }

    /**
     * @param string $value
     *
     * @return PayRun
     */
    public function setPayrollCalendarID($value)
    {
        $this->propertyUpdated('PayrollCalendarID', $value);
        $this->_data['PayrollCalendarID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayRunID()
    {
        return $this->_data['PayRunID'];
    }

    /**
     * @param string $value
     *
     * @return PayRun
     */
    public function setPayRunID($value)
    {
        $this->propertyUpdated('PayRunID', $value);
        $this->_data['PayRunID'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPayRunPeriodStartDate()
    {
        return $this->_data['PayRunPeriodStartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PayRun
     */
    public function setPayRunPeriodStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('PayRunPeriodStartDate', $value);
        $this->_data['PayRunPeriodStartDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPayRunPeriodEndDate()
    {
        return $this->_data['PayRunPeriodEndDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PayRun
     */
    public function setPayRunPeriodEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('PayRunPeriodEndDate', $value);
        $this->_data['PayRunPeriodEndDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayRunStatus()
    {
        return $this->_data['PayRunStatus'];
    }

    /**
     * @param string $value
     *
     * @return PayRun
     */
    public function setPayRunStatus($value)
    {
        $this->propertyUpdated('PayRunStatus', $value);
        $this->_data['PayRunStatus'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPaymentDate()
    {
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PayRun
     */
    public function setPaymentDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('PaymentDate', $value);
        $this->_data['PaymentDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayslipMessage()
    {
        return $this->_data['PayslipMessage'];
    }
    
     /**
     * @param string $value
     *
     * @return PayRun
     */
    public function setPayslipMessage($value)
    {
        $this->propertyUpdated('PayslipMessage', $value);
        $this->_data['PayslipMessage'] = $value;

        return $this;
    }

    /**
     * @return Payslip[]|Remote\Collection
     */
    public function getPayslips()
    {
        return $this->_data['Payslips'];
    }

    /**
     * @return float
     */
    public function getWages()
    {
        return $this->_data['Wages'];
    }

    /**
     * @return float
     */
    public function getDeductions()
    {
        return $this->_data['Deductions'];
    }

    /**
     * @return float
     */
    public function getTax()
    {
        return $this->_data['Tax'];
    }

    /**
     * @return float
     */
    public function getSuper()
    {
        return $this->_data['Super'];
    }

    /**
     * @return float
     */
    public function getReimbursement()
    {
        return $this->_data['Reimbursement'];
    }

    /**
     * @return float
     */
    public function getNetPay()
    {
        return $this->_data['NetPay'];
    }
}
