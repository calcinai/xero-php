<?php

namespace XeroPHP\Models\PayrollUK\Employee;

use XeroPHP\Models\PayrollUK\Employee\Leave\Period;
use XeroPHP\Remote;

class Leave extends Remote\Model
{
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
        return 'Leave';
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
            'LeaveID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveTypeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'StartDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'EndDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Periods' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUK\\Leave\\Period', true, false],
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
        return $this->_data['LeaveID'];
    }

    /**
     * @param string $value
     *
     * @return Leave
     */
    public function setLeaveID($value)
    {
        $this->propertyUpdated('LeaveID', $value);
        $this->_data['LeaveID'] = $value;

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
     * @return Leave
     */
    public function setLeaveTypeID($value)
    {
        $this->propertyUpdated('LeaveTypeID', $value);
        $this->_data['LeaveTypeID'] = $value;

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
     * @return Leave
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
     * @return Leave
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
     * @return Leave
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return Period[]|Remote\Collection
     */
    public function getPeriods()
    {
        return $this->_data['Periods'];
    }

    /**
     * @param Period $value
     *
     * @return Leave
     */
    public function addPeriod(Period $value)
    {
        $this->propertyUpdated('Periods', $value);
        if (! isset($this->_data['Periods'])) {
            $this->_data['Periods'] = new Remote\Collection();
        }
        $this->_data['Periods'][] = $value;

        return $this;
    }
}