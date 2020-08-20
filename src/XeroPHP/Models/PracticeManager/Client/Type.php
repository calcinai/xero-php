<?php

namespace XeroPHP\Models\PracticeManager\Client;

use XeroPHP\Remote;

class Type extends Remote\Model
{
    /**
     * @property string Name
     * @property string CostMarkup
     * EG DayOfMonth or WithinDays
     * @property string PaymentTerm
     * @property string PaymentDay
     */

    /**
     * Get the resource uri of the class (Types) etc.
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
        return 'Type';
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
            'Name'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CostMarkup'  => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'PaymentTerm' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PaymentDay'  => [false, self::PROPERTY_TYPE_INT, null, false, false],
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
     * @return Type
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

        return $this;
    }
}
