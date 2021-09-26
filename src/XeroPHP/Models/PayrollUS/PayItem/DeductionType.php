<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;

class DeductionType extends Remote\Model
{
    /**
     * Name of the deduction type (max length = 50).
     *
     * @property DeductionType DeductionType
     */

    /**
     * The category defines the tax implications of the deduction type so it is taxed properly.
     *
     * @property string DeductionCategory
     */

    /**
     * Deductions can be a fixed amount, or they can be calculated as a percentage of the employee’s
     * total earnings. Standard Plan, Catch-up Plan. Only needed DeductionCategory is not
     * AFTERTAXDEDUCTION, DEPENDEDNTCARE, FLEXIBLESPENDINGACCOUNT,HSASINGLEPLAN, HSAFAMILYPLAN,
     * SECTION125PLAN.
     *
     * @property float CalculationType
     */

    /**
     * The computed amount of the deduction is credited to this account. See See Accounts.
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Xero identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * This is a default amount you can set for all employees assigned to this deduction type. If you have
     * more than one employee that pays the same amount for health insurance, setting this amount will save
     * you time when setting up the employee deductions. If you choose not to set an amount here, you can
     * enter the amounts to be deducted on a per employee basis. Only applicable when DeductionCategory is
     * AFTERTAXDEDUCTION, DEPENDENTCARE, FLEXIBLESPENDINGACCOUNT,
     * SECTION125PLAN.
     *
     * @property float StandardAmount
     */

    /**
     * The company max is the maximum amount set as a default amount to be deducted for that particular
     * deduction type for all employees assigned this deduction type in a single year. For example, the IRS
     * publishes limits for certain deduction types each year. You can set a company maximum that is lower
     * than the IRS limit, depending on your plan requirements. If you don’t set a maximum, the deduction
     * will stop automatically when the IRS limit is reached.
     * Only applicable when DeductionCategory is
     * AFTERTAXDEDUCTION, DEPENDENTCARE, FLEXIBLESPENDINGACCOUNT,
     * SECTION125PLAN.
     *
     * @property float CompanyMax
     */
    const CALCULATION_TYPE_CATCHUPPLAN = 'CATCHUPPLAN';

    const CALCULATION_TYPE_STANDARDPLAN = 'STANDARDPLAN';

    const DEDUCTION_CATEGORY_AFTERTAXDEDUCTION = 'AFTERTAXDEDUCTION';

    const DEDUCTION_CATEGORY_DEPENDENTCARE = 'DEPENDENTCARE';

    const DEDUCTION_CATEGORY_FLEXIBLESPENDINGACCOUNT = 'FLEXIBLESPENDINGACCOUNT';

    const DEDUCTION_CATEGORY_HSASINGLEPLAN = 'HSASINGLEPLAN';

    const DEDUCTION_CATEGORY_HSAFAMILYPLAN = 'HSAFAMILYPLAN';

    const DEDUCTION_CATEGORY_ROTH401KRETIREMENTPLAN = 'ROTH401KRETIREMENTPLAN';

    const DEDUCTION_CATEGORY_ROTH403BRETIREMENTPLAN = 'ROTH403BRETIREMENTPLAN';

    const DEDUCTION_CATEGORY_SECTION125PLAN = 'SECTION125PLAN';

    const DEDUCTION_CATEGORY_SIMPLEIRARETIREMENTPLAN = 'SIMPLEIRARETIREMENTPLAN';

    const DEDUCTION_CATEGORY_401KRETIREMENTPLAN = '401KRETIREMENTPLAN';

    const DEDUCTION_CATEGORY_403BRETIREMENTPLAN = '403BRETIREMENTPLAN';

    const DEDUCTION_CATEGORY_457RETIREMENTPLAN = '457RETIREMENTPLAN';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'DeductionTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'DeductionType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'DeductionTypeID';
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
            'DeductionType' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\DeductionType', false, false],
            'DeductionCategory' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'CalculationType' => [true, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'LiabilityAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'StandardAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'CompanyMax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return DeductionType
     */
    public function getDeductionType()
    {
        return $this->_data['DeductionType'];
    }

    /**
     * @param DeductionType $value
     *
     * @return DeductionType
     */
    public function setDeductionType(self $value)
    {
        $this->propertyUpdated('DeductionType', $value);
        $this->_data['DeductionType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeductionCategory()
    {
        return $this->_data['DeductionCategory'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
     */
    public function setDeductionCategory($value)
    {
        $this->propertyUpdated('DeductionCategory', $value);
        $this->_data['DeductionCategory'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getCalculationType()
    {
        return $this->_data['CalculationType'];
    }

    /**
     * @param float $value
     *
     * @return DeductionType
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
    public function getLiabilityAccountCode()
    {
        return $this->_data['LiabilityAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
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
    public function getDeductionTypeID()
    {
        return $this->_data['DeductionTypeID'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
     */
    public function setDeductionTypeID($value)
    {
        $this->propertyUpdated('DeductionTypeID', $value);
        $this->_data['DeductionTypeID'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getStandardAmount()
    {
        return $this->_data['StandardAmount'];
    }

    /**
     * @param float $value
     *
     * @return DeductionType
     */
    public function setStandardAmount($value)
    {
        $this->propertyUpdated('StandardAmount', $value);
        $this->_data['StandardAmount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getCompanyMax()
    {
        return $this->_data['CompanyMax'];
    }

    /**
     * @param float $value
     *
     * @return DeductionType
     */
    public function setCompanyMax($value)
    {
        $this->propertyUpdated('CompanyMax', $value);
        $this->_data['CompanyMax'] = $value;

        return $this;
    }
}
