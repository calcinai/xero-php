<?php

namespace XeroPHP\Models\PracticeManager\Invoice;

use XeroPHP\Remote;

class Task extends Remote\Model
{
    /**
     * @property int ID
     * @property string Name
     * @property string Description
     * @property float Minutes
     * @property float BillableRate
     * @property string Billable
     * @property float Amount
     * @property float AmountTax
     * @property float AmountIncludingTax
     */

    /**
     * Get the resource uri of the class (Tasks) etc.
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
        return 'Task';
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
            'ID'                 => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'Name'               => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Minutes'            => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'BillableRate'       => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Billable'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
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
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

        return $this;
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
     * @return self
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
     * @return float
     */
    public function getMinutes()
    {
        return $this->_data['Minutes'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setMinutes($value)
    {
        $this->propertyUpdated('Minutes', $value);
        $this->_data['Minutes'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getBillableRate()
    {
        return $this->_data['BillableRate'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setBillableRate($value)
    {
        $this->propertyUpdated('BillableRate', $value);
        $this->_data['BillableRate'] = $value;

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
