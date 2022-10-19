<?php
namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TrackingCategory\TrackingOption;

class TrackingCategory extends Remote\Model
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
    const TRACKING_CATEGORY_STATUS_ACTIVE = "ACTIVE";

    const TRACKING_CATEGORY_STATUS_ARCHIVED = "ARCHIVED";

    const TRACKING_CATEGORY_STATUS_DELETED = "DELETED";

    /**
     * See Tracking Options
     *
     * @property TrackingOption[] Options
     */

    /**
     * Selected Option name
     *
     * @property string Option
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
     * @return string
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
            'TrackingCategoryName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TrackingOptionName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TrackingOptionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Options' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory\\TrackingOption', true, true],
            'Option' => [false, self::PROPERTY_TYPE_STRING, null, false, true],
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
    public function getTrackingCategoryName()
    {
        return $this->_data['TrackingCategoryName'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingCategoryName($value)
    {
        $this->propertyUpdated('TrackingCategoryName', $value);
        $this->_data['TrackingCategoryName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingOptionName()
    {
        return $this->_data['TrackingOptionName'];
    }

    /**
     * @param string $value
     * @return TrackingCategory
     */
    public function setTrackingOptionName($value)
    {
        $this->propertyUpdated('TrackingOptionName', $value);
        $this->_data['TrackingOptionName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingOptionID()
    {
        return $this->_data['TrackingOptionID'];
    }
 
    /**
     * @param string $value
     *
     * @return TrackingCategory
     */
    public function setTrackingOptionID($value)
    {
        $this->propertyUpdated('TrackingOptionID', $value);
        $this->_data['TrackingOptionID'] = $value;
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

    /**
     * @param array|TrackingOption $value
     *
     * @return $this
     */
    public function setOptions($value)
    {
        if (!($value instanceof Remote\Collection)) {
            if (is_array($value)) {
                $value = new Remote\Collection($value);
            } elseif ($value instanceof TrackingOption) {
                $value = new Remote\Collection([$value]);
            } else {
                return $this;
            }
        }

        $this->propertyUpdated('Options', $value);
        $this->_data['Options'] = $value;

        return $this;
    }

    /**
     * @return TrackingCategory
     */
    public function clearOptions()
    {
        $this->_data['Options'] = new Remote\Collection;

        return $this;
    }

    /**
     * @return string $value
     * Returns selected option name
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
     * @return TrackingCategory
     */
    public function clearOption()
    {
        unset($this->_data['Option']);

        return $this;
    }
}
