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
            // TODO: UPdate
            'Title'     => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Text'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Folder'    => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date'      => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'CreatedBy' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     *
     * @return Job
     */
    public function setTitle($value)
    {
        $this->propertyUpdated('Title', $value);
        $this->_data['Title'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->_data['Text'];
    }

    /**
     * @param string $value
     *
     * @return Job
     */
    public function setText($value)
    {
        $this->propertyUpdated('Text', $value);
        $this->_data['Text'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFolder()
    {
        return $this->_data['Folder'];
    }

    /**
     * @param string $value
     *
     * @return Job
     */
    public function setFolder($value)
    {
        $this->propertyUpdated('Folder', $value);
        $this->_data['Folder'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Job
     */
    public function setDate($value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->_data['CreatedBy'];
    }

    /**
     * @param string $value
     *
     * @return Job
     */
    public function setCreatedBy($value)
    {
        $this->propertyUpdated('CreatedBy', $value);
        $this->_data['CreatedBy'] = $value;

        return $this;
    }
}
