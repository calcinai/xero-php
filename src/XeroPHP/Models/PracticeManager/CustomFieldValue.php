<?php

namespace XeroPHP\Models\PracticeManager;

use XeroPHP\Remote;

class CustomFieldValue extends Remote\Model
{
    /**
     * ID of Custom Field
     *
     * @property string ID
     */

    /**
     * Name of Custom Field
     *
     * @property string Name
     */

    /**
     * Date Value - Only present when the Custom Field is this Type
     *
     * @property string Date
     */

    /**
     * Number Value - Only present when the Custom Field is this Type Url
     *
     * @property string Number
     */

    /**
     * Decimal Value - Only present when the Custom Field is this Type
     *
     * @property string Decimal
     */

    /**
     * Boolean Value - Only present when the Custom Field is this Type
     *
     * @property bool Boolean
     */

    /**
     * Text Value - Only present when the Custom Field is this Type
     *
     * @property bool Text
     */

    /**
     * @var mixed
     */
    protected $identifier;

    /**
     * Can't be retrieved directly. First create an entity based on the custom fields you want to get. Then call ->getCustomFieldValues
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
        return 'CustomField';
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
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET,
        ];
    }

    public function setIdentifier($value)
    {
        $this->identifier = $value;
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
            'ID'      => [true, self::PROPERTY_TYPE_INT, null, false, false],
            'Name'    => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date'    => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Number'  => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'Decimal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Boolean' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Text'    => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param int $value
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
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return self
     */
    public function setDate($value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->_data['Number'];
    }

    /**
     * @param int $value
     *
     * @return self
     */
    public function setNumber($value)
    {
        $this->propertyUpdated('Number', $value);
        $this->_data['Number'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getDecimal()
    {
        return $this->_data['Decimal'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setDecimal($value)
    {
        $this->propertyUpdated('Decimal', $value);
        $this->_data['Decimal'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getBoolean()
    {
        return $this->_data['Boolean'];
    }

    /**
     * @param bool $value
     *
     * @return self
     */
    public function setBoolean($value)
    {
        $this->propertyUpdated('Boolean', $value);
        $this->_data['Boolean'] = $value;

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
     * @return self
     */
    public function setText($value)
    {
        $this->propertyUpdated('Text', $value);
        $this->_data['Text'] = $value;

        return $this;
    }
}
