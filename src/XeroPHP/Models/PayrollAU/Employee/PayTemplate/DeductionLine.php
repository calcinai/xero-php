<?php

namespace XeroPHP\Models\PayrollAU\Employee\PayTemplate;

use XeroPHP\Remote;

class DeductionLine extends Remote\Model
{
    /**
     * Xero deduction type identifier.
     *
     * @property string DeductionTypeID
     */

    /**
     * See Deduction Type Calculation Type.
     *
     * @property string CalculationType
     */
    const DEDUCTION_TYPE_FIXEDAMOUNT = "FIXEDAMOUNT";

    const DEDUCTION_TYPE_PRETAX = "PRETAX";

    const DEDUCTION_TYPE_POSTTAX = "POSTTAX";

    /**
     * The percentage of deduction line.
     *
     * @property string Percentage
     */

    /**
     * The deduction amount.
     *
     * @property float Amount
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'DeductionLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'DeductionLine';
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
            'DeductionTypeID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'CalculationType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Percentage' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return DeductionLine
     */
    public function setDeductionTypeID($value)
    {
        $this->propertyUpdated('DeductionTypeID', $value);
        $this->_data['DeductionTypeID'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getCalculationType()
    {
        return $this->_data['CalculationType'];
    }

    /**
     * @param float $value
     *
     * @return DeductionLine
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
    public function getPercentage()
    {
        return $this->_data['Percentage'];
    }

    /**
     * @param string $value
     *
     * @return DeductionLine
     */
    public function setPercentage($value)
    {
        $this->propertyUpdated('Percentage', $value);
        $this->_data['Percentage'] = $value;

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
     * @return DeductionLine
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }
}
