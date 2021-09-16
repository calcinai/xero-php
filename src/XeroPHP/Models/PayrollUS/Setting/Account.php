<?php

namespace XeroPHP\Models\PayrollUS\Setting;

use XeroPHP\Remote;

class Account extends Remote\Model
{
    /**
     * Xero account identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string AccountID
     */

    /**
     * See Account Types.
     *
     * @property string Type
     */

    /**
     * Customer defined account code eg. 200.
     *
     * @property string Code
     */

    /**
     * Name of account.
     *
     * @property string Name
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Accounts';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Account';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'AccountID';
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
            'AccountID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Code' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getAccountID()
    {
        return $this->_data['AccountID'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setAccountID($value)
    {
        $this->propertyUpdated('AccountID', $value);
        $this->_data['AccountID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setCode($value)
    {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return Account
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }
}
