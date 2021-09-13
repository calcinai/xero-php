<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\PayItem;

class TimeOffBalance extends Remote\Model
{
    /**
     * The name of the leave type.
     *
     * @property string TimeOffName
     */

    /**
     * Identifier of the leave type (see PayItems).
     *
     * @property PayItem TimeOffTypeId
     */

    /**
     * The balance of the leave available.
     *
     * @property string NumberOfUnits
     */

    /**
     * The type of units as specified by the LeaveType (see PayItems).
     *
     * @property PayItem[] TypeOfUnits
     */

    /**
     * The Xero identifier for an employee e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9.
     *
     * @property string EmployeeID
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TimeOffBalances';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TimeOffBalance';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
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
            'TimeOffName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TimeOffTypeId' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem', false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TypeOfUnits' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem', true, false],
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTimeOffName()
    {
        return $this->_data['TimeOffName'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffBalance
     */
    public function setTimeOffName($value)
    {
        $this->propertyUpdated('TimeOffName', $value);
        $this->_data['TimeOffName'] = $value;

        return $this;
    }

    /**
     * @return PayItem
     */
    public function getTimeOffTypeId()
    {
        return $this->_data['TimeOffTypeId'];
    }

    /**
     * @param PayItem $value
     *
     * @return TimeOffBalance
     */
    public function setTimeOffTypeId(PayItem $value)
    {
        $this->propertyUpdated('TimeOffTypeId', $value);
        $this->_data['TimeOffTypeId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffBalance
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        $this->_data['NumberOfUnits'] = $value;

        return $this;
    }

    /**
     * @return PayItem[]|Remote\Collection
     */
    public function getTypeOfUnits()
    {
        return $this->_data['TypeOfUnits'];
    }

    /**
     * @param PayItem $value
     *
     * @return TimeOffBalance
     */
    public function addTypeOfUnit(PayItem $value)
    {
        $this->propertyUpdated('TypeOfUnits', $value);
        if (! isset($this->_data['TypeOfUnits'])) {
            $this->_data['TypeOfUnits'] = new Remote\Collection();
        }
        $this->_data['TypeOfUnits'][] = $value;

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
     * @return TimeOffBalance
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }
}
