<?php

namespace XeroPHP\Models\Accounting\TaxRate;

use XeroPHP\Remote;

class TaxComponent extends Remote\Model
{
    /**
     * Name of Tax Component.
     *
     * @property string Name
     */

    /**
     * Tax Rate (up to 4dp).
     *
     * @property float Rate
     */

    /**
     * Boolean to describe if Tax rate is compounded.Learn more.
     *
     * @property bool IsCompound
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TaxComponents';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TaxComponent';
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
        return Remote\URL::API_CORE;
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
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Rate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'IsCompound' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
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
     * @return TaxComponent
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->_data['Rate'];
    }

    /**
     * @param float $value
     *
     * @return TaxComponent
     */
    public function setRate($value)
    {
        $this->propertyUpdated('Rate', $value);
        $this->_data['Rate'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsCompound()
    {
        return $this->_data['IsCompound'];
    }

    /**
     * @param bool $value
     *
     * @return TaxComponent
     */
    public function setIsCompound($value)
    {
        $this->propertyUpdated('IsCompound', $value);
        $this->_data['IsCompound'] = $value;

        return $this;
    }
}
