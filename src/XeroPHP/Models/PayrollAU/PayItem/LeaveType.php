<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;

class LeaveType extends Remote\Model
{
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
        return 'LeaveTypeID';
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
            'Name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'TypeOfUnits' => [true, self::PROPERTY_TYPE_STRING, null, true, false],
            'IsPaidLeave' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ShowOnPayslip' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NormalEntitlement' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveLoadingRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'CurrentRecord' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false]
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
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfUnits()
    {
        return $this->_data['TypeOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setTypeOfUnits($value)
    {
        $this->propertyUpdated('TypeOfUnits', $value);
        $this->_data['TypeOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsPaidLeave()
    {
        return $this->_data['IsPaidLeave'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setIsPaidLeave($value)
    {
        $this->propertyUpdated('IsPaidLeave', $value);
        $this->_data['IsPaidLeave'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowOnPayslip()
    {
        return $this->_data['ShowOnPayslip'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setShowOnPayslip($value)
    {
        $this->propertyUpdated('ShowOnPayslip', $value);
        $this->_data['ShowOnPayslip'] = $value;

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
     * @return LeaveType
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
    public function getNormalEntitlement()
    {
        return $this->_data['NormalEntitlement'];
    }

    /**
     * @param string $value
     *
     * @return LeaveType
     */
    public function setNormalEntitlement($value)
    {
        $this->propertyUpdated('NormalEntitlement', $value);
        $this->_data['NormalEntitlement'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getLeaveLoadingRate()
    {
        return $this->_data['LeaveLoadingRate'];
    }

    /**
     * @param float $value
     *
     * @return LeaveType
     */
    public function setLeaveLoadingRate($value)
    {
        $this->propertyUpdated('LeaveLoadingRate', $value);
        $this->_data['LeaveLoadingRate'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCurrentRecord()
    {
        return $this->_data['CurrentRecord'];
    }

    /**
     * @param bool $value
     *
     * @return LeaveType
     */
    public function setCurrentRecord($value)
    {
        $this->propertyUpdated('CurrentRecord', $value);
        $this->_data['CurrentRecord'] = $value;

        return $this;
    }
}
