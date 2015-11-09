<?php
namespace XeroPHP\Models\Files;

use XeroPHP\Remote;

class File extends Remote\Object
{

    /**
     * The name of the file
     *
     * @property string Name
     */

    /**
     * The ID of the Folder that contains the File.
     *
     * @property Folder FolderId
     */

    /**
     * The Mime type of the file
     *
     * @property string MimeType
     */

    /**
     * The file size in bytes
     *
     * @property string Size
     */

    /**
     * UTC timestamp of the file creation
     *
     * @property \DateTime CreatedDateUTC
     */

    /**
     * UTC timestamp of the last modified date
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * The Xero User that created the file. Note: For Files uploaded via the API this will always be
     * “System Generated”.
     *
     * @property string User
     */

    /**
     * Xero unique identifier for a file
     *
     * @property string Id
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Files';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'File';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'Id';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_FILE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_DELETE
        );
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
        return array(
            'Name' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'FolderId' => array (false, self::PROPERTY_TYPE_OBJECT, 'Files\\Folder', false, false),
            'MimeType' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Size' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'CreatedDateUTC' => array (false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTime', false, false),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTime', false, false),
            'User' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Id' => array (false, self::PROPERTY_TYPE_GUID, null, false, false)
        );
    }

    public static function isPageable()
    {
        return true;
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
     * @return File
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return Folder
     */
    public function getFolderId()
    {
        return $this->_data['FolderId'];
    }

    /**
     * @param Folder $value
     * @return File
     */
    public function setFolderId(Folder $value)
    {
        $this->propertyUpdated('FolderId', $value);
        $this->_data['FolderId'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getMimeType()
    {
        return $this->_data['MimeType'];
    }

    /**
     * @param string $value
     * @return File
     */
    public function setMimeType($value)
    {
        $this->propertyUpdated('MimeType', $value);
        $this->_data['MimeType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSize()
    {
        return $this->_data['Size'];
    }

    /**
     * @param string $value
     * @return File
     */
    public function setSize($value)
    {
        $this->propertyUpdated('Size', $value);
        $this->_data['Size'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateUTC()
    {
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return File
     */
    public function setCreatedDateUTC(\DateTime $value)
    {
        $this->propertyUpdated('CreatedDateUTC', $value);
        $this->_data['CreatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return File
     */
    public function setUpdatedDateUTC(\DateTime $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->_data['User'];
    }

    /**
     * @param string $value
     * @return File
     */
    public function setUser($value)
    {
        $this->propertyUpdated('User', $value);
        $this->_data['User'] = $value;
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
     * @return File
     */
    public function setId($value)
    {
        $this->propertyUpdated('Id', $value);
        $this->_data['Id'] = $value;
        return $this;
    }


}
