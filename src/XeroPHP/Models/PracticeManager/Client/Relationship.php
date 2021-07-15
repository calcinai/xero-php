<?php

namespace XeroPHP\Models\PracticeManager\Client;

use XeroPHP\Remote;

class Relationship extends Remote\Model
{
    /**
     * @property string Type
     * @property RelatedClient RelatedClient
     * Only set for Shareholder and Owner relationships
     * @property string NumberOfShares
     * Only set for Shareholder and Owner relationships
     * @property string Percentage
     *
     * @property string StartDate
     * @property string EndDate
     */

    /**
     * Get the resource uri of the class (Relationships) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return '';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Relationship';
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

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Relationship
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'ID'             => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'Type'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'RelatedClient'  => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Client\\RelatedClient', false, false],
            'NumberOfShares' => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'Percentage'     => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'StartDate'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EndDate'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
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
     * @return Relationship
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

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
     * @return Relationship
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
    public function getRelatedClient()
    {
        return $this->_data['RelatedClient'];
    }

    /**
     * @param string $value
     *
     * @return Relationship
     */
    public function setRelatedClient($value)
    {
        $this->propertyUpdated('RelatedClient', $value);
        $this->_data['RelatedClient'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfShares()
    {
        return $this->_data['NumberOfShares'];
    }

    /**
     * @param string $value
     *
     * @return Relationship
     */
    public function setNumberOfShares($value)
    {
        $this->propertyUpdated('NumberOfShares', $value);
        $this->_data['NumberOfShares'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPercentage()
    {
        return $this->_data['Percentage'];
    }

    /**
     * @param string $value
     *
     * @return Relationship
     */
    public function setPercentage($value)
    {
        $this->propertyUpdated('Percentage', $value);
        $this->_data['Percentage'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->_data['StartDate'];
    }

    /**
     * @param string $value
     *
     * @return Relationship
     */
    public function setStartDate($value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->_data['EndDate'];
    }

    /**
     * @param string $value
     *
     * @return Relationship
     */
    public function setEndDate($value)
    {
        $this->propertyUpdated('EndDate', $value);
        $this->_data['EndDate'] = $value;

        return $this;
    }
}
