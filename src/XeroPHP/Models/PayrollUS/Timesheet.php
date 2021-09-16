<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\Timesheet\TimesheetLine;

class Timesheet extends Remote\Model
{
    /**
     * The Xero identifier for an employee.
     *
     * @property string EmployeeID
     */

    /**
     * Period start date.
     *
     * @property \DateTimeInterface StartDate
     */

    /**
     * Period end date.
     *
     * @property \DateTimeInterface EndDate
     */

    /**
     * See TimesheetLines.
     *
     * @property TimesheetLine[] TimesheetLines
     */

    /**
     * See Timesheet Status Codes.
     *
     * @property string Status
     */

    /**
     * The Xero identifier for a Payroll Timesheet.
     *
     * @property string TimesheetID
     */

    /**
     * Timesheet total hours.
     *
     * @property string Hours
     */
    const STATUS_DRAFT = 'DRAFT';

    const STATUS_PROCESSED = 'PROCESSED';

    const STATUS_APPROVED = 'APPROVED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Timesheets';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Timesheet';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'TimesheetID';
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
            'EmployeeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'StartDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'EndDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'TimesheetLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Timesheet\\TimesheetLine', true, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TimesheetID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Hours' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
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
     * @return Timesheet
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Timesheet
     */
    public function setStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate()
    {
        return $this->_data['EndDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Timesheet
     */
    public function setEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('EndDate', $value);
        $this->_data['EndDate'] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TimesheetLine[]
     */
    public function getTimesheetLines()
    {
        return $this->_data['TimesheetLines'];
    }

    /**
     * @param TimesheetLine $value
     *
     * @return Timesheet
     */
    public function addTimesheetLine(TimesheetLine $value)
    {
        $this->propertyUpdated('TimesheetLines', $value);
        if (! isset($this->_data['TimesheetLines'])) {
            $this->_data['TimesheetLines'] = new Remote\Collection();
        }
        $this->_data['TimesheetLines'][] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return Timesheet
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimesheetID()
    {
        return $this->_data['TimesheetID'];
    }

    /**
     * @param string $value
     *
     * @return Timesheet
     */
    public function setTimesheetID($value)
    {
        $this->propertyUpdated('TimesheetID', $value);
        $this->_data['TimesheetID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getHours()
    {
        return $this->_data['Hours'];
    }
}
