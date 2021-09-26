<?php

namespace XeroPHP\Models\Accounting\Organisation;

use XeroPHP\Remote;

class Bill extends Remote\Model
{
    /**
     * Day of Month (0-31).
     *
     * @property string Day
     */

    /**
     * One of the following values OFFOLLOWINGMONTH/DAYSAFTERBILLDATE/OFCURRENTMONTH.
     *
     * @property string Type
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Bills';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Bill';
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
            'Day' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getDay()
    {
        return $this->_data['Day'];
    }

    /**
     * @param string $value
     *
     * @return Bill
     */
    public function setDay($value)
    {
        $this->propertyUpdated('Day', $value);
        $this->_data['Day'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Bill
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }
}
