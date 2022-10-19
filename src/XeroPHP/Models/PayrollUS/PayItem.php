<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUS\PayItem\BenefitType;
use XeroPHP\Models\PayrollUS\PayItem\TimeOffType;
use XeroPHP\Models\PayrollUS\PayItem\EarningsType;
use XeroPHP\Models\PayrollUS\PayItem\DeductionType;
use XeroPHP\Models\PayrollUS\PayItem\ReimbursementType;

class PayItem extends Remote\Model
{
    /**
     * See EarningsTypes.
     *
     * @property EarningsType[] EarningsTypes
     */

    /**
     * See BenefitTypes.
     *
     * @property BenefitType[] BenefitTypes
     */

    /**
     * See DeductionTypes.
     *
     * @property DeductionType[] DeductionTypes
     */

    /**
     * See ReimbursementTypes.
     *
     * @property ReimbursementType[] ReimbursementTypes
     */

    /**
     * See TimeOffTypes.
     *
     * @property TimeOffType[] TimeOffTypes
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
        return 'PayItem';
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
            'EarningsTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\EarningsType', true, false],
            'BenefitTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\BenefitType', true, false],
            'DeductionTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\DeductionType', true, false],
            'ReimbursementTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\ReimbursementType', true, false],
            'TimeOffTypes' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\TimeOffType', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return EarningsType[]|Remote\Collection
     */
    public function getEarningsTypes()
    {
        return $this->_data['EarningsTypes'];
    }

    /**
     * @param EarningsType $value
     *
     * @return PayItem
     */
    public function addEarningsType(EarningsType $value)
    {
        $this->propertyUpdated('EarningsTypes', $value);
        if (! isset($this->_data['EarningsTypes'])) {
            $this->_data['EarningsTypes'] = new Remote\Collection();
        }
        $this->_data['EarningsTypes'][] = $value;

        return $this;
    }

    /**
     * @return BenefitType[]|Remote\Collection
     */
    public function getBenefitTypes()
    {
        return $this->_data['BenefitTypes'];
    }

    /**
     * @param BenefitType $value
     *
     * @return PayItem
     */
    public function addBenefitType(BenefitType $value)
    {
        $this->propertyUpdated('BenefitTypes', $value);
        if (! isset($this->_data['BenefitTypes'])) {
            $this->_data['BenefitTypes'] = new Remote\Collection();
        }
        $this->_data['BenefitTypes'][] = $value;

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

    /**
     * @return Remote\Collection|TimeOffType[]
     */
    public function getTimeOffTypes()
    {
        return $this->_data['TimeOffTypes'];
    }

    /**
     * @param TimeOffType $value
     *
     * @return PayItem
     */
    public function addTimeOffType(TimeOffType $value)
    {
        $this->propertyUpdated('TimeOffTypes', $value);
        if (! isset($this->_data['TimeOffTypes'])) {
            $this->_data['TimeOffTypes'] = new Remote\Collection();
        }
        $this->_data['TimeOffTypes'][] = $value;

        return $this;
    }
}
