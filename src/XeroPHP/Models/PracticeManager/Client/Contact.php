<?php

namespace XeroPHP\Models\PracticeManager\Client;

use XeroPHP\Remote;
use XeroPHP\Traits\PracticeManager\CustomFieldValueTrait;

class Contact extends Remote\Model
{
    use CustomFieldValueTrait;
    /*
     * // To Save a new Contact you need to add a ClientID
     * <Contact>
          <Client>
            <ID>142</ID>
          </Client>
          <Name>Wyett E Coyote</Name>
          <IsPrimary>yes</IsPrimary> <!-- If multiple contacts defined, method will interpret last primary client as Primary -->
          <Salutation />
          <Addressee />
          <Mobile />
          <Email />
          <Phone />
          <Position />
        </Contact>
     *
     */
    /**
     * @property string ID
     * @property string IsPrimary
     * @property string Name
     * @property string Salutation
     * @property string Addressee
     * @property string Mobile
     * @property string Email
     * @property string Phone
     * @property string Position
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Contact';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Contact';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PRACTICE_MANAGER;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
        ];
    }

    public function getCustomFieldValueUri()
    {
        return 'client.api/contact/%s/customfield';
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
            'ID'         => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'IsPrimary'  => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Name'       => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Salutation' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Addressee'  => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Mobile'     => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Email'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Phone'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Position'   => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrimary()
    {
        return $this->_data['IsPrimary'] == 'yes';
    }

    /**
     * @param string|bool $value
     *
     * @return Contact
     */
    public function setIsPrimary($value)
    {
        // Convert value to ENUM Yes or No
        $value = $value === true || $value == 'yes' ? 'yes' : 'no';

        $this->propertyUpdated('IsPrimary', $value);
        $this->_data['IsPrimary'] = $value;

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
     * @return Contact
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSalutation()
    {
        return $this->_data['Salutation'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setSalutation($value)
    {
        $this->propertyUpdated('Salutation', $value);
        $this->_data['Salutation'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddressee()
    {
        return $this->_data['Addressee'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setAddressee($value)
    {
        $this->propertyUpdated('Addressee', $value);
        $this->_data['Addressee'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_data['Phone'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setPhone($value)
    {
        $this->propertyUpdated('Phone', $value);
        $this->_data['Phone'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->_data['Mobile'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setMobile($value)
    {
        $this->propertyUpdated('Mobile', $value);
        $this->_data['Mobile'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data['Email'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setEmail($value)
    {
        $this->propertyUpdated('Email', $value);
        $this->_data['Email'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return $this->_data['Position'];
    }

    /**
     * @param string $value
     *
     * @return Contact
     */
    public function setPosition($value)
    {
        $this->propertyUpdated('Position', $value);
        $this->_data['Position'] = $value;

        return $this;
    }
}
