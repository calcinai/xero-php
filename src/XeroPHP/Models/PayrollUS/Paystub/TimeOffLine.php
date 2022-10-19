<?php

namespace XeroPHP\Models\PayrollUS\Paystub;

use XeroPHP\Remote;

class TimeOffLine extends Remote\Model
{
    /**
     * Xero identifier for payroll time off type.
     *
     * @property string TimeOffTypeID
     */

    /**
     * Hours of time off.
     *
     * @property string Hours
     */

    /**
     * Balance for the time off type.
     *
     * @property string Balance
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TimeOffLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TimeOffLine';
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
        return Remote\URL::API_PAYROLL;
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
            'TimeOffTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Hours' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Balance' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getTimeOffTypeID()
    {
        return $this->_data['TimeOffTypeID'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffLine
     */
    public function setTimeOffTypeID($value)
    {
        $this->propertyUpdated('TimeOffTypeID', $value);
        $this->_data['TimeOffTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getHours()
    {
        return $this->_data['Hours'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffLine
     */
    public function setHour($value)
    {
        $this->propertyUpdated('Hours', $value);
        $this->_data['Hours'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBalance()
    {
        return $this->_data['Balance'];
    }

    /**
     * @param string $value
     *
     * @return TimeOffLine
     */
    public function setBalance($value)
    {
        $this->propertyUpdated('Balance', $value);
        $this->_data['Balance'] = $value;

        return $this;
    }
}
