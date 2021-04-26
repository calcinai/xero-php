<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class BrandingTheme extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string BrandingThemeID
     */

    /**
     * Name of branding theme.
     *
     * @property string Name
     */

    /**
     * The URL of the logo used on the branding theme
     *
     * @property string LogoUrl
     */

    /**
     * The type of document that the branding theme can be appplied to
     * @property string Type
     */

    /**
     * Integer – ranked order of branding theme. The default branding theme has a value of 0.
     *
     * @property int SortOrder
     */

    /**
     * UTC timestamp of creation date of branding theme.
     *
     * @property \DateTimeInterface CreatedDateUTC
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BrandingThemes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BrandingTheme';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'BrandingThemeID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string|null
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
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LogoUrl' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SortOrder' => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'CreatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getBrandingThemeID()
    {
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param string $value
     *
     * @return BrandingTheme
     */
    public function setBrandingThemeID($value)
    {
        $this->propertyUpdated('BrandingThemeID', $value);
        $this->_data['BrandingThemeID'] = $value;

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
     * @return BrandingTheme
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
    public function getLogoUrl()
    {
        return $this->_data['LogoUrl'];
    }

    /**
     * @param string $value
     *
     * @return BrandingTheme
     */
    public function setLogoUrl($value)
    {
        $this->propertyUpdated('LogoUrl', $value);
        $this->_data['LogoUrl'] = $value;

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
     * @return BrandingTheme
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->_data['SortOrder'];
    }

    /**
     * @param int $value
     *
     * @return BrandingTheme
     */
    public function setSortOrder($value)
    {
        $this->propertyUpdated('SortOrder', $value);
        $this->_data['SortOrder'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return BrandingTheme
     */
    public function setCreatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('CreatedDateUTC', $value);
        $this->_data['CreatedDateUTC'] = $value;

        return $this;
    }
}
