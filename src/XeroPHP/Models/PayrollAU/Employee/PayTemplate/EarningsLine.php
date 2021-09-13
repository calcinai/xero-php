<?php

namespace XeroPHP\Models\PayrollAU\Employee\PayTemplate;

use XeroPHP\Remote;

class EarningsLine extends Remote\Model
{
    /**
     * Xero earnings rate identifier.
     *
     * @property string EarningsRateID
     */

    /**
     * See Earnings Rate Calculation Type.
     *
     * @property string CalculationType
     */

    /**
     * Hours per week for the EarningsLine. Applicable for ANNUALSALARY CalculationType.
     *
     * @property string NumberOfUnitsPerWeek
     */

    /**
     * Annual Salary of employee.
     *
     * @property string AnnualSalary
     */

    /**
     * Rate per unit of the EarningsLine.
     *
     * @property float RatePerUnit
     */

    /**
     * Normal number of units for EarningsLine.  Applicable when RateType is “MULTIPLE”.
     *
     * @property string NormalNumberOfUnits
     */
    const EARNINGSRATECALCULATIONTYPE_USEEARNINGSRATE = 'USEEARNINGSRATE';

    const EARNINGSRATECALCULATIONTYPE_ENTEREARNINGSRATE = 'ENTEREARNINGSRATE';

    const EARNINGSRATECALCULATIONTYPE_ANNUALSALARY = 'ANNUALSALARY';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'EarningsLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'EarningsLine';
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
            'EarningsRateID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'NumberOfUnitsPerWeek' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AnnualSalary' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'RatePerUnit' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'NormalNumberOfUnits' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return EarningsLine
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
    public function getCalculationType()
    {
        return $this->_data['CalculationType'];
    }

    /**
     * @param string $value
     *
     * @return EarningsLine
     */
    public function setCalculationType($value)
    {
        $this->propertyUpdated('CalculationType', $value);
        $this->_data['CalculationType'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getNumberOfUnitsPerWeek()
    {
        return $this->_data['NumberOfUnitsPerWeek'];
    }

    /**
     * @param float $value
     *
     * @return EarningsLine
     */
    public function setNumberOfUnitsPerWeek($value)
    {
        $this->propertyUpdated('NumberOfUnitsPerWeek', $value);
        $this->_data['NumberOfUnitsPerWeek'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAnnualSalary()
    {
        return $this->_data['AnnualSalary'];
    }

    /**
     * @param float $value
     *
     * @return EarningsLine
     */
    public function setAnnualSalary($value)
    {
        $this->propertyUpdated('AnnualSalary', $value);
        $this->_data['AnnualSalary'] = $value;

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
     * @return EarningsLine
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
    public function getNormalNumberOfUnits()
    {
        return $this->_data['NormalNumberOfUnits'];
    }

    /**
     * @param float $value
     *
     * @return EarningsLine
     */
    public function setNormalNumberOfUnit($value)
    {
        $this->propertyUpdated('NormalNumberOfUnits', $value);
        $this->_data['NormalNumberOfUnits'] = $value;

        return $this;
    }
}
