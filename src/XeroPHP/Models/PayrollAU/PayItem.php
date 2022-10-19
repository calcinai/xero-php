<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\PayItem\LeaveType;
use XeroPHP\Models\PayrollAU\PayItem\EarningsRate;
use XeroPHP\Models\PayrollAU\PayItem\DeductionType;
use XeroPHP\Models\PayrollAU\PayItem\ReimbursementType;

class PayItem extends Remote\Model
{
    /**
     * See EarningsRates.
     *
     * @property EarningsRate[] EarningsRates
     */

    /**
     * See DeductionTypes.
     *
     * @property DeductionType[] DeductionTypes
     */

    /**
     * See LeaveTypes.
     *
     * @property LeaveType[] LeaveTypes
     */

    /**
     * See ReimbursementTypes.
     *
     * @property ReimbursementType[] ReimbursementTypes
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PayItems';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayItems';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET,
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
            'EarningsRates' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\PayItem\\EarningsRate', true, false],
            'DeductionTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\PayItem\\DeductionType', true, false],
            'LeaveTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\PayItem\\LeaveType', true, false],
            'ReimbursementTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\PayItem\\ReimbursementType', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return EarningsRate[]|Remote\Collection
     */
    public function getEarningsRates()
    {
        return $this->_data['EarningsRates'];
    }

    /**
     * @param EarningsRate $value
     *
     * @return PayItem
     */
    public function addEarningsRate(EarningsRate $value)
    {
        $this->propertyUpdated('EarningsRates', $value);
        if (! isset($this->_data['EarningsRates'])) {
            $this->_data['EarningsRates'] = new Remote\Collection();
        }
        $this->_data['EarningsRates'][] = $value;

        return $this;
    }

    /**
     * @return DeductionType[]|Remote\Collection
     */
    public function getDeductionTypes()
    {
        return $this->_data['DeductionTypes'];
    }

    /**
     * @param DeductionType $value
     *
     * @return PayItem
     */
    public function addDeductionType(DeductionType $value)
    {
        $this->propertyUpdated('DeductionTypes', $value);
        if (! isset($this->_data['DeductionTypes'])) {
            $this->_data['DeductionTypes'] = new Remote\Collection();
        }
        $this->_data['DeductionTypes'][] = $value;

        return $this;
    }

    /**
     * @return LeaveType[]|Remote\Collection
     */
    public function getLeaveTypes()
    {
        return $this->_data['LeaveTypes'];
    }

    /**
     * @param LeaveType $value
     *
     * @return PayItem
     */
    public function addLeaveType(LeaveType $value)
    {
        $this->propertyUpdated('LeaveTypes', $value);
        if (! isset($this->_data['LeaveTypes'])) {
            $this->_data['LeaveTypes'] = new Remote\Collection();
        }
        $this->_data['LeaveTypes'][] = $value;

        return $this;
    }

    /**
     * @return ReimbursementType[]|Remote\Collection
     */
    public function getReimbursementTypes()
    {
        return $this->_data['ReimbursementTypes'];
    }

    /**
     * @param ReimbursementType $value
     *
     * @return PayItem
     */
    public function addReimbursementType(ReimbursementType $value)
    {
        $this->propertyUpdated('ReimbursementTypes', $value);
        if (! isset($this->_data['ReimbursementTypes'])) {
            $this->_data['ReimbursementTypes'] = new Remote\Collection();
        }
        $this->_data['ReimbursementTypes'][] = $value;

        return $this;
    }
}
