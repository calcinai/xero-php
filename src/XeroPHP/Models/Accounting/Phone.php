<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class Phone extends Remote\Model
{
    /**
     * @property string PhoneType
     */

    /**
     *  max length = 50.
     *
     * @property string PhoneNumber
     */

    /**
     *  max length = 10.
     *
     * @property string PhoneAreaCode
     */

    /**
     *  max length = 20.
     *
     * @property string PhoneCountryCode
     */
    const PHONE_TYPE_DEFAULT = 'DEFAULT';

    const PHONE_TYPE_DDI = 'DDI';

    const PHONE_TYPE_MOBILE = 'MOBILE';

    const PHONE_TYPE_FAX = 'FAX';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Phones';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Phone';
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
            'PhoneType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PhoneNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PhoneAreaCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PhoneCountryCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getPhoneType()
    {
        return $this->_data['PhoneType'];
    }

    /**
     * @param string $value
     *
     * @return Phone
     */
    public function setPhoneType($value)
    {
        $this->propertyUpdated('PhoneType', $value);
        $this->_data['PhoneType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->_data['PhoneNumber'];
    }

    /**
     * @param string $value
     *
     * @return Phone
     */
    public function setPhoneNumber($value)
    {
        $this->propertyUpdated('PhoneNumber', $value);
        $this->_data['PhoneNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneAreaCode()
    {
        return $this->_data['PhoneAreaCode'];
    }

    /**
     * @param string $value
     *
     * @return Phone
     */
    public function setPhoneAreaCode($value)
    {
        $this->propertyUpdated('PhoneAreaCode', $value);
        $this->_data['PhoneAreaCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneCountryCode()
    {
        return $this->_data['PhoneCountryCode'];
    }

    /**
     * @param string $value
     *
     * @return Phone
     */
    public function setPhoneCountryCode($value)
    {
        $this->propertyUpdated('PhoneCountryCode', $value);
        $this->_data['PhoneCountryCode'] = $value;

        return $this;
    }
}
