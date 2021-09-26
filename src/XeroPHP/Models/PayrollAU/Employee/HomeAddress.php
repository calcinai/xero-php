<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;

class HomeAddress extends Remote\Model
{
    /**
     * Address line 1 for employee home address (max length = 50).
     *
     * @property string AddressLine1
     */

    /**
     * Address line 2 for employee home address (max length = 50).
     *
     * @property string AddressLine2
     */

    /**
     * Suburb for employee home address (max length = 50).
     *
     * @property string City
     */

    /**
     * State abbreviation for employee home address.
     *
     * @property string Region
     */

    /**
     * PostCode for employee home address (max length = 4).
     *
     * @property string PostalCode
     */

    /**
     * Country of HomeAddress.
     *
     * @property string Country
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'HomeAddress';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'HomeAddress';
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
        return Remote\URL::API_PAYROLL;
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
            'AddressLine1' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AddressLine2' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'City' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Region' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PostalCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Country' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return HomeAddress
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
     * @return HomeAddress
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
    public function getCity()
    {
        return $this->_data['City'];
    }

    /**
     * @param string $value
     *
     * @return HomeAddress
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
     * @return HomeAddress
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
     * @return HomeAddress
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
     * @return HomeAddress
     */
    public function setCountry($value)
    {
        $this->propertyUpdated('Country', $value);
        $this->_data['Country'] = $value;

        return $this;
    }
}
