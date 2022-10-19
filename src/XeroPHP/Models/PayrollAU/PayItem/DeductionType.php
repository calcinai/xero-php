<?php

namespace XeroPHP\Models\PayrollAU\PayItem;

use XeroPHP\Remote;

class DeductionType extends Remote\Model
{
    /**
     * Name of the deduction type (max length = 50).
     *
     * @property string Name
     */

    /**
     * See Accounts.
     *
     * @property string AccountCode
     */

    /**
     * Indicates that this is a pre-tax deduction that will reduce the amount of tax you withhold from an
     * employee.
     *
     * @property float ReducesTax
     */

    /**
     * Most deductions don’t reduce your superannuation guarantee contribution liability, so typically
     * you will not set any value for this.
     *
     * @property string ReducesSuper
     */

    /**
     * Xero identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'DeductionTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'DeductionType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'DeductionTypeID';
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
            'Name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReducesTax' => [true, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'ReducesSuper' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrentRecord' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode()
    {
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
     */
    public function setAccountCode($value)
    {
        $this->propertyUpdated('AccountCode', $value);
        $this->_data['AccountCode'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getReducesTax()
    {
        return $this->_data['ReducesTax'];
    }

    /**
     * @param float $value
     *
     * @return DeductionType
     */
    public function setReducesTax($value)
    {
        $this->propertyUpdated('ReducesTax', $value);
        $this->_data['ReducesTax'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReducesSuper()
    {
        return $this->_data['ReducesSuper'];
    }

    /**
     * @param string $value
     *
     * @return DeductionType
     */
    public function setReducesSuper($value)
    {
        $this->propertyUpdated('ReducesSuper', $value);
        $this->_data['ReducesSuper'] = $value;

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
     * @return DeductionType
     */
    public function setDeductionTypeID($value)
    {
        $this->propertyUpdated('DeductionTypeID', $value);
        $this->_data['DeductionTypeID'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCurrentRecord()
    {
        return $this->_data['CurrentRecord'];
    }

    /**
     * @param bool $value
     *
     * @return DeductionType
     */
    public function setCurrentRecord($value)
    {
        $this->propertyUpdated('CurrentRecord', $value);
        $this->_data['CurrentRecord'] = $value;

        return $this;
    }
}
