<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\Paystub\BenefitLine;
use XeroPHP\Models\PayrollUS\Paystub\TimeOffLine;
use XeroPHP\Models\PayrollUS\Paystub\EarningsLine;
use XeroPHP\Models\PayrollUS\Paystub\DeductionLine;
use XeroPHP\Models\PayrollUS\Paystub\LeaveEarningsLine;
use XeroPHP\Models\PayrollUS\Paystub\ReimbursementLine;
use XeroPHP\Models\PayrollUS\Paystub\TimesheetEarningsLine;

class Paystub extends Remote\Model
{
    /**
     * Xero identifier for payroll employee.
     *
     * @property string EmployeeID
     */

    /**
     * Xero identifier for payroll paystub.
     *
     * @property string PaystubID
     */

    /**
     * @property string PayRunID
     */

    /**
     * Employee first name.
     *
     * @property string FirstName
     */

    /**
     * Employee last name.
     *
     * @property string LastName
     */

    /**
     * Last edited.
     *
     * @property string LastEdited
     */

    /**
     * The Total Earnings for the PayRun.
     *
     * @property float[] Earnings
     */

    /**
     * The Total Deductions for the PayRun.
     *
     * @property float[] Deductions
     */

    /**
     * The Total Tax for the PayRun.
     *
     * @property float Tax
     */

    /**
     * The Total Reimbursement for the PayRun.
     *
     * @property float[] Reimbursements
     */

    /**
     * The Total NetPay for the PayRun.
     *
     * @property float NetPay
     */

    /**
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * See EarningsLine.
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * See LeaveEarningsLine.
     *
     * @property LeaveEarningsLine[] LeaveEarningsLines
     */

    /**
     * See TimesheetEarningsLine.
     *
     * @property TimesheetEarningsLine[] TimesheetEarningsLines
     */

    /**
     * See DeductionLine.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * See ReimbursementLine.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * See BenefitLine.
     *
     * @property BenefitLine[] BenefitLines
     */

    /**
     * See TimeOffLine.
     *
     * @property TimeOffLine[] TimeOffLines
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Paystubs';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Paystub';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PaystubID';
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
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PaystubID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PayRunID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FirstName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastEdited' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Earnings' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'Deductions' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'Tax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Reimbursements' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'NetPay' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'EarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\EarningsLine', true, false],
            'LeaveEarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\LeaveEarningsLine', true, false],
            'TimesheetEarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\TimesheetEarningsLine', true, false],
            'DeductionLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\DeductionLine', true, false],
            'ReimbursementLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\ReimbursementLine', true, false],
            'BenefitLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\BenefitLine', true, false],
            'TimeOffLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\TimeOffLine', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     *
     * @return Paystub
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPaystubID()
    {
        return $this->_data['PaystubID'];
    }

    /**
     * @param string $value
     *
     * @return Paystub
     */
    public function setPaystubID($value)
    {
        $this->propertyUpdated('PaystubID', $value);
        $this->_data['PaystubID'] = $value;

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
     * @return Paystub
     */
    public function setPayRunID($value)
    {
        $this->propertyUpdated('PayRunID', $value);
        $this->_data['PayRunID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     *
     * @return Paystub
     */
    public function setFirstName($value)
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     *
     * @return Paystub
     */
    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastEdited()
    {
        return $this->_data['LastEdited'];
    }

    /**
     * @param string $value
     *
     * @return Paystub
     */
    public function setLastEdited($value)
    {
        $this->propertyUpdated('LastEdited', $value);
        $this->_data['LastEdited'] = $value;

        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function getEarnings()
    {
        return $this->_data['Earnings'];
    }

    /**
     * @param float $value
     *
     * @return Paystub
     */
    public function addEarning($value)
    {
        $this->propertyUpdated('Earnings', $value);
        if (! isset($this->_data['Earnings'])) {
            $this->_data['Earnings'] = new Remote\Collection();
        }
        $this->_data['Earnings'][] = $value;

        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function getDeductions()
    {
        return $this->_data['Deductions'];
    }

    /**
     * @param float $value
     *
     * @return Paystub
     */
    public function addDeduction($value)
    {
        $this->propertyUpdated('Deductions', $value);
        if (! isset($this->_data['Deductions'])) {
            $this->_data['Deductions'] = new Remote\Collection();
        }
        $this->_data['Deductions'][] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTax()
    {
        return $this->_data['Tax'];
    }

    /**
     * @param float $value
     *
     * @return Paystub
     */
    public function setTax($value)
    {
        $this->propertyUpdated('Tax', $value);
        $this->_data['Tax'] = $value;

        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function getReimbursements()
    {
        return $this->_data['Reimbursements'];
    }

    /**
     * @param float $value
     *
     * @return Paystub
     */
    public function addReimbursement($value)
    {
        $this->propertyUpdated('Reimbursements', $value);
        if (! isset($this->_data['Reimbursements'])) {
            $this->_data['Reimbursements'] = new Remote\Collection();
        }
        $this->_data['Reimbursements'][] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getNetPay()
    {
        return $this->_data['NetPay'];
    }

    /**
     * @param float $value
     *
     * @return Paystub
     */
    public function setNetPay($value)
    {
        $this->propertyUpdated('NetPay', $value);
        $this->_data['NetPay'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Paystub
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return EarningsLine[]|Remote\Collection
     */
    public function getEarningsLines()
    {
        return $this->_data['EarningsLines'];
    }

    /**
     * @param EarningsLine $value
     *
     * @return Paystub
     */
    public function addEarningsLine(EarningsLine $value)
    {
        $this->propertyUpdated('EarningsLines', $value);
        if (! isset($this->_data['EarningsLines'])) {
            $this->_data['EarningsLines'] = new Remote\Collection();
        }
        $this->_data['EarningsLines'][] = $value;

        return $this;
    }

    /**
     * @return LeaveEarningsLine[]|Remote\Collection
     */
    public function getLeaveEarningsLines()
    {
        return $this->_data['LeaveEarningsLines'];
    }

    /**
     * @param LeaveEarningsLine $value
     *
     * @return Paystub
     */
    public function addLeaveEarningsLine(LeaveEarningsLine $value)
    {
        $this->propertyUpdated('LeaveEarningsLines', $value);
        if (! isset($this->_data['LeaveEarningsLines'])) {
            $this->_data['LeaveEarningsLines'] = new Remote\Collection();
        }
        $this->_data['LeaveEarningsLines'][] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TimesheetEarningsLine[]
     */
    public function getTimesheetEarningsLines()
    {
        return $this->_data['TimesheetEarningsLines'];
    }

    /**
     * @param TimesheetEarningsLine $value
     *
     * @return Paystub
     */
    public function addTimesheetEarningsLine(TimesheetEarningsLine $value)
    {
        $this->propertyUpdated('TimesheetEarningsLines', $value);
        if (! isset($this->_data['TimesheetEarningsLines'])) {
            $this->_data['TimesheetEarningsLines'] = new Remote\Collection();
        }
        $this->_data['TimesheetEarningsLines'][] = $value;

        return $this;
    }

    /**
     * @return DeductionLine[]|Remote\Collection
     */
    public function getDeductionLines()
    {
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine $value
     *
     * @return Paystub
     */
    public function addDeductionLine(DeductionLine $value)
    {
        $this->propertyUpdated('DeductionLines', $value);
        if (! isset($this->_data['DeductionLines'])) {
            $this->_data['DeductionLines'] = new Remote\Collection();
        }
        $this->_data['DeductionLines'][] = $value;

        return $this;
    }

    /**
     * @return ReimbursementLine[]|Remote\Collection
     */
    public function getReimbursementLines()
    {
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param ReimbursementLine $value
     *
     * @return Paystub
     */
    public function addReimbursementLine(ReimbursementLine $value)
    {
        $this->propertyUpdated('ReimbursementLines', $value);
        if (! isset($this->_data['ReimbursementLines'])) {
            $this->_data['ReimbursementLines'] = new Remote\Collection();
        }
        $this->_data['ReimbursementLines'][] = $value;

        return $this;
    }

    /**
     * @return BenefitLine[]|Remote\Collection
     */
    public function getBenefitLines()
    {
        return $this->_data['BenefitLines'];
    }

    /**
     * @param BenefitLine $value
     *
     * @return Paystub
     */
    public function addBenefitLine(BenefitLine $value)
    {
        $this->propertyUpdated('BenefitLines', $value);
        if (! isset($this->_data['BenefitLines'])) {
            $this->_data['BenefitLines'] = new Remote\Collection();
        }
        $this->_data['BenefitLines'][] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TimeOffLine[]
     */
    public function getTimeOffLines()
    {
        return $this->_data['TimeOffLines'];
    }

    /**
     * @param TimeOffLine $value
     *
     * @return Paystub
     */
    public function addTimeOffLine(TimeOffLine $value)
    {
        $this->propertyUpdated('TimeOffLines', $value);
        if (! isset($this->_data['TimeOffLines'])) {
            $this->_data['TimeOffLines'] = new Remote\Collection();
        }
        $this->_data['TimeOffLines'][] = $value;

        return $this;
    }
}
