<?php

namespace XeroPHP\Models\Accounting\BankTransfer;

use XeroPHP\Remote;

class FromBankAccount extends Remote\Model
{
    /**
     * The Account Code of the Bank Account.
     *
     * @property string Code
     */

    /**
     * The ID of the Bank Account.
     *
     * @property string AccountID
     */

    /**
     * The Name Bank Account.
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
        return 'FromBankAccount';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'FromBankAccount';
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
            'Code' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
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
    public function getCode()
    {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     *
     * @return FromBankAccount
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
    public function getAccountID()
    {
        return $this->_data['AccountID'];
    }

    /**
     * @param string $value
     *
     * @return FromBankAccount
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
    public function getName()
    {
        return $this->_data['Name'];
    }
}
