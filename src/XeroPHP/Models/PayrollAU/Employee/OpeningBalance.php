<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\Payslip\EarningsLine;
use XeroPHP\Models\PayrollAU\Payslip\DeductionLine;
use XeroPHP\Models\PayrollAU\Payslip\ReimbursementLine;

class OpeningBalance extends Remote\Model
{
    /**
     * Opening Balance Date. (YYYY-MM-DD).
     *
     * @property \DateTimeInterface OpeningBalanceDate
     */

    /**
     * Opening Balance tax.
     *
     * @property string Tax
     */

    /**
     * The EarningsLines of the OpeningBalance.
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * The DeductionLines of the OpeningBalance.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * The SuperLines of the OpeningBalance.
     *
     * @property string SuperLines
     */

    /**
     * The ReimbursementLines of the OpeningBalance.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * The LeaveLines of the OpeningBalance.
     *
     * @property string LeaveLines
     */

    /**
     * Xero earnings rate identifier.
     *
     * @property string EarningsRateID
     */

    /**
     * Reimbursement type amount.
     *
     * @property float Amount
     */

    /**
     * Xero deduction type identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * Xero super membership ID.
     *
     * @property string SuperMembershipID
     */

    /**
     * Calculation type for Super line.
     *
     * @property string CalculationType
     */

    /**
     * Xero reimbursement type identifier.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * Xero leave type identifier.
     *
     * @property string LeaveTypeID
     */

    /**
     * Leave number of units.
     *
     * @property string NumberOfUnits
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
            'OpeningBalanceDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Tax' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\EarningsLine', true, false],
            'DeductionLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\DeductionLine', true, false],
            'SuperLines' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReimbursementLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\ReimbursementLine', true, false],
            'LeaveLines' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsRateID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SuperMembershipID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LeaveTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getOpeningBalanceDate()
    {
        return $this->_data['OpeningBalanceDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return OpeningBalance
     */
    public function setOpeningBalanceDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('OpeningBalanceDate', $value);
        $this->_data['OpeningBalanceDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTax()
    {
        return $this->_data['Tax'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setTax($value)
    {
        $this->propertyUpdated('Tax', $value);
        $this->_data['Tax'] = $value;

        return $this;
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
     * @return string
     */
    public function getSuperLines()
    {
        return $this->_data['SuperLines'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setSuperLine($value)
    {
        $this->propertyUpdated('SuperLines', $value);
        $this->_data['SuperLines'] = $value;

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
    public function getLeaveLines()
    {
        return $this->_data['LeaveLines'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setLeaveLine($value)
    {
        $this->propertyUpdated('LeaveLines', $value);
        $this->_data['LeaveLines'] = $value;

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
     * @return OpeningBalance
     */
    public function setEarningsRateID($value)
    {
        $this->propertyUpdated('EarningsRateID', $value);
        $this->_data['EarningsRateID'] = $value;

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
    public function getSuperMembershipID()
    {
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
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
    public function getCalculationType()
    {
        return $this->_data['CalculationType'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
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
     */
    public function getLeaveTypeID()
    {
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
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
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return OpeningBalance
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        $this->_data['NumberOfUnits'] = $value;

        return $this;
    }
}
