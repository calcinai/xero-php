<?php

namespace XeroPHP\Models\PracticeManager;

use XeroPHP\Models\PracticeManager\Client\AccountManager;
use XeroPHP\Models\PracticeManager\Client\BillingClient;
use XeroPHP\Models\PracticeManager\Client\Contact;
use XeroPHP\Models\PracticeManager\Client\Group;
use XeroPHP\Models\PracticeManager\Client\JobManager;
use XeroPHP\Models\PracticeManager\Client\Note;
use XeroPHP\Models\PracticeManager\Client\Relationship;
use XeroPHP\Models\PracticeManager\Client\Type;
use XeroPHP\Remote;

class CustomField extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string ID
     */

    /**
     * Name of Custom Field
     *
     * @property string Name
     */

    /**
     * Type of Custom Field
     *
     * @property string Type
     */

    /**
     * Link Url
     *
     * @property string LinkUrl
     */

    /**
     * Custom Field Options for Dropdown lists
     *
     * @property string Options
     */

    /**
     * In Use for Clients
     *
     * @property bool UseClient
     */

    /**
     * In Use for Client Contacts
     *
     * @property bool UseContact
     */

    /**
     * In Use for Suppliers
     *
     * @property bool UseSupplier
     */

    /**
     * In Use for Jobs
     *
     * @property bool UseJob
     */

    /**
     * In Use for Leads
     *
     * @property bool UseLead
     */

    /**
     * In Use for Job Tasks
     *
     * @property bool UseJobTask
     */

    /**
     * In Use for Job Costing
     *
     * @property bool UseJobCost
     */

    /**
     * In Use for Job Time
     *
     * @property bool UseJobTime
     */

    /**
     * Identifies XML element for accessing the field value during GET or PUT - valid values are: Text | Decimal | Number | Boolean | Date
     *
     * @property string ValueElement
     */

    /**
     * Get the resource uri of the class (Clients) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'customfield.api/definition';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'CustomFieldDefinition';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_DELETE,
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
            'ID'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name'         => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type'         => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LinkUrl'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Options'      => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UseClient'    => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseContact'   => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseSupplier'  => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseJob'       => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseLead'      => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseJobTask'   => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseJobCost'   => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UseJobTime'   => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'ValueElement' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param int $value
     *
     * @return CustomField
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
     * @return CustomField
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
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return CustomField
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
    public function getLinkUrl()
    {
        return $this->_data['LinkUrl'];
    }

    /**
     * @param string $value
     *
     * @return CustomField
     */
    public function setLinkUrl($value)
    {
        $this->propertyUpdated('LinkUrl', $value);
        $this->_data['LinkUrl'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getOptions()
    {
        return $this->_data['Options'];
    }

    /**
     * @param string $value
     *
     * @return CustomField
     */
    public function setOptions($value)
    {
        $this->propertyUpdated('Options', $value);
        $this->_data['Options'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseClient()
    {
        return $this->_data['UseClient'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseClient($value)
    {
        $this->propertyUpdated('UseClient', $value);
        $this->_data['UseClient'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseContact()
    {
        return $this->_data['UseContact'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseContact($value)
    {
        $this->propertyUpdated('UseContact', $value);
        $this->_data['UseContact'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseSupplier()
    {
        return $this->_data['UseSupplier'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseSupplier($value)
    {
        $this->propertyUpdated('UseSupplier', $value);
        $this->_data['UseSupplier'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseJob()
    {
        return $this->_data['UseJob'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseJob($value)
    {
        $this->propertyUpdated('UseJob', $value);
        $this->_data['UseJob'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseLead()
    {
        return $this->_data['UseLead'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseLead($value)
    {
        $this->propertyUpdated('UseLead', $value);
        $this->_data['UseLead'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseJobTask()
    {
        return $this->_data['UseJobTask'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseJobTask($value)
    {
        $this->propertyUpdated('UseJobTask', $value);
        $this->_data['UseJobTask'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseJobCost()
    {
        return $this->_data['UseJobCost'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseJobCost($value)
    {
        $this->propertyUpdated('UseJobCost', $value);
        $this->_data['UseJobCost'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getUseJobTime()
    {
        return $this->_data['UseJobTime'];
    }

    /**
     * @param bool $value
     *
     * @return CustomField
     */
    public function setUseJobTime($value)
    {
        $this->propertyUpdated('UseJobTime', $value);
        $this->_data['UseJobTime'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getValueElement()
    {
        return $this->_data['ValueElement'];
    }

    /**
     * @param string $value
     *
     * @return CustomField
     */
    public function setValueElement($value)
    {
        $this->propertyUpdated('ValueElement', $value);
        $this->_data['ValueElement'] = $value;

        return $this;
    }
}
