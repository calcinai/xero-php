<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class User extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string UserID
     */

    /**
     * Email address of user.
     *
     * @property string EmailAddress
     */

    /**
     * First name of user.
     *
     * @property string FirstName
     */

    /**
     * Last name of user.
     *
     * @property string LastName
     */

    /**
     * Timestamp of last change to user.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * Boolean to indicate if user is the subscriber.
     *
     * @property bool IsSubscriber
     */

    /**
     * User role (see Types).
     *
     * @property string OrganisationRole
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Users';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'User';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'UserID';
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
            'UserID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmailAddress' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FirstName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'IsSubscriber' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'OrganisationRole' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getUserID()
    {
        return $this->_data['UserID'];
    }

    /**
     * @param string $value
     *
     * @return User
     */
    public function setUserID($value)
    {
        $this->propertyUpdated('UserID', $value);
        $this->_data['UserID'] = $value;

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
     * @param string $value
     *
     * @return User
     */
    public function setEmailAddress($value)
    {
        $this->propertyUpdated('EmailAddress', $value);
        $this->_data['EmailAddress'] = $value;

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
     * @return User
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
     * @return User
     */
    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return User
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsSubscriber()
    {
        return $this->_data['IsSubscriber'];
    }

    /**
     * @param bool $value
     *
     * @return User
     */
    public function setIsSubscriber($value)
    {
        $this->propertyUpdated('IsSubscriber', $value);
        $this->_data['IsSubscriber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationRole()
    {
        return $this->_data['OrganisationRole'];
    }

    /**
     * @param string $value
     *
     * @return User
     */
    public function setOrganisationRole($value)
    {
        $this->propertyUpdated('OrganisationRole', $value);
        $this->_data['OrganisationRole'] = $value;

        return $this;
    }
}
