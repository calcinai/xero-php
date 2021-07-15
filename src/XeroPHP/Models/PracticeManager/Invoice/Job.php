<?php

namespace XeroPHP\Models\PracticeManager\Invoice;

use XeroPHP\Remote;

class Job extends Remote\Model
{
    /**
     * @property int ID
     * @property string Name
     * @property string Description
     * @property string ClientOrderNumber
     * @property Task[] Tasks
     * @property Cost[] Costs
     */

    /**
     * Get the resource uri of the class (Jobs) etc.
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
        return 'Job';
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
            'ID'                => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name'              => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description'       => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ClientOrderNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Tasks'             => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Task', true, false],
            'Costs'             => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Cost', true, false],
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
     * @return self
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
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return self
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
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getClientOrderNumber()
    {
        return $this->_data['ClientOrderNumber'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setClientOrderNumber($value)
    {
        $this->propertyUpdated('ClientOrderNumber', $value);
        $this->_data['ClientOrderNumber'] = $value;

        return $this;
    }

    /**
     * @return Task[]|Remote\Collection
     */
    public function getTasks()
    {
        return $this->_data['Tasks'];
    }

    /**
     * @param Task $value
     *
     * @return self
     */
    public function addTask(Task $value)
    {
        $this->propertyUpdated('Tasks', $value);
        if (! isset($this->_data['Tasks'])) {
            $this->_data['Tasks'] = new Remote\Collection();
        }
        $this->_data['Tasks'][] = $value;

        return $this;
    }

    /**
     * @return Cost[]|Remote\Collection
     */
    public function getCosts()
    {
        return $this->_data['Costs'];
    }

    /**
     * @param Cost $value
     *
     * @return self
     */
    public function addCost(Cost $value)
    {
        $this->propertyUpdated('Costs', $value);
        if (! isset($this->_data['Costs'])) {
            $this->_data['Costs'] = new Remote\Collection();
        }
        $this->_data['Costs'][] = $value;

        return $this;
    }
}
