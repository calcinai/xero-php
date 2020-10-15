<?php

namespace XeroPHP\Models\Projects;

use Exception;
use XeroPHP\Remote;

class Tasks extends Remote\Model
{

    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'projects/0c173051-5548-4eb6-a779-76c6997a7b1c/tasks';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return '';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return 'projects.xro';
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_DELETE,
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
            'name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'rate' => [false, self::PROPERTY_TYPE_STRING, null, true, false],
            'charge_type' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'estimate_minutes' => [false, self::PROPERTY_TYPE_STRING, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['name'];
    }

    /**
     * @param string $value
     * @return Account
     */
    public function setName($value)
    {
        $this->propertyUpdated('name', $value);
        $this->_data['name'] = $value;
        return $this;
    }


    /**
     * @return string
     */
    public function getChargeType()
    {
        return $this->_data['charge_type'];
    }
    /**
     * @param string $value
     * @return Project
     */
    public function setChargeType($value)
    {
        $this->propertyUpdated('charge_type', $value);
        $this->_data['charge_type'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEstimateMinutes()
    {
        return $this->_data['estimate_minutes'];
    }
    /**
     * @param string $value
     * @return Project
     */
    public function setEstimateMinutes($value)
    {
        $this->propertyUpdated('estimate_minutes', $value);
        $this->_data['estimate_minutes'] = $value;
        return $this;
    }


    /**
     * @return string
     */
    public function getRate()
    {
        return $this->_data['rate'];
    }
    /**
     * @param object $value
     * @return Project
     */
    public function setRate($value)
    {
        $value = collect($value);
        $this->propertyUpdated('rate', $value);
        $this->_data['rate'] = (string)$value;
        return $this;
    }

    /**
     * Shorthand save an object if it is instantiated with app context.
     *
     * @throws Exception
     *
     * @return Response|null
     */
    public function save()
    {
        if ($this->_application === null) {
            throw new Exception(
                '->save() is only available on objects that have an injected application context.'
            );
        }
        return $this->_application->saveCustom($this);
    }
}
