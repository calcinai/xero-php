<?php

namespace XeroPHP\Models\PayrollAU\Employee\PayTemplate;

use XeroPHP\Remote;

class LeaveLine extends Remote\Model
{
    /**
     * Xero leave type identifier.
     *
     * @property string LeaveTypeID
     */

    /**
     * See Superannuation Calculation Types.
     *
     * @property string CalculationType
     */

    /**
     * Hours of leave accrued each year.
     *
     * @property string AnnualNumberOfUnits
     */

    /**
     * Normal ordinary earnings number of units for leave line.
     *
     * @property string FullTimeNumberOfUnitsPerPeriod
     */

    /**
     * Number of units for leave line.
     *
     * @property string NumberOfUnits
     */

    /**
     * See Final Pay Payout Types If you do not provide any value then by Default it will be NOTPAIDOUT.
     *
     * @property string EntitlementFinalPayPayoutType
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LeaveLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeaveLine';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LeaveTypeId';
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
            'LeaveTypeID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'EntitlementFinalPayPayoutType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'AnnualNumberOfUnits' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'FullTimeNumberOfUnitsPerPeriod' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return LeaveLine
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
    public function getCalculationType()
    {
        return $this->_data['CalculationType'];
    }

    /**
     * @param string $value
     *
     * @return LeaveLine
     */
    public function setCalculationType($value)
    {
        $this->propertyUpdated('CalculationType', $value);
        $this->_data['CalculationType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnnualNumberOfUnits()
    {
        return $this->_data['AnnualNumberOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return LeaveLine
     */
    public function setAnnualNumberOfUnit($value)
    {
        $this->propertyUpdated('AnnualNumberOfUnits', $value);
        $this->_data['AnnualNumberOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullTimeNumberOfUnitsPerPeriod()
    {
        return $this->_data['FullTimeNumberOfUnitsPerPeriod'];
    }

    /**
     * @param string $value
     *
     * @return LeaveLine
     */
    public function setFullTimeNumberOfUnitsPerPeriod($value)
    {
        $this->propertyUpdated('FullTimeNumberOfUnitsPerPeriod', $value);
        $this->_data['FullTimeNumberOfUnitsPerPeriod'] = $value;

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
     * @return LeaveLine
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        $this->_data['NumberOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntitlementFinalPayPayoutType()
    {
        return $this->_data['EntitlementFinalPayPayoutType'];
    }

    /**
     * @param string $value
     *
     * @return LeaveLine
     */
    public function setEntitlementFinalPayPayoutType($value)
    {
        $this->propertyUpdated('EntitlementFinalPayPayoutType', $value);
        $this->_data['EntitlementFinalPayPayoutType'] = $value;

        return $this;
    }
}
