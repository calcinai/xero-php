<?php

namespace XeroPHP\Models\PayrollAU\Employee\PayTemplate;

use XeroPHP\Remote;

class SuperLine extends Remote\Model
{
    /**
     * Xero superannuation fund membership identifier.
     *
     * @property string SuperMembershipID
     */

    /**
     * See Superannuation Contribution Type.
     *
     * @property string ContributionType
     */

    /**
     * See Superannuation Calculation Types.
     *
     * @property string CalculationType
     */

    /**
     *  Account code for the Expense Account. i.e 478.
     *
     * @property string ExpenseAccountCode
     */

    /**
     *  Account code for the Liability Account. i.e 826.
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Minimum monthly earnings. Applies for Percentage of Earnings calculation type only.
     *
     * @property string MinimumMonthlyEarnings
     */

    /**
     * The percentage of the SuperLine. Applies on Percentage of Earnings CalculationType.
     *
     * @property string Percentage
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'SuperLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'SuperLine';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'SuperMembershipID';
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
            'SuperMembershipID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ContributionType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ExpenseAccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LiabilityAccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'MinimumMonthlyEarnings' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Percentage' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getSuperMembershipID()
    {
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     *
     * @return SuperLine
     */
    public function setSuperMembershipID($value)
    {
        $this->propertyUpdated('SuperMembershipID', $value);
        $this->_data['SuperMembershipID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getContributionType()
    {
        return $this->_data['ContributionType'];
    }

    /**
     * @param string $value
     *
     * @return SuperLine
     */
    public function setContributionType($value)
    {
        $this->propertyUpdated('ContributionType', $value);
        $this->_data['ContributionType'] = $value;

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
     * @return SuperLine
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
    public function getExpenseAccountCode()
    {
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return SuperLine
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
     * @return SuperLine
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
    public function getMinimumMonthlyEarnings()
    {
        return $this->_data['MinimumMonthlyEarnings'];
    }

    /**
     * @param string $value
     *
     * @return SuperLine
     */
    public function setMinimumMonthlyEarning($value)
    {
        $this->propertyUpdated('MinimumMonthlyEarnings', $value);
        $this->_data['MinimumMonthlyEarnings'] = $value;

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
     * @return SuperLine
     */
    public function setPercentage($value)
    {
        $this->propertyUpdated('Percentage', $value);
        $this->_data['Percentage'] = $value;

        return $this;
    }
}
