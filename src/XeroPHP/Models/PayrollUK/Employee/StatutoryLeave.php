<?php

namespace XeroPHP\Models\PayrollUK\Employee;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class StatutoryLeave extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Xero identifier.
     *
     * @property string StatutoryLeaveID
     */

    /**
     * Xero Employee identifier.
     *
     * @property string EmployeeID
     */

    /**
     * The Xero identifier for Leave Type.
     *
     * @property string Type
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
     * Whether the leave was entitled to receive payment.
     *
     * @property bool isEntitled
     */

    /**
     * The Status of the Statutory Leave.
     *
     * @property string Status
     */

    const STATUTORY_LEAVE_STATUS_PENDING = 'Pending';
    const STATUTORY_LEAVE_STATUS_IN_PROGRESS = 'In-Progress';
    const STATUTORY_LEAVE_STATUS_IN_COMPLETED = 'Completed';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'StatutoryLeaves/Summary';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'StatutoryLeave';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'StatutoryLeaveID';
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
            Remote\Request::METHOD_GET
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
            'statutoryLeaveID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'employeeID' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'type' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'startDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'endDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'isEntitled' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'status' => [false, self::PROPERTY_TYPE_STRING, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getStatutoryLeaveID()
    {
        return $this->_data['statutoryLeaveID'];
    }

    /**
     * @param string $value
     *
     * @return StatutoryLeave
     */
    public function setStatutoryLeaveID($value)
    {
        $this->propertyUpdated('statutoryLeaveID', $value);
        $this->_data['statutoryLeaveID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data['employeeID'];
    }

    /**
     * @param string $value
     *
     * @return StatutoryLeave
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('employeeID', $value);
        $this->_data['employeeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['type'];
    }

    /**
     * @param string $value
     *
     * @return StatutoryLeave
     */
    public function setType($value)
    {
        $this->propertyUpdated('type', $value);
        $this->_data['type'] = $value;

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
     * @return StatutoryLeave
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
     * @return StatutoryLeave
     */
    public function setEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('endDate', $value);
        $this->_data['endDate'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsEntitled()
    {
        return $this->_data['isEntitled'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return StatutoryLeave
     */
    public function setIsEntitled($value)
    {
        $this->propertyUpdated('isEntitled', $value);
        $this->_data['isEntitled'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['status'];
    }

    /**
     * @param string $value
     *
     * @return StatutoryLeave
     */
    public function setStatus(string $value)
    {
        $this->propertyUpdated('status', $value);
        $this->_data['status'] = $value;

        return $this;
    }
}
