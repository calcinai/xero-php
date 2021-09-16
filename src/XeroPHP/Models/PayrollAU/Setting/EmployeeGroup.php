<?php

namespace XeroPHP\Models\PayrollAU\Setting;

use XeroPHP\Remote;

class EmployeeGroup extends Remote\Model
{
    /**
     * Xero tracking category identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string TrackingCategoryID
     */

    /**
     * Name of tracking category.
     *
     * @property string TrackingCategoryName
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TrackingCategories';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TrackingCategory';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'TrackingCategoryID';
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
            'TrackingCategoryID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TrackingCategoryName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
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
     *
     * @return EmployeeGroup
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
    public function getTrackingCategoryName()
    {
        return $this->_data['TrackingCategoryName'];
    }

    /**
     * @param string $value
     *
     * @return EmployeeGroup
     */
    public function setTrackingCategoryName($value)
    {
        $this->propertyUpdated('TrackingCategoryName', $value);
        $this->_data['TrackingCategoryName'] = $value;

        return $this;
    }
}
