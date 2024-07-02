<?php

namespace XeroPHP\Models\Accounting\Contact;

use XeroPHP\Remote;

class ContactPerson extends Remote\Model
{
    /**
     * First name of person.
     *
     * @property string FirstName
     */

    /**
     * Last name of person.
     *
     * @property string LastName
     */

    /**
     * Email address of person.
     *
     * @property string EmailAddress
     */

    /**
     * boolean to indicate whether contact should be included on emails with invoices etc.
     *
     * @property bool IncludeInEmails
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     */
    public static function getResourceURI(): string
    {
        return 'ContactPerson';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     */
    public static function getRootNodeName(): string
    {
        return 'ContactPerson';
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
            'FirstName'       => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmailAddress'    => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IncludeInEmails' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
        ];
    }

    public static function isPageable(): bool
    {
        return false;
    }

    public function getFirstName(): string
    {
        return $this->_data['FirstName'];
    }

    public function setFirstName(string $value): static
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;

        return $this;
    }

    public function getLastName(): string
    {
        return $this->_data['LastName'];
    }

    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress()
    {
        return $this->_data['EmailAddress'];
    }

    /**
     * @param  string  $value
     *
     * @return ContactPerson
     */
    public function setEmailAddress($value)
    {
        $this->propertyUpdated('EmailAddress', $value);
        $this->_data['EmailAddress'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIncludeInEmails()
    {
        return $this->_data['IncludeInEmails'];
    }

    /**
     * @param  bool  $value
     *
     * @return ContactPerson
     */
    public function setIncludeInEmail($value)
    {
        $this->propertyUpdated('IncludeInEmails', $value);
        $this->_data['IncludeInEmails'] = $value;

        return $this;
    }
}
