<?php

namespace XeroPHP\Models\Accounting\BankTransaction;

use XeroPHP\Remote;

class BankAccount extends Remote\Model
{
    /**
     * BankAccount code (this value may not always be present for a bank account).
     *
     * @property string Code
     */

    /**
     * BankAccount identifier.
     *
     * @property string AccountID
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     */
    public static function getResourceURI(): string
    {
        return 'BankAccount';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     */
    public static function getRootNodeName(): string
    {
        return 'BankAccount';
    }

    /**
     * Get the guid property.
     */
    public static function getGUIDProperty(): string
    {
        return '';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     */
    public static function getAPIStem(): string
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods(): array
    {
        return [];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     */
    public static function getProperties(): array
    {
        return [
            'Code'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable(): bool
    {
        return false;
    }

    public function getCode(): string
    {
        return $this->_data['Code'];
    }

    public function setCode(string $value): static
    {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;

        return $this;
    }

    public function getAccountID(): string
    {
        return $this->_data['AccountID'];
    }

    public function setAccountID(string $value): static
    {
        $this->propertyUpdated('AccountID', $value);
        $this->_data['AccountID'] = $value;

        return $this;
    }
}
