<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;

class MailingAddress extends Remote\Model
{
    /**
     * Street Address for employee home address.
     *
     * @property string StreetAddress
     */

    /**
     * Suite, Apartment or Unit information for employee home address.
     *
     * @property string SuiteOrAptOrUnit
     */

    /**
     * City for employee home address.
     *
     * @property string City
     */

    /**
     * State abbreviation for employee home address.
     *
     * @property string State
     */

    /**
     * Zip (Post code) for employee home address.
     *
     * @property string Zip
     */

    /**
     * The Latitude of employee home address.
     *
     * @property string Lattitude
     */

    /**
     * The Longitude of employee home address.
     *
     * @property string Longitude
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'MailingAddress';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'MailingAddress';
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
            'StreetAddress' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SuiteOrAptOrUnit' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'City' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'State' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Zip' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Lattitude' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Longitude' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getStreetAddress()
    {
        return $this->_data['StreetAddress'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setStreetAddress($value)
    {
        $this->propertyUpdated('StreetAddress', $value);
        $this->_data['StreetAddress'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSuiteOrAptOrUnit()
    {
        return $this->_data['SuiteOrAptOrUnit'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setSuiteOrAptOrUnit($value)
    {
        $this->propertyUpdated('SuiteOrAptOrUnit', $value);
        $this->_data['SuiteOrAptOrUnit'] = $value;

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
     * @return MailingAddress
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
    public function getState()
    {
        return $this->_data['State'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setState($value)
    {
        $this->propertyUpdated('State', $value);
        $this->_data['State'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->_data['Zip'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setZip($value)
    {
        $this->propertyUpdated('Zip', $value);
        $this->_data['Zip'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLattitude()
    {
        return $this->_data['Lattitude'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setLattitude($value)
    {
        $this->propertyUpdated('Lattitude', $value);
        $this->_data['Lattitude'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLongitude()
    {
        return $this->_data['Longitude'];
    }

    /**
     * @param string $value
     *
     * @return MailingAddress
     */
    public function setLongitude($value)
    {
        $this->propertyUpdated('Longitude', $value);
        $this->_data['Longitude'] = $value;

        return $this;
    }
}
