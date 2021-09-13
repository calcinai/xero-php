<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\LeaveApplication\LeavePeriod;

class LeaveApplication extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string LeaveApplicationID
     */

    /**
     * The Xero identifier for Payroll Employee.
     *
     * @property string EmployeeID
     */

    /**
     * The Xero identifier for Leave Type.
     *
     * @property string LeaveTypeID
     */

    /**
     * The title of the leave (max length = 50).
     *
     * @property string Title
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
     * @property LeavePeriod[] LeavePeriods
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
        return 'LeaveApplications';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeaveApplication';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LeaveApplicationID';
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
            'LeaveApplicationID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveTypeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Title' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'StartDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'EndDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeavePeriods' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\LeaveApplication\\LeavePeriod', true, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getLeaveApplicationID()
    {
        return $this->_data['LeaveApplicationID'];
    }

    /**
     * @param string $value
     *
     * @return LeaveApplication
     */
    public function setLeaveApplicationID($value)
    {
        $this->propertyUpdated('LeaveApplicationID', $value);
        $this->_data['LeaveApplicationID'] = $value;

        return $this;
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
     * @return LeaveApplication
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
    public function getLeaveTypeID()
    {
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     *
     * @return LeaveApplication
     */
    public function setLeaveTypeID($value)
    {
        $this->propertyUpdated('LeaveTypeID', $value);
        $this->_data['LeaveTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     *
     * @return LeaveApplication
     */
    public function setTitle($value)
    {
        $this->propertyUpdated('Title', $value);
        $this->_data['Title'] = $value;

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
     * @return LeaveApplication
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
     * @return LeaveApplication
     */
    public function setEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('EndDate', $value);
        $this->_data['EndDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return LeaveApplication
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return LeavePeriod[]|Remote\Collection
     */
    public function getLeavePeriods()
    {
        return $this->_data['LeavePeriods'];
    }

    /**
     * @param LeavePeriod $value
     *
     * @return LeaveApplication
     */
    public function addLeavePeriod(LeavePeriod $value)
    {
        $this->propertyUpdated('LeavePeriods', $value);
        if (! isset($this->_data['LeavePeriods'])) {
            $this->_data['LeavePeriods'] = new Remote\Collection();
        }
        $this->_data['LeavePeriods'][] = $value;

        return $this;
    }
}
