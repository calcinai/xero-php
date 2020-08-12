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

    // TODO: Run Method builder
    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     *
     * @return Task
     */
    public function setTitle($value)
    {
        $this->propertyUpdated('Title', $value);
        $this->_data['Title'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->_data['Text'];
    }

    /**
     * @param string $value
     *
     * @return Task
     */
    public function setText($value)
    {
        $this->propertyUpdated('Text', $value);
        $this->_data['Text'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFolder()
    {
        return $this->_data['Folder'];
    }

    /**
     * @param string $value
     *
     * @return Task
     */
    public function setFolder($value)
    {
        $this->propertyUpdated('Folder', $value);
        $this->_data['Folder'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Task
     */
    public function setDate($value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->_data['CreatedBy'];
    }

    /**
     * @param string $value
     *
     * @return Task
     */
    public function setCreatedBy($value)
    {
        $this->propertyUpdated('CreatedBy', $value);
        $this->_data['CreatedBy'] = $value;

        return $this;
    }
}
