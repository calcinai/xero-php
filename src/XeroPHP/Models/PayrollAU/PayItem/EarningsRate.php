<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;

class EarningsRate extends Remote\Model
{
    /**
     * Name of the earnings rate (max length = 100).
     *
     * @property string Name
     */

    /**
     * See Accounts.
     *
     * @property string AccountCode
     */

    /**
     * Type of units used to record earnings (max length = 50). Only When RateType is RATEPERUNIT.
     *
     * @property string TypeOfUnits
     */

    /**
     * Most payments are subject to tax, so you should only set this value if you are sure that a payment
     * is exempt from PAYG withholding.
     *
     * @property string IsExemptFromTax
     */

    /**
     * See the ATO website for details of which payments are exempt from SGC.
     *
     * @property string IsExemptFromSuper
     */

    /**
     * See EarningsTypes.
     *
     * @property string EarningsType
     */

    /**
     * Xero identifier.
     *
     * @property string EarningsRateID
     */

    /**
     * See RateTypes.
     *
     * @property string RateType
     */

    /**
     * Default rate per unit (optional). Only applicable if RateType is RATEPERUNIT.
     *
     * @property float RatePerUnit
     */

    /**
     * This is the multiplier used to calculate the rate per unit, based on the employee’s ordinary
     * earnings rate. For example, for time and a half enter 1.5. Only applicable if RateType is MULTIPLE.
     *
     * @property float Multiplier
     */

    /**
     * Indicates that this earnings rate should accrue leave. Only applicable if RateType is MULTIPLE.
     *
     * @property float AccrueLeave
     */

    /**
     * Option AllowanceType for ALLOWANCE EarningsType EarningsRate.
     * Used to group allowances for reporting to the ATO. Undocumented. Only applicable if EarningsType is ALLOWANCE.
     *
     * @property string AllowanceType
     */
    const ALLOWANCETYPE_CAR = 'CAR';

    const ALLOWANCETYPE_LAUNDRY = 'LAUNDRY';

    const ALLOWANCETYPE_MEALS = 'MEALS';

    const ALLOWANCETYPE_TRANSPORT = 'TRANSPORT';

    const ALLOWANCETYPE_TRAVEL = 'TRAVEL';

    const ALLOWANCETYPE_OTHER = 'OTHER';


    /**
     * Option Amount for FIXEDAMOUNT RateType EarningsRate.
     *
     * @property float Amount
     */
    const EARNINGSTYPE_FIXED = 'FIXED';

    const EARNINGSTYPE_ORDINARYTIMEEARNINGS = 'ORDINARYTIMEEARNINGS';

    const EARNINGSTYPE_OVERTIMEEARNINGS = 'OVERTIMEEARNINGS';

    const EARNINGSTYPE_ALLOWANCE = 'ALLOWANCE';

    const EARNINGSTYPE_LUMPSUMD = 'LUMPSUMD';

    const EARNINGS_TYPE_EMPLOYMENTTERMINATIONPAYMENT = 'EMPLOYMENTTERMINATIONPAYMENT';

    const RATETYPE_FIXEDAMOUNT = 'FIXEDAMOUNT';

    const RATETYPE_MULTIPLE = 'MULTIPLE';

    const RATETYPE_RATEPERUNIT = 'RATEPERUNIT';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'EarningsRates';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'EarningsRate';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'EarningsRateID';
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
            'AccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'TypeOfUnits' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsExemptFromTax' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsExemptFromSuper' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsType' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'EarningsRateID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'RateType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'RatePerUnit' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Multiplier' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AccrueLeave' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'CurrentRecord' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'AllowanceType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false]
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
     * @return EarningsRate
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
    public function getAccountCode()
    {
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setAccountCode($value)
    {
        $this->propertyUpdated('AccountCode', $value);
        $this->_data['AccountCode'] = $value;

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
     * @return EarningsRate
     */
    public function setTypeOfUnit($value)
    {
        $this->propertyUpdated('TypeOfUnits', $value);
        $this->_data['TypeOfUnits'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsExemptFromTax()
    {
        return $this->_data['IsExemptFromTax'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setIsExemptFromTax($value)
    {
        $this->propertyUpdated('IsExemptFromTax', $value);
        $this->_data['IsExemptFromTax'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getIsExemptFromSuper()
    {
        return $this->_data['IsExemptFromSuper'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setIsExemptFromSuper($value)
    {
        $this->propertyUpdated('IsExemptFromSuper', $value);
        $this->_data['IsExemptFromSuper'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAllowanceType()
    {
        return $this->_data['AllowanceType'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setAllowanceType($value)
    {
        $this->propertyUpdated('AllowanceType', $value);
        $this->_data['AllowanceType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsType()
    {
        return $this->_data['EarningsType'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setEarningsType($value)
    {
        $this->propertyUpdated('EarningsType', $value);
        $this->_data['EarningsType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsRateID()
    {
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
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
    public function getRateType()
    {
        return $this->_data['RateType'];
    }

    /**
     * @param string $value
     *
     * @return EarningsRate
     */
    public function setRateType($value)
    {
        $this->propertyUpdated('RateType', $value);
        $this->_data['RateType'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getRatePerUnit()
    {
        return $this->_data['RatePerUnit'];
    }

    /**
     * @param float $value
     *
     * @return EarningsRate
     */
    public function setRatePerUnit($value)
    {
        $this->propertyUpdated('RatePerUnit', $value);
        $this->_data['RatePerUnit'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getMultiplier()
    {
        return $this->_data['Multiplier'];
    }

    /**
     * @param float $value
     *
     * @return EarningsRate
     */
    public function setMultiplier($value)
    {
        $this->propertyUpdated('Multiplier', $value);
        $this->_data['Multiplier'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAccrueLeave()
    {
        return $this->_data['AccrueLeave'];
    }

    /**
     * @param float $value
     *
     * @return EarningsRate
     */
    public function setAccrueLeave($value)
    {
        $this->propertyUpdated('AccrueLeave', $value);
        $this->_data['AccrueLeave'] = $value;

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
     * @return EarningsRate
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

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
     * @return EarningsRate
     */
    public function setCurrentRecord($value)
    {
        $this->propertyUpdated('CurrentRecord', $value);
        $this->_data['CurrentRecord'] = $value;

        return $this;
    }
}
