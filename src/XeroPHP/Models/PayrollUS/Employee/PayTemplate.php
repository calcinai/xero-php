<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\Paystub\BenefitLine;
use XeroPHP\Models\PayrollUS\Paystub\DeductionLine;
use XeroPHP\Models\PayrollUS\Paystub\ReimbursementLine;

class PayTemplate extends Remote\Model
{
    /**
     * The earnings rate lines.
     *
     * @property float[] EarningsLines
     */

    /**
     * The deduction type lines.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * The reimbursement type lines.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * The benefit type lines.
     *
     * @property BenefitLine[] BenefitLines
     */

    /**
     * Xero earnings rate identifier.
     *
     * @property string EarningsTypeID
     */

    /**
     * The Units or Hours for the earnings line.
     *
     * @property string UnitsOrHours
     */

    /**
     * Rate per unit for the EarningsLine.
     *
     * @property float RatePerUnit
     */

    /**
     * The amount of the reimbursement type.
     *
     * @property float Amount
     */

    /**
     * Xero deduction type identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * See Benefit Line Calculation Type.
     *
     * @property string CalculationType
     */

    /**
     * Maximum amount an employee can receive.
     *
     * @property float EmployeeMax
     */

    /**
     * The percentage of deduction line.
     *
     * @property string Percentage
     */

    /**
     * Xero identifier for reimbursement type.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * The description of the reimbursement line.
     *
     * @property string Description
     */

    /**
     * Xero identifier for benefit type.
     *
     * @property string BenefitTypeID
     */
    const DEDUCTION_LINE_CALCULATION_TYPE_FIXEDAMOUNT = 'FIXEDAMOUNT';

    const DEDUCTION_LINE_CALCULATION_TYPE_STANDARDAMOUNT = 'STANDARDAMOUNT';

    const DEDUCTION_LINE_CALCULATION_TYPE_PERCENTAGEOFGROSS = 'PERCENTAGEOFGROSS';

    const BENEFIT_LINE_CALCULATION_TYPE_FIXEDAMOUNT = 'FIXEDAMOUNT';

    const BENEFIT_LINE_CALCULATION_TYPE_STANDARDAMOUNT = 'STANDARDAMOUNT';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PayTemplate';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayTemplate';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
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
            'EarningsLines' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'DeductionLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\DeductionLine', true, false],
            'ReimbursementLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\ReimbursementLine', true, false],
            'BenefitLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\BenefitLine', true, false],
            'EarningsTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UnitsOrHours' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'RatePerUnit' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'EmployeeMax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Percentage' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BenefitTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function getEarningsLines()
    {
        return $this->_data['EarningsLines'];
    }

    /**
     * @param float $value
     *
     * @return PayTemplate
     */
    public function addEarningsLine($value)
    {
        $this->propertyUpdated('EarningsLines', $value);
        if (! isset($this->_data['EarningsLines'])) {
            $this->_data['EarningsLines'] = new Remote\Collection();
        }
        $this->_data['EarningsLines'][] = $value;

        return $this;
    }

    /**
     * @return DeductionLine[]|Remote\Collection
     */
    public function getDeductionLines()
    {
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine $value
     *
     * @return PayTemplate
     */
    public function addDeductionLine(DeductionLine $value)
    {
        $this->propertyUpdated('DeductionLines', $value);
        if (! isset($this->_data['DeductionLines'])) {
            $this->_data['DeductionLines'] = new Remote\Collection();
        }
        $this->_data['DeductionLines'][] = $value;

        return $this;
    }

    /**
     * @return ReimbursementLine[]|Remote\Collection
     */
    public function getReimbursementLines()
    {
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param ReimbursementLine $value
     *
     * @return PayTemplate
     */
    public function addReimbursementLine(ReimbursementLine $value)
    {
        $this->propertyUpdated('ReimbursementLines', $value);
        if (! isset($this->_data['ReimbursementLines'])) {
            $this->_data['ReimbursementLines'] = new Remote\Collection();
        }
        $this->_data['ReimbursementLines'][] = $value;

        return $this;
    }

    /**
     * @return BenefitLine[]|Remote\Collection
     */
    public function getBenefitLines()
    {
        return $this->_data['BenefitLines'];
    }

    /**
     * @param BenefitLine $value
     *
     * @return PayTemplate
     */
    public function addBenefitLine(BenefitLine $value)
    {
        $this->propertyUpdated('BenefitLines', $value);
        if (! isset($this->_data['BenefitLines'])) {
            $this->_data['BenefitLines'] = new Remote\Collection();
        }
        $this->_data['BenefitLines'][] = $value;

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
     * @return PayTemplate
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
    public function getUnitsOrHours()
    {
        return $this->_data['UnitsOrHours'];
    }

    /**
     * @param string $value
     *
     * @return PayTemplate
     */
    public function setUnitsOrHour($value)
    {
        $this->propertyUpdated('UnitsOrHours', $value);
        $this->_data['UnitsOrHours'] = $value;

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
     * @return PayTemplate
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
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return PayTemplate
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

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
     * @return PayTemplate
     */
    public function setDeductionTypeID($value)
    {
        $this->propertyUpdated('DeductionTypeID', $value);
        $this->_data['DeductionTypeID'] = $value;

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
     * @return PayTemplate
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
    public function getEmployeeMax()
    {
        return $this->_data['EmployeeMax'];
    }

    /**
     * @param float $value
     *
     * @return PayTemplate
     */
    public function setEmployeeMax($value)
    {
        $this->propertyUpdated('EmployeeMax', $value);
        $this->_data['EmployeeMax'] = $value;

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
     * @return PayTemplate
     */
    public function setPercentage($value)
    {
        $this->propertyUpdated('Percentage', $value);
        $this->_data['Percentage'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementTypeID()
    {
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     *
     * @return PayTemplate
     */
    public function setReimbursementTypeID($value)
    {
        $this->propertyUpdated('ReimbursementTypeID', $value);
        $this->_data['ReimbursementTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return PayTemplate
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

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
     * @return PayTemplate
     */
    public function setBenefitTypeID($value)
    {
        $this->propertyUpdated('BenefitTypeID', $value);
        $this->_data['BenefitTypeID'] = $value;

        return $this;
    }
}
