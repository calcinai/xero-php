<?php

namespace XeroPHP\Models\Files;

use XeroPHP\Remote;

class Association extends Remote\Model
{
    /**
     * The identifier of the object that the file is being associated with (e.g. InvoiceID,
     * BankTransactionID, ContactID).
     *
     * @property string ObjectId
     */

    /**
     * The Object Group that the object is in. These roughly correlate to the endpoints that can be used to
     * retrieve the object via the core accounting API.
     *
     * @property string ObjectGroup
     */

    /**
     * The Object Type.
     *
     * @property string ObjectType
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Files/{FileId}/Associations';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Association';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET,
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
            'ObjectId' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ObjectGroup' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ObjectType' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getObjectId()
    {
        return $this->_data['ObjectId'];
    }

    /**
     * @param string $value
     *
     * @return Association
     */
    public function setObjectId($value)
    {
        $this->propertyUpdated('ObjectId', $value);
        $this->_data['ObjectId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getObjectGroup()
    {
        return $this->_data['ObjectGroup'];
    }

    /**
     * @param string $value
     *
     * @return Association
     */
    public function setObjectGroup($value)
    {
        $this->propertyUpdated('ObjectGroup', $value);
        $this->_data['ObjectGroup'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getObjectType()
    {
        return $this->_data['ObjectType'];
    }

    /**
     * @param string $value
     *
     * @return Association
     */
    public function setObjectType($value)
    {
        $this->propertyUpdated('ObjectType', $value);
        $this->_data['ObjectType'] = $value;

        return $this;
    }
}
