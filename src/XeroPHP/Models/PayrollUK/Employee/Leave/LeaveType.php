<?php

namespace XeroPHP\Models\PayrollUK\Employee\Leave;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class LeaveType extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Name of the leave type (max length = 50).
     *
     * @property string Name
     */

    /**
     * The type of units by which leave entitlements are normally tracked. These are typically the same as
     * the type of units used for the employee’s ordinary earnings rate.
     *
     * @property string TypeOfUnits
     */

    /**
     * Set this to indicate that an employee will be paid when taking this type of leave.
     *
     * @property string IsPaidLeave
     */

    /**
     * Set this if you want a balance for this leave type to be shown on your employee’s payslips.
     *
     * @property string ShowOnPayslip
     */

    /**
     * Xero identifier.
     *
     * @property string LeaveTypeID
     */

    /**
     * The number of units the employee is entitled to each year.
     *
     * @property string NormalEntitlement
     */

    /**
     * Enter an amount here if your organisation pays an additional percentage on top of ordinary earnings
     * when your employees take leave (typically 17.5%).
     *
     * @property float LeaveLoadingRate
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LeaveTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeaveType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'leaveTypeID';
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
            'name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'typeOfUnits' => [true, self::PROPERTY_TYPE_STRING, null, true, false],
            'isPaidLeave' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'showOnPayslip' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'leaveTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'normalEntitlement' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'leaveLoadingRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'currentRecord' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['name'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setName($value)
    {
        $this->propertyUpdated('name', $value);
        $this->_data['name'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfUnits()
    {
        return $this->_data['typeOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setTypeOfUnits($value)
    {
        $this->propertyUpdated('typeOfUnits', $value);
        $this->_data['typeOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsPaidLeave()
    {
        return $this->_data['isPaidLeave'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setIsPaidLeave($value)
    {
        $this->propertyUpdated('isPaidLeave', $value);
        $this->_data['isPaidLeave'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowOnPayslip()
    {
        return $this->_data['showOnPayslip'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setShowOnPayslip($value)
    {
        $this->propertyUpdated('showOnPayslip', $value);
        $this->_data['showOnPayslip'] = $value;

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
     * @return LeaveType
     */
    public function setLeaveTypeID($value)
    {
        $this->propertyUpdated('leaveTypeID', $value);
        $this->_data['leaveTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNormalEntitlement()
    {
        return $this->_data['normalEntitlement'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setNormalEntitlement($value)
    {
        $this->propertyUpdated('normalEntitlement', $value);
        $this->_data['normalEntitlement'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getLeaveLoadingRate()
    {
        return $this->_data['leaveLoadingRate'];
    }

    /**
     * @param float $value
     *
     * @return LeaveType
     */
    public function setLeaveLoadingRate($value)
    {
        $this->propertyUpdated('leaveLoadingRate', $value);
        $this->_data['leaveLoadingRate'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCurrentRecord()
    {
        return $this->_data['currentRecord'];
    }

    /**
     * @param bool $value
     *
     * @return LeaveType
     */
    public function setCurrentRecord($value)
    {
        $this->propertyUpdated('currentRecord', $value);
        $this->_data['currentRecord'] = $value;

        return $this;
    }
}
