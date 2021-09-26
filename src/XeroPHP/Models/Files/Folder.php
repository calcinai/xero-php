<?php

namespace XeroPHP\Models\Files;

use XeroPHP\Remote;

class Folder extends Remote\Model
{
    /**
     * The name of the folder.
     *
     * @property string Name
     */

    /**
     * The number of files in the folder.
     *
     * @property string FileCount
     */

    /**
     * The email address used to email files to the inbox. Only the inbox will have this element.
     *
     * @property string Email
     */

    /**
     * Boolean to indicate if the folder is the Inbox. The Inbox cannot be renamed or deleted.
     *
     * @property bool IsInbox
     */

    /**
     * Xero unique identifier for a folder.
     *
     * @property string Id
     */

    /**
     * The Files that are contained in the Folder. Note: The Files element is only returned when using the
     * /Folders/{FolderId}/Files endpoint.
     *
     * @property File[] Files
     */

    /**
     * You can specify an individual record by appending the FolderId to the endpoint, i.e. GET
     * https://…/Folders/{FolderId}.
     *
     * @property string FolderId
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Folders';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Folder';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'Id';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_FILE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE,
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
            'Name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'FileCount' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Email' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsInbox' => [true, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Id' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'Files' => [true, self::PROPERTY_TYPE_OBJECT, 'Files\\File', true, false],
            'FolderId' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
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
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return Folder
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
    public function getFileCount()
    {
        return $this->_data['FileCount'];
    }

    /**
     * @param string $value
     *
     * @return Folder
     */
    public function setFileCount($value)
    {
        $this->propertyUpdated('FileCount', $value);
        $this->_data['FileCount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data['Email'];
    }

    /**
     * @param string $value
     *
     * @return Folder
     */
    public function setEmail($value)
    {
        $this->propertyUpdated('Email', $value);
        $this->_data['Email'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsInbox()
    {
        return $this->_data['IsInbox'];
    }

    /**
     * @param bool $value
     *
     * @return Folder
     */
    public function setIsInbox($value)
    {
        $this->propertyUpdated('IsInbox', $value);
        $this->_data['IsInbox'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_data['Id'];
    }

    /**
     * @param string $value
     *
     * @return Folder
     */
    public function setId($value)
    {
        $this->propertyUpdated('Id', $value);
        $this->_data['Id'] = $value;

        return $this;
    }

    /**
     * @return File[]|Remote\Collection
     */
    public function getFiles()
    {
        return $this->_data['Files'];
    }

    /**
     * @param File $value
     *
     * @return Folder
     */
    public function addFile(File $value)
    {
        $this->propertyUpdated('Files', $value);
        if (! isset($this->_data['Files'])) {
            $this->_data['Files'] = new Remote\Collection();
        }
        $this->_data['Files'][] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getFolderId()
    {
        return $this->_data['FolderId'];
    }

    /**
     * @param string $value
     *
     * @return Folder
     */
    public function setFolderId($value)
    {
        $this->propertyUpdated('FolderId', $value);
        $this->_data['FolderId'] = $value;

        return $this;
    }
}
