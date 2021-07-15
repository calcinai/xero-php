<?php

namespace XeroPHP\Models\PracticeManager\Invoice;

use XeroPHP\Remote;

class Cost extends Remote\Model
{
    /**
     * @property string Description
     * @property string Note
     * @property string Code
     * @property string Billable
     * @property float Quantity
     * @property float UnitCost
     * @property float UnitPrice
     * @property float Amount
     * @property float AmountTax
     * @property float AmountIncludingTax
     */

    /**
     * Get the resource uri of the class (Costs) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return '';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Cost';
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
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PRACTICE_MANAGER;
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
            'Description'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Note'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Code'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Billable'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Quantity'           => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UnitCost'           => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UnitPrice'          => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Amount'             => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountTax'          => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountIncludingTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return self
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
    public function getNote()
    {
        return $this->_data['Note'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setNote($value)
    {
        $this->propertyUpdated('Note', $value);
        $this->_data['Note'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setCode($value)
    {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBillable()
    {
        return $this->_data['Billable'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setBillable($value)
    {
        $this->propertyUpdated('Billable', $value);
        $this->_data['Billable'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getQuantity()
    {
        return $this->_data['Quantity'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setQuantity($value)
    {
        $this->propertyUpdated('Quantity', $value);
        $this->_data['Quantity'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitCost()
    {
        return $this->_data['UnitCost'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setUnitCost($value)
    {
        $this->propertyUpdated('UnitCost', $value);
        $this->_data['UnitCost'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->_data['UnitPrice'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setUnitPrice($value)
    {
        $this->propertyUpdated('UnitPrice', $value);
        $this->_data['UnitPrice'] = $value;

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
     * @return self
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountTax()
    {
        return $this->_data['AmountTax'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountTax($value)
    {
        $this->propertyUpdated('AmountTax', $value);
        $this->_data['AmountTax'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountIncludingTax()
    {
        return $this->_data['AmountIncludingTax'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountIncludingTax($value)
    {
        $this->propertyUpdated('AmountIncludingTax', $value);
        $this->_data['AmountIncludingTax'] = $value;

        return $this;
    }
}
