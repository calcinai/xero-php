<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;

class BenefitType extends Remote\Model
{
    /**
     * Name of the benefit type (max length = 100).
     *
     * @property BenefitType BenefitType
     */

    /**
     * The category defines the tax implications of the benefit type so it is taxed properly. See
     * BenefitCategory.
     *
     * @property string BenefitCategory
     */

    /**
     * The account to which the amount of the benefit is to be credited.
     *
     * @property string LiabilityAccountCode
     */

    /**
     * The account to which the amount of the benefit is to be debited.
     *
     * @property string ExpenseAccountCode
     */

    /**
     * Xero identifier.
     *
     * @property string BenefitTypeID
     */

    /**
     * This is a default amount you can set for all employees assigned to this benefit type.
     *
     * @property float StandardAmount
     */

    /**
     * The company max is the maximum amount set as a default amount for that particular benefit type for
     * all employees assigned this benefit type in a single year.
     *
     * @property float CompanyMax
     */

    /**
     * This is a default percentage you can set for all employees assigned to this benefit type.
     *
     * @property string Percentage
     */

    /**
     * Set this to true if you want this benefit item amount and YTD balance will show on the employee’s
     * paystubs.
     *
     * @property float ShowBalanceOnPaystub
     */
    const BENEFITCATEGORY_AFTERTAXBENEFIT = 'AFTERTAXBENEFIT';

    const BENEFITCATEGORY_DEPENDENTCARE = 'DEPENDENTCARE';

    const BENEFITCATEGORY_FLEXIBLESPENDINGACCOUNT = 'FLEXIBLESPENDINGACCOUNT';

    const BENEFITCATEGORY_HEALTHSAVINGSACCOUNTSINGLEPLAN = 'HEALTHSAVINGSACCOUNTSINGLEPLAN';

    const BENEFITCATEGORY_HEALTHSAVINGSACCOUNTFAMILYPLAN = 'HEALTHSAVINGSACCOUNTFAMILYPLAN';

    const BENEFITCATEGORY_ROTH401KREITREMENTPLAN = 'ROTH401KREITREMENTPLAN';

    const BENEFITCATEGORY_ROTH403BRETIREMENTPLAN = 'ROTH403BRETIREMENTPLAN';

    const BENEFITCATEGORY_SECTION125PLAN = 'SECTION125PLAN';

    const BENEFITCATEGORY_SIMPLEIRARETIREMENTPLAN = 'SIMPLEIRARETIREMENTPLAN';

    const BENEFITCATEGORY_401KRETIREMENTPLAN = '401KRETIREMENTPLAN';

    const BENEFITCATEGORY_403BRETIREMENTPLAN = '403BRETIREMENTPLAN';

    const BENEFITCATEGORY_457RETIREMENTPLAN = '457RETIREMENTPLAN';

    const BENEFITCATEGORY_PERSONALUSEOFACOMPANYCAR = 'PERSONALUSEOFACOMPANYCAR';

    const BENEFITCATEGORY_GROUPTERMLIFEINSURANCE = 'GROUPTERMLIFEINSURANCE';

    const BENEFITCATEGORY_SCORPHEALTH = 'SCORPHEALTH';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BenefitTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BenefitType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'BenefitTypeID';
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
            'BenefitType' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\BenefitType', false, false],
            'BenefitCategory' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LiabilityAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExpenseAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'BenefitTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'StandardAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'CompanyMax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Percentage' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ShowBalanceOnPaystub' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return BenefitType
     */
    public function getBenefitType()
    {
        return $this->_data['BenefitType'];
    }

    /**
     * @param BenefitType $value
     *
     * @return BenefitType
     */
    public function setBenefitType(self $value)
    {
        $this->propertyUpdated('BenefitType', $value);
        $this->_data['BenefitType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBenefitCategory()
    {
        return $this->_data['BenefitCategory'];
    }

    /**
     * @param string $value
     *
     * @return BenefitType
     */
    public function setBenefitCategory($value)
    {
        $this->propertyUpdated('BenefitCategory', $value);
        $this->_data['BenefitCategory'] = $value;

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
     * @return BenefitType
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
    public function getExpenseAccountCode()
    {
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return BenefitType
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
    public function getBenefitTypeID()
    {
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     *
     * @return BenefitType
     */
    public function setBenefitTypeID($value)
    {
        $this->propertyUpdated('BenefitTypeID', $value);
        $this->_data['BenefitTypeID'] = $value;

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
     * @return BenefitType
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
     * @return BenefitType
     */
    public function setCompanyMax($value)
    {
        $this->propertyUpdated('CompanyMax', $value);
        $this->_data['CompanyMax'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPercentage()
    {
        return $this->_data['Percentage'];
    }

    /**
     * @param string $value
     *
     * @return BenefitType
     */
    public function setPercentage($value)
    {
        $this->propertyUpdated('Percentage', $value);
        $this->_data['Percentage'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getShowBalanceOnPaystub()
    {
        return $this->_data['ShowBalanceOnPaystub'];
    }

    /**
     * @param float $value
     *
     * @return BenefitType
     */
    public function setShowBalanceOnPaystub($value)
    {
        $this->propertyUpdated('ShowBalanceOnPaystub', $value);
        $this->_data['ShowBalanceOnPaystub'] = $value;

        return $this;
    }
}
