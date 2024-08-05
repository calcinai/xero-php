<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;

/**
 * @property string $SuperFundID Xero identifier for super fund.
 * @property string $EmployeeNumber The memberhsip number assigned to the employee by the super fund.
 * @property string $SuperMembershipID Xero unique identifier for Super membership.
 * @property string $EmployeeID The Xero identifier for an employee e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9.
 */
class SuperMembership extends Remote\Model
{
    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'SuperMembership';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'SuperMembership';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'SuperMembershipID';
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
            'SuperFundID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SuperMembershipID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getSuperFundID()
    {
        return $this->_data['SuperFundID'];
    }

    /**
     * @param string $value
     *
     * @return SuperMembership
     */
    public function setSuperFundID($value)
    {
        $this->propertyUpdated('SuperFundID', $value);
        $this->_data['SuperFundID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeNumber()
    {
        return $this->_data['EmployeeNumber'];
    }

    /**
     * @param string $value
     *
     * @return SuperMembership
     */
    public function setEmployeeNumber($value)
    {
        $this->propertyUpdated('EmployeeNumber', $value);
        $this->_data['EmployeeNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSuperMembershipID()
    {
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     *
     * @return SuperMembership
     */
    public function setSuperMembershipID($value)
    {
        $this->propertyUpdated('SuperMembershipID', $value);
        $this->_data['SuperMembershipID'] = $value;

        return $this;
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
     * @return SuperMembership
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }
}
