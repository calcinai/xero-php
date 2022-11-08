<?php

namespace XeroPHP\Models\PayrollUK\Employee;

use XeroPHP\Models\PayrollUK\Employee\Leave\Period;
use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Leave extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Xero identifier.
     *
     * @property string LeaveID
     */

    /**
     * The Xero identifier for Leave Type.
     *
     * @property string LeaveTypeID
     */

    /**
     * Start date of the leave (YYYY-MM-DD).
     *
     * @property \DateTimeInterface StartDate
     */

    /**
     * End date of the leave (YYYY-MM-DD).
     *
     * @property \DateTimeInterface EndDate
     */

    /**
     * The Description of the Leave (max length = 200).
     *
     * @property string Description
     */

    /**
     * The leave period information.
     *
     * @property Period[] Periods
     */
    const LEAVE_PERIOD_STATUS_SCHEDULED = 'Scheduled';

    const LEAVE_PERIOD_STATUS_PROCESSED = 'Processed';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Employees/{EmployeeID}/Leave';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Leave';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LeaveID';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_DELETE
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
            'leaveID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'leaveTypeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'startDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'endDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'periods' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUK\\Employee\\Leave\\Period', true, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getLeaveID()
    {
        return $this->_data['leaveID'];
    }

    /**
     * @param string $value
     *
     * @return Leave
     */
    public function setLeaveID($value)
    {
        $this->propertyUpdated('leaveID', $value);
        $this->_data['leaveID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLeaveTypeID()
    {
        return $this->_data['leaveTypeID'];
    }

    /**
     * @param string $value
     *
     * @return Leave
     */
    public function setLeaveTypeID($value)
    {
        $this->propertyUpdated('leaveTypeID', $value);
        $this->_data['leaveTypeID'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->_data['startDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Leave
     */
    public function setStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('startDate', $value);
        $this->_data['startDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate()
    {
        return $this->_data['endDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Leave
     */
    public function setEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('endDate', $value);
        $this->_data['endDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['description'];
    }

    /**
     * @param string $value
     *
     * @return Leave
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('description', $value);
        $this->_data['description'] = $value;

        return $this;
    }

    /**
     * @return Period[]|Remote\Collection
     */
    public function getPeriods()
    {
        return $this->_data['periods'];
    }

    /**
     * @param Period $value
     *
     * @return Leave
     */
    public function addPeriod(Period $value)
    {
        $this->propertyUpdated('periods', $value);
        if (! isset($this->_data['periods'])) {
            $this->_data['periods'] = new Remote\Collection();
        }
        $this->_data['periods'][] = $value;

        return $this;
    }
}
