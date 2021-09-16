<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class Currency extends Remote\Model
{
    /**
     * This property has been removed from the Xero API.
     *
     * @property string ModifiedAfter
     *
     * @deprecated
     */

    /**
     * 3 letter alpha code for the currency – see list of currency codes.
     *
     * @property string Code
     */

    /**
     * Name of Currency.
     *
     * @property string Description
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Currencies';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Currency';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
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
            'ModifiedAfter' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Code' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getModifiedAfter()
    {
        return $this->_data['ModifiedAfter'];
    }

    /**
     * @param string $value
     *
     * @return Currency
     *
     * @deprecated
     */
    public function setModifiedAfter($value)
    {
        $this->propertyUpdated('ModifiedAfter', $value);
        $this->_data['ModifiedAfter'] = $value;

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
     * @return Currency
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
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return Currency
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }
}
