<?php

namespace XeroPHP\Models\PracticeManager\Client;

use XeroPHP\Remote;

class AutoBasOptInCriteria extends Remote\Model
{
    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'AutoBasOptInCriteria';
    }

    /**
     * Get the resource uri of the class (AccountManagers) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return '';
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
        return [];
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
            'Annually'  => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Monthly'   => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Quarterly' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Opt-Out'   => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }
}
