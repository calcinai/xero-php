<?php
namespace XeroPHP\Models\PayrollUK\Employee;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Address extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'AddressID';
    }

    /**
     * Get a list of the supported HTTP Methods
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [];
    }

    /**
     * return the URI of the resource (if any)
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'address';
    }

    /**
     * Get the root node element
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'address';
    }

    /**
     * Get the API stem
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * Is pageable
     *
     * @return boolean
     */
    public static function isPageable()
    {
        return true;
    }

    /**
     * Get a list of properties
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'addressLine1' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'city'         => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'postCode'     => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'addressLine2' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'county'       => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    /**
     * @return string
     */
    public function getAddressLine1()
    {
        return $this->_data[ 'addressLine1' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setAddressLine1(string $value)
    {
        $this->propertyUpdated('addressLine1', $value);
        $this->_data[ 'addressLine1' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->_data[ 'city' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCity(string $value)
    {
        $this->propertyUpdated('city', $value);
        $this->_data[ 'city' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->_data[ 'postCode' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPostCode(string $value)
    {
        $this->propertyUpdated('postCode', $value);
        $this->_data[ 'postCode' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressLine2()
    {
        return $this->_data[ 'addressLine2' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setAddressLine2(string $value)
    {
        $this->propertyUpdated('addressLine2', $value);
        $this->_data[ 'addressLine2' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->_data[ 'county' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCounty(string $value)
    {
        $this->propertyUpdated('county', $value);
        $this->_data[ 'county' ] = $value;

        return $this;
    }
}
