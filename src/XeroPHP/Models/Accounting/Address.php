<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class Address extends Remote\Model
{
    /**
     * @property string AddressType
     */

    /**
     *  max length = 500.
     *
     * @property string AddressLine1
     */

    /**
     *  max length = 500.
     *
     * @property string AddressLine2
     */

    /**
     *  max length = 500.
     *
     * @property string AddressLine3
     */

    /**
     *  max length = 500.
     *
     * @property string AddressLine4
     */

    /**
     *  max length = 255.
     *
     * @property string City
     */

    /**
     *  max length = 255.
     *
     * @property string Region
     */

    /**
     *  max length = 50.
     *
     * @property string PostalCode
     */

    /**
     *  max length = 50, [A-Z], [a-z] only.
     *
     * @property string Country
     */

    /**
     *  max length = 255.
     *
     * @property string AttentionTo
     */
    const ADDRESS_TYPE_POBOX = 'POBOX';

    const ADDRESS_TYPE_STREET = 'STREET';

    const ADDRESS_TYPE_DELIVERY = 'DELIVERY';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Addresses';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Address';
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
            'AddressType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'AddressLine1' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AddressLine2' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AddressLine3' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AddressLine4' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'City' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Region' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PostalCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Country' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AttentionTo' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getAddressType()
    {
        return $this->_data['AddressType'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAddressType($value)
    {
        $this->propertyUpdated('AddressType', $value);
        $this->_data['AddressType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->_data['AddressLine1'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAddressLine1($value)
    {
        $this->propertyUpdated('AddressLine1', $value);
        $this->_data['AddressLine1'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->_data['AddressLine2'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAddressLine2($value)
    {
        $this->propertyUpdated('AddressLine2', $value);
        $this->_data['AddressLine2'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine3()
    {
        return $this->_data['AddressLine3'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAddressLine3($value)
    {
        $this->propertyUpdated('AddressLine3', $value);
        $this->_data['AddressLine3'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine4()
    {
        return $this->_data['AddressLine4'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAddressLine4($value)
    {
        $this->propertyUpdated('AddressLine4', $value);
        $this->_data['AddressLine4'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_data['City'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setCity($value)
    {
        $this->propertyUpdated('City', $value);
        $this->_data['City'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegion()
    {
        return $this->_data['Region'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setRegion($value)
    {
        $this->propertyUpdated('Region', $value);
        $this->_data['Region'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->_data['PostalCode'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setPostalCode($value)
    {
        $this->propertyUpdated('PostalCode', $value);
        $this->_data['PostalCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->_data['Country'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setCountry($value)
    {
        $this->propertyUpdated('Country', $value);
        $this->_data['Country'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttentionTo()
    {
        return $this->_data['AttentionTo'];
    }

    /**
     * @param string $value
     *
     * @return Address
     */
    public function setAttentionTo($value)
    {
        $this->propertyUpdated('AttentionTo', $value);
        $this->_data['AttentionTo'] = $value;

        return $this;
    }
}
