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
}
