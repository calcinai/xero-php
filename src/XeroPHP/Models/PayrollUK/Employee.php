<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;

class Employee extends Remote\Model
{
    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'EmployeeID';
    }

    /**
     * Get a list of the supported HTTP Methods
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
        ];
    }

    /**
     * return the URI of the resource (if any)
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Employees';
    }

    /**
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Employee';
    }

    /**
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * @return bool
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
            'FirstName'      => [ true, self::PROPERTY_TYPE_STRING, null, false, false ],
            'LastName'       => [ true, self::PROPERTY_TYPE_STRING, null, false, false ],
            'DateOfBirth'    => [ true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false ],
            'Email'          => [ true, self::PROPERTY_TYPE_STRING, null, false, false ],
            'PhoneNumber'    => [ true, self::PROPERTY_TYPE_STRING, null, false, false ],
            'UpdatedDateUTC' => [ true, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false ],
            'CreatedDateUTC' => [ true, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false ],
        ];
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data[ 'FirstName' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setFirstName(string $value)
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data[ 'FirstName' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data[ 'LastName' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setLastName(string $value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data[ 'LastName' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfBirth()
    {
        return $this->_data[ 'DateOfBirth' ];
    }

    /**
     * @param \DateTimeInterface $value
     * @return $this
     */
    public function setDateOfBirth(\DateTimeInterface $value)
    {
        $this->propertyUpdated('DateOfBirth', $value);
        $this->_data[ 'DateOfBirth' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data[ 'Email' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmail(string $value)
    {
        $this->propertyUpdated('Email', $value);
        $this->_data[ 'Email' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->_data[ 'PhoneNumber' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPhoneNumber(string $value)
    {
        $this->propertyUpdated('PhoneNumber', $value);
        $this->_data[ 'PhoneNumber' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data[ 'UpdatedDateUTC' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data[ 'CreatedDateUTC' ];
    }
}
