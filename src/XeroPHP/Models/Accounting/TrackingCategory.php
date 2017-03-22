<?php
namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TrackingCategory\TrackingOption;

class TrackingCategory extends Remote\Object
{

    /**
     * The Xero identifier for a tracking categorye.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string TrackingCategoryID
     */

    /**
     * The name of the tracking category e.g. Department, Region (max length = 100)
     *
     * @property string Name
     */

    /**
     * The status of a tracking category
     *
     * @property string Status
     */

    /**
     * See Tracking Options
     *
     * @property TrackingOption[] Options
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TrackingCategories';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TrackingCategory';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'TrackingCategoryID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE
        ];
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'TrackingCategoryID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Option' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Options' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory\\TrackingOption', true, true]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTrackingCategoryID()
    {
        return $this->_data['TrackingCategoryID'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryID($value)
    {
        $this->propertyUpdated('TrackingCategoryID', $value);
        $this->_data['TrackingCategoryID'] = $value;
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
     * @return TrackingCategory
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
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
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
    public function getOption()
    {
        return $this->_data['Option'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setOption($value)
    {
        $this->propertyUpdated('Option', $value);
        $this->_data['Option'] = $value;
        return $this;
    }

    /**
     * @return TrackingOption[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getOptions()
    {
        return $this->_data['Options'];
    }

    /**
     * @param TrackingOption $value
     * @return TrackingCategory
     */
    public function addOption(TrackingOption $value)
    {
        $this->propertyUpdated('Options', $value);
        if (!isset($this->_data['Options'])) {
            $this->_data['Options'] = new Remote\Collection();
        }
        $this->_data['Options'][] = $value;
        return $this;
    }
}
