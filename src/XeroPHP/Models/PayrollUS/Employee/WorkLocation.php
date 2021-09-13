<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;

class WorkLocation extends Remote\Model
{
    /**
     * Xero unique identifier for WorkLocation. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string WorkLocationID
     */

    /**
     * Boolean to specify if this work location is the primary work location.
     *
     * @property bool IsPrimary
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'WorkLocations';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'WorkLocation';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'WorkLocationID';
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
            'WorkLocationID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsPrimary' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getWorkLocationID()
    {
        return $this->_data['WorkLocationID'];
    }

    /**
     * @param string $value
     *
     * @return WorkLocation
     */
    public function setWorkLocationID($value)
    {
        $this->propertyUpdated('WorkLocationID', $value);
        $this->_data['WorkLocationID'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPrimary()
    {
        return $this->_data['IsPrimary'];
    }

    /**
     * @param bool $value
     *
     * @return WorkLocation
     */
    public function setIsPrimary($value)
    {
        $this->propertyUpdated('IsPrimary', $value);
        $this->_data['IsPrimary'] = $value;

        return $this;
    }
}
