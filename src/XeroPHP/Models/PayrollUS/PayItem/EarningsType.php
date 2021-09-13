<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;

class EarningsType extends Remote\Model
{
    /**
     * Name of the earnings type (max length = 100).
     *
     * @property EarningsType EarningsType
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property string DisplayName
     *
     * @deprecated
     */

    /**
     * See Accounts.
     *
     * @property string ExpenseAccountCode
     */

    /**
     * See EarningsCategory.
     *
     * @property string EarningsCategory
     */

    /**
     * Only when EarningsCategory is OVERTIMEEARNINGS, ALLOWANCE, ADDITIONALEARNINGS.
     *
     * @property string RateType
     */

    /**
     * Only when EarningsCategory is ADDITIONALEARNINGS, ALLOWANCE and RateType is RATEPERUNIT.
     *
     * @property string TypeOfUnits
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property string EarningsRateID
     *
     * @deprecated
     */

    /**
     * Xero identifier.
     *
     * @property string EarningsTypeID
     */

    /**
     * This is the multiplier used to calculate the rate per unit, based on the employee’s ordinary
     * earnings type. For example, for time and a half enter 1.5. Only applicable if RateType is MULTIPLE.
     *
     * @property float Multiple
     */

    /**
     * Set it to true if time off is NOT to be accumulated based on the hours reported to this earnings
     * type.
     *
     * @property string DoNotAccrueTimeOff
     */

    /**
     * Set it to true if this earnings type qualifies as a supplemental earnings according to the IRS
     * regulations, e.g bonus or commission.
     *
     * @property string IsSupplemental
     */

    /**
     * Optional for EarningsCategory COMMISSION, BONUS, CASHTIPS, NONCASHTIPS, RETROACTIVEPAY,
     * CLERGYHOUSINGALLOWANCE, CLERGYHOUSINGINKIND (this will be the amount that will be added to the
     * employee’s earnings on a per pay period basis). The ALLOWANCE & ADDITIONALEARNINGS
     * EarningsCategory will also have the Amount field when the Rate Type is selected as FIXEDAMOUNT.
     *
     * @property float Amount
     */
    const RATETYPE_FIXEDAMOUNT = 'FIXEDAMOUNT';

    const RATETYPE_MULTIPLE = 'MULTIPLE';

    const RATETYPE_RATEPERUNIT = 'RATEPERUNIT';

    const EARNINGSCATEGORY_REGULAR_EARNINGS = 'REGULAR EARNINGS';

    const EARNINGSCATEGORY_OVERTIMEEARNINGS = 'OVERTIMEEARNINGS';

    const EARNINGSCATEGORY_ALLOWANCE = 'ALLOWANCE';

    const EARNINGSCATEGORY_COMMISSION = 'COMMISSION';

    const EARNINGSCATEGORY_BONUS = 'BONUS';

    const EARNINGSCATEGORY_CASHTIPS = 'CASHTIPS';

    const EARNINGSCATEGORY_NONCASHTIPS = 'NONCASHTIPS';

    const EARNINGSCATEGORY_ADDITIONALEARNINGS = 'ADDITIONALEARNINGS';

    const EARNINGSCATEGORY_RETROACTIVEPAY = 'RETROACTIVEPAY';

    const EARNINGSCATEGORY_CLERGYHOUSINGALLOWANCE = 'CLERGYHOUSINGALLOWANCE';

    const EARNINGSCATEGORY_CLERGYHOUSINGINKIND = 'CLERGYHOUSINGINKIND';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'EarningsTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'EarningsType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'EarningsTypeID';
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
            'EarningsType' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\EarningsType', false, false],
            'DisplayName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExpenseAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsCategory' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'RateType' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TypeOfUnits' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'EarningsRateID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Multiple' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'DoNotAccrueTimeOff' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsSupplemental' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return EarningsType
     */
    public function getEarningsType()
    {
        return $this->_data['EarningsType'];
    }

    /**
     * @param EarningsType $value
     *
     * @return EarningsType
     */
    public function setEarningsType(self $value)
    {
        $this->propertyUpdated('EarningsType', $value);
        $this->_data['EarningsType'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getDisplayName()
    {
        return $this->_data['DisplayName'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     *
     * @deprecated
     */
    public function setDisplayName($value)
    {
        $this->propertyUpdated('DisplayName', $value);
        $this->_data['DisplayName'] = $value;

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
     * @return EarningsType
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
    public function getEarningsCategory()
    {
        return $this->_data['EarningsCategory'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     */
    public function setEarningsCategory($value)
    {
        $this->propertyUpdated('EarningsCategory', $value);
        $this->_data['EarningsCategory'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRateType()
    {
        return $this->_data['RateType'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     */
    public function setRateType($value)
    {
        $this->propertyUpdated('RateType', $value);
        $this->_data['RateType'] = $value;

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
     * @return EarningsType
     */
    public function setTypeOfUnit($value)
    {
        $this->propertyUpdated('TypeOfUnits', $value);
        $this->_data['TypeOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getEarningsRateID()
    {
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     *
     * @deprecated
     */
    public function setEarningsRateID($value)
    {
        $this->propertyUpdated('EarningsRateID', $value);
        $this->_data['EarningsRateID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID()
    {
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     */
    public function setEarningsTypeID($value)
    {
        $this->propertyUpdated('EarningsTypeID', $value);
        $this->_data['EarningsTypeID'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getMultiple()
    {
        return $this->_data['Multiple'];
    }

    /**
     * @param float $value
     *
     * @return EarningsType
     */
    public function setMultiple($value)
    {
        $this->propertyUpdated('Multiple', $value);
        $this->_data['Multiple'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDoNotAccrueTimeOff()
    {
        return $this->_data['DoNotAccrueTimeOff'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     */
    public function setDoNotAccrueTimeOff($value)
    {
        $this->propertyUpdated('DoNotAccrueTimeOff', $value);
        $this->_data['DoNotAccrueTimeOff'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsSupplemental()
    {
        return $this->_data['IsSupplemental'];
    }

    /**
     * @param string $value
     *
     * @return EarningsType
     */
    public function setIsSupplemental($value)
    {
        $this->propertyUpdated('IsSupplemental', $value);
        $this->_data['IsSupplemental'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return EarningsType
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }
}
