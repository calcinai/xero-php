<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\Paystub\BenefitLine;
use XeroPHP\Models\PayrollUS\Paystub\EarningsLine;
use XeroPHP\Models\PayrollUS\Paystub\DeductionLine;
use XeroPHP\Models\PayrollUS\Paystub\ReimbursementLine;

class OpeningBalance extends Remote\Model
{
    /**
     * The EarningsLines of the OpeningBalance.
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * The BenefitLines of the OpeningBalance.
     *
     * @property BenefitLine[] BenefitLines
     */

    /**
     * The DeductionLines of the OpeningBalance.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * The ReimbursementLines of the OpeningBalance.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * Xero earnings rate identifier.
     *
     * @property string EarningsTypeID
     */

    /**
     * Reimbursement type amount.
     *
     * @property float Amount
     */

    /**
     * Xero benefit type identifier.
     *
     * @property string BenefitTypeID
     */

    /**
     * Xero deduction type identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * Xero reimbursement type identifier.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property string EmployeeID
     *
     * @deprecated
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'OpeningBalances';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'OpeningBalance';
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
            'EarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\EarningsLine', true, false],
            'BenefitLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\BenefitLine', true, false],
            'DeductionLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\DeductionLine', true, false],
            'ReimbursementLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\Paystub\\ReimbursementLine', true, false],
            'EarningsTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'BenefitTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return EarningsLine[]|Remote\Collection
     */
    public function getEarningsLines()
    {
        return $this->_data['EarningsLines'];
    }

    /**
     * @param EarningsLine $value
     *
     * @return OpeningBalance
     */
    public function addEarningsLine(EarningsLine $value)
    {
        $this->propertyUpdated('EarningsLines', $value);
        if (! isset($this->_data['EarningsLines'])) {
            $this->_data['EarningsLines'] = new Remote\Collection();
        }
        $this->_data['EarningsLines'][] = $value;

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
     * @return OpeningBalance
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
     * @return DeductionLine[]|Remote\Collection
     */
    public function getDeductionLines()
    {
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine $value
     *
     * @return OpeningBalance
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
     * @return OpeningBalance
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
     * @return string
     */
    public function getEarningsTypeID()
    {
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
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
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return OpeningBalance
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
    public function getBenefitTypeID()
    {
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setBenefitTypeID($value)
    {
        $this->propertyUpdated('BenefitTypeID', $value);
        $this->_data['BenefitTypeID'] = $value;

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
     * @return OpeningBalance
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
    public function getReimbursementTypeID()
    {
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setReimbursementTypeID($value)
    {
        $this->propertyUpdated('ReimbursementTypeID', $value);
        $this->_data['ReimbursementTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getEmployeeID()
    {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     *
     * @deprecated
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }
}
