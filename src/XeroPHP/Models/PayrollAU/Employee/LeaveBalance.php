<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\PayItem;

class LeaveBalance extends Remote\Model
{
    /**
     * The name of the leave type.
     *
     * @property string LeaveName
     */

    /**
     * Identifier of the leave type (see PayItems).
     *
     * @property string LeaveTypeID
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
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LeaveBalances';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeaveBalance';
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
            'LeaveName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TypeOfUnits' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\PayItem', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getLeaveName()
    {
        return $this->_data['LeaveName'];
    }

    /**
     * @param string $value
     *
     * @return LeaveBalance
     */
    public function setLeaveName($value)
    {
        $this->propertyUpdated('LeaveName', $value);
        $this->_data['LeaveName'] = $value;

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
     * @return LeaveBalance
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
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return LeaveBalance
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
     * @return LeaveBalance
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
}
