<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class InvoiceReminder extends Remote\Model
{
    /**
     * Boolean to set when InvocieReminders are turned on in Xero.
     *
     * @property bool Enabled
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'InvoiceReminders/Settings';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'InvoiceReminder';
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
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
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
            'Enabled' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return bool
     */
    public function getEnabled()
    {
        return $this->_data['Enabled'];
    }
}
