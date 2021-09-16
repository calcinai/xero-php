<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;

class SalaryAndWage extends Remote\Model
{
    /**
     * This property has been removed from the Xero API.
     *
     * @property string SalaryAndWageID
     *
     * @deprecated
     */

    /**
     * Xero unique identifier for SalaryAndWage item. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string SalaryAndWagesID
     */

    /**
     * Xero unique identifier for EarningsType item. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string EarningsTypeID
     */

    /**
     * See Salary and Wages Types.
     *
     * @property string SalaryWagesType
     */

    /**
     * The Hourly rate of the Salary and Wages Type. Applies only when SalaryWagesType is HOURLY.
     *
     * @property float HourlyRate
     */

    /**
     * The annual salary for the Salary and wages. Applies only when SalaryWagesType is SALARY.
     *
     * @property string AnnualSalary
     */

    /**
     * Number of hours per week.
     *
     * @property string StandardHoursPerWeek
     */

    /**
     * The effective date of the Salary and Wages.
     *
     * @property \DateTimeInterface EffectiveDate
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'SalaryAndWages';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'SalaryAndWage';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'SalaryAndWageID';
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
            'SalaryAndWageID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SalaryAndWagesID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SalaryWagesType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'HourlyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AnnualSalary' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'StandardHoursPerWeek' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EffectiveDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getSalaryAndWageID()
    {
        return $this->_data['SalaryAndWageID'];
    }

    /**
     * @param string $value
     *
     * @return SalaryAndWage
     *
     * @deprecated
     */
    public function setSalaryAndWageID($value)
    {
        $this->propertyUpdated('SalaryAndWageID', $value);
        $this->_data['SalaryAndWageID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalaryAndWagesID()
    {
        return $this->_data['SalaryAndWagesID'];
    }

    /**
     * @param string $value
     *
     * @return SalaryAndWage
     */
    public function setSalaryAndWagesID($value)
    {
        $this->propertyUpdated('SalaryAndWagesID', $value);
        $this->_data['SalaryAndWagesID'] = $value;

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
     * @return SalaryAndWage
     */
    public function setEarningsTypeID($value)
    {
        $this->propertyUpdated('EarningsTypeID', $value);
        $this->_data['EarningsTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalaryWagesType()
    {
        return $this->_data['SalaryWagesType'];
    }

    /**
     * @param string $value
     *
     * @return SalaryAndWage
     */
    public function setSalaryWagesType($value)
    {
        $this->propertyUpdated('SalaryWagesType', $value);
        $this->_data['SalaryWagesType'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getHourlyRate()
    {
        return $this->_data['HourlyRate'];
    }

    /**
     * @param float $value
     *
     * @return SalaryAndWage
     */
    public function setHourlyRate($value)
    {
        $this->propertyUpdated('HourlyRate', $value);
        $this->_data['HourlyRate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAnnualSalary()
    {
        return $this->_data['AnnualSalary'];
    }

    /**
     * @param string $value
     *
     * @return SalaryAndWage
     */
    public function setAnnualSalary($value)
    {
        $this->propertyUpdated('AnnualSalary', $value);
        $this->_data['AnnualSalary'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStandardHoursPerWeek()
    {
        return $this->_data['StandardHoursPerWeek'];
    }

    /**
     * @param string $value
     *
     * @return SalaryAndWage
     */
    public function setStandardHoursPerWeek($value)
    {
        $this->propertyUpdated('StandardHoursPerWeek', $value);
        $this->_data['StandardHoursPerWeek'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEffectiveDate()
    {
        return $this->_data['EffectiveDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return SalaryAndWage
     */
    public function setEffectiveDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('EffectiveDate', $value);
        $this->_data['EffectiveDate'] = $value;

        return $this;
    }
}
