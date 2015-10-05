<?php
namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

class PayRun extends Remote\Object
{

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
     * @property string Wages
     */

    /**
     * Total Deduction for the PayRun
     *
     * @property string Deductions
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



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PayRuns';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayRun';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayRunID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
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
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return array(
            'PayrollCalendarID' => array (true, self::PROPERTY_TYPE_STRING, null, false, false),
            'PayRunID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'PayRunPeriodStartDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'PayRunPeriodEndDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'PayRunStatus' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false),
            'PaymentDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'PayslipMessage' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Payslips' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip', true, false),
            'Wages' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Deductions' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Tax' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Super' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Reimbursement' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'NetPay' => array (false, self::PROPERTY_TYPE_STRING, null, false, false)
        );
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
     * @return PayRun
     */
    public function setPayRunID($value)
    {
        $this->propertyUpdated('PayRunID', $value);
        $this->_data['PayRunID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayRunPeriodStartDate()
    {
        return $this->_data['PayRunPeriodStartDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPayRunPeriodStartDate(\DateTime $value)
    {
        $this->propertyUpdated('PayRunPeriodStartDate', $value);
        $this->_data['PayRunPeriodStartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayRunPeriodEndDate()
    {
        return $this->_data['PayRunPeriodEndDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPayRunPeriodEndDate(\DateTime $value)
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
     * @return PayRun
     */
    public function setPayRunStatus($value)
    {
        $this->propertyUpdated('PayRunStatus', $value);
        $this->_data['PayRunStatus'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate()
    {
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayRun
     */
    public function setPaymentDate(\DateTime $value)
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
     * @return Payslip[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getPayslips()
    {
        return $this->_data['Payslips'];
    }


    /**
     * @return string
     */
    public function getWages()
    {
        return $this->_data['Wages'];
    }


    /**
     * @return string
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
     * @return string
     */
    public function getSuper()
    {
        return $this->_data['Super'];
    }


    /**
     * @return string
     */
    public function getReimbursement()
    {
        return $this->_data['Reimbursement'];
    }


    /**
     * @return string
     */
    public function getNetPay()
    {
        return $this->_data['NetPay'];
    }



}
