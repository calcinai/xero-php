<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate\LeaveLine;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate\SuperLine;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate\EarningsLine;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate\DeductionLine;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate\ReimbursementLine;

class PayTemplate extends Remote\Model
{
    /**
     * The earnings rate lines.
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * The deduction type lines.
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * The superannuation fund lines.
     *
     * @property SuperLine[] SuperLines
     */

    /**
     * The reimbursement type lines.
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * The leave type lines.
     *
     * @property LeaveLine[] LeaveLines
     */

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
            'EarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate\\EarningsLine', true, false],
            'DeductionLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate\\DeductionLine', true, false],
            'SuperLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate\\SuperLine', true, false],
            'ReimbursementLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate\\ReimbursementLine', true, false],
            'LeaveLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate\\LeaveLine', true, false],
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
     * @return PayTemplate
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
     * @return Remote\Collection|SuperLine[]
     */
    public function getSuperLines()
    {
        return $this->_data['SuperLines'];
    }

    /**
     * @param SuperLine $value
     *
     * @return PayTemplate
     */
    public function addSuperLine(SuperLine $value)
    {
        $this->propertyUpdated('SuperLines', $value);
        if (! isset($this->_data['SuperLines'])) {
            $this->_data['SuperLines'] = new Remote\Collection();
        }
        $this->_data['SuperLines'][] = $value;

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
     * @return LeaveLine[]|Remote\Collection
     */
    public function getLeaveLines()
    {
        return $this->_data['LeaveLines'];
    }

    /**
     * @param LeaveLine $value
     *
     * @return PayTemplate
     */
    public function addLeaveLine(LeaveLine $value)
    {
        $this->propertyUpdated('LeaveLines', $value);
        if (! isset($this->_data['LeaveLines'])) {
            $this->_data['LeaveLines'] = new Remote\Collection();
        }
        $this->_data['LeaveLines'][] = $value;

        return $this;
    }
}
