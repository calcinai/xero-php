<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;

class TimeOffType extends Remote\Model
{
    /**
     * Name of the time off type (max length = 50).
     *
     * @property TimeOffType TimeOffType
     */

    /**
     * Select Unpaid Time Off to indicate that an employee will not get paid when taking this time off
     * type.
     * If Paid Time Off is selected the employee will get paid when taking this time off type and you
     * can accrue the liability on the Balance Sheet.
     *
     * @property string TimeOffCategory
     */

    /**
     * The account to which the amount of the time off is to be debited. Only applies for TimeOffCategory
     * of PAIDTIMEOFF.
     *
     * @property string ExpenseAccountCode
     */

    /**
     * The computed amount of the time off is credited to this account.
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Xero identifier.
     *
     * @property string TimeOffTypeID
     */

    /**
     * Set it to true if you want the balance for this time off type to show on the employee’s paystub
     * and in the employee’s My Payroll account.
     *
     * @property string ShowBalanceToEmployee
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TimeOffTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TimeOffType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'TimeOffTypeID';
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
            'TimeOffType' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\TimeOffType', false, false],
            'TimeOffCategory' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ExpenseAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'LiabilityAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'TimeOffTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ShowBalanceToEmployee' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return TimeOffType
     */
    public function getTimeOffType()
    {
        return $this->_data['TimeOffType'];
    }

    /**
     * @param TimeOffType $value
     *
     * @return TimeOffType
     */
    public function setTimeOffType(self $value)
    {
        $this->propertyUpdated('TimeOffType', $value);
        $this->_data['TimeOffType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOffCategory()
    {
        return $this->_data['TimeOffCategory'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffType
     */
    public function setTimeOffCategory($value)
    {
        $this->propertyUpdated('TimeOffCategory', $value);
        $this->_data['TimeOffCategory'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccountCode()
    {
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffType
     */
    public function setExpenseAccountCode($value)
    {
        $this->propertyUpdated('ExpenseAccountCode', $value);
        $this->_data['ExpenseAccountCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLiabilityAccountCode()
    {
        return $this->_data['LiabilityAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffType
     */
    public function setLiabilityAccountCode($value)
    {
        $this->propertyUpdated('LiabilityAccountCode', $value);
        $this->_data['LiabilityAccountCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOffTypeID()
    {
        return $this->_data['TimeOffTypeID'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffType
     */
    public function setTimeOffTypeID($value)
    {
        $this->propertyUpdated('TimeOffTypeID', $value);
        $this->_data['TimeOffTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getShowBalanceToEmployee()
    {
        return $this->_data['ShowBalanceToEmployee'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffType
     */
    public function setShowBalanceToEmployee($value)
    {
        $this->propertyUpdated('ShowBalanceToEmployee', $value);
        $this->_data['ShowBalanceToEmployee'] = $value;

        return $this;
    }
}
