<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Models\PayrollUK\Employee\Address;
use XeroPHP\Models\PayrollUK\Employee\Employment;
use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Employee extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'employeeID';
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
     * Check for create method override
     *
     * @return null|string
     */
    public static function getCreateMethod()
    {
        return Remote\Request::METHOD_POST;
    }

    /**
     * return the URI of the resource (if any)
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'employees';
    }

    /**
     * @return string
     */
    public static function getRootNodeName()
    {
        return '';
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
            'employeeID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],

            // Required when creating, not brought back in root GET
            'title'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'gender'     => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'address'    => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUK\\Employee\\Address', false, false],

            'firstName'         => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'lastName'          => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'dateOfBirth'       => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'email'             => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'phoneNumber'       => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'updatedDateUTC'    => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'createdDateUTC'    => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'employment'        => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollUK\\Employee\\Employment', false, true],
            'payrollCalendarID' => [false, self::PROPERTY_TYPE_GUID, null, false, false]
        ];
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_data[ 'title' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTitle(string $value)
    {
        $this->propertyUpdated('title', $value);
        $this->_data[ 'title' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data[ 'firstName' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setFirstName(string $value)
    {
        $this->propertyUpdated('firstName', $value);
        $this->_data[ 'firstName' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data[ 'lastName' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setLastName(string $value)
    {
        $this->propertyUpdated('lastName', $value);
        $this->_data[ 'lastName' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfBirth()
    {
        return $this->_data[ 'dateOfBirth' ];
    }

    /**
     * @param \DateTimeInterface $value
     * @return $this
     */
    public function setDateOfBirth(\DateTimeInterface $value)
    {
        $this->propertyUpdated('dateOfBirth', $value);
        $this->_data[ 'dateOfBirth' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->_data[ 'gender' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setGender(string $value)
    {
        $this->propertyUpdated('gender', $value);
        $this->_data[ 'gender' ] = $value;

        return $this;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->_data[ 'address' ];
    }

    /**
     * @param Address $value
     * @return $this
     */
    public function setAddress(Address $value)
    {
        $this->propertyUpdated('address', $value);
        $this->_data[ 'address' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data[ 'email' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmail(string $value)
    {
        $this->propertyUpdated('email', $value);
        $this->_data[ 'email' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->_data[ 'phoneNumber' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setPhoneNumber(string $value)
    {
        $this->propertyUpdated('phoneNumber', $value);
        $this->_data[ 'phoneNumber' ] = $value;

        return $this;
    }

    /**
     * @return Employment
     */
    public function getEmployment()
    {
        return $this->_data[ 'employment' ];
    }

    /**
     * @param Employment $value
     * @return Employment
     */
    public function setEmployment(Employment $value)
    {
        $this->propertyUpdated('employment', $value);
        $this->_data[ 'employment' ] = $value;

        return $value;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getEmployeeID();
    }

    /**
     * @return string
     */
    public function getGUID()
    {
        return $this->getEmployeeID();
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data[ 'employeeID' ];
    }

    /**
     * @return Employee
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('employeeID', $value);
        $this->_data[ 'employeeID' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data['payrollCalendarID'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data[ 'updatedDateUTC' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data[ 'createdDateUTC' ];
    }
}
