<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Organisation\ExternalLink;

class Employee extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string EmployeeID
     */

    /**
     * Current status of an employee – see contact status types.
     *
     * @property string Status
     */

    /**
     * First name of an employee (max length = 255).
     *
     * @property string FirstName
     */

    /**
     * Last name of an employee (max length = 255).
     *
     * @property string LastName
     */

    /**
     * Link to an external resource, for example, an employee record in an external system. You can specify
     * the URL element.
     * The description of the link is auto-generated in the form “Go to <App name>”.
     * <App name> refers to the Xero application name that is making the API call.
     *
     * @property ExternalLink ExternalLink
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Employees';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Employee';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'EmployeeID';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET,
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
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FirstName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExternalLink' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Organisation\\ExternalLink', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setFirstName($value)
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return ExternalLink
     */
    public function getExternalLink()
    {
        return $this->_data['ExternalLink'];
    }

    /**
     * @param ExternalLink $value
     *
     * @return Employee
     */
    public function setExternalLink(ExternalLink $value)
    {
        $this->propertyUpdated('ExternalLink', $value);
        $this->_data['ExternalLink'] = $value;

        return $this;
    }
}
