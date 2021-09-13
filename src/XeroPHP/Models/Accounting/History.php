<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;

class History extends Model
{
    /**
     * The type of change recorded against the document.
     *
     * @property string Changes
     */

    /**
     * UTC date that the history record was created.
     *
     * @property \DateTimeInterface DateUTC
     */

    /**
     * The user responsible for the change ("System Generated" when the change happens via API).
     *
     * @property string User
     */

    /**
     * Description of the change event or transaction.
     *
     * @property string Details
     */

    /**
     * Get the GUID Property if it exists.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }

    /**
     * Get a list of properties.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'Changes' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'DateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'User' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Details' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    /**
     * Get a list of the supported HTTP Methods.
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [
            Request::METHOD_GET,
            Request::METHOD_PUT,
        ];
    }

    /**
     * return the URI of the resource (if any).
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return '';
    }

    /**
     * @return string
     */
    public function getChanges()
    {
        return $this->_data['Changes'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateUTC()
    {
        return $this->_data['DateUTC'];
    }

    /**
     * @return int
     */
    public function getUser()
    {
        return $this->_data['User'];
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->_data['Details'];
    }

    /**
     * @param string $value
     *
     * @return History
     */
    public function setDetails($value)
    {
        $this->propertyUpdated('Details', $value);
        $this->_data['Details'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public static function isPageable()
    {
        return false;
    }

    public static function getAPIStem()
    {
        return '';
    }

    public static function getRootNodeName()
    {
        // TODO: Implement getRootNodeName() method.
    }
}
