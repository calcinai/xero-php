<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;

class PaySchedule extends Remote\Model
{
    /**
     * Name of the Pay Schedule.
     *
     * @property string PayScheduleName
     */

    /**
     * The Payment Date of the Pay Schedule.
     *
     * @property \DateTimeInterface PaymentDate
     */

    /**
     * The Start Date of the Pay Schedule.
     *
     * @property \DateTimeInterface StartDate
     */

    /**
     * The ScheduleType defines the frequency in which an employee gets paid.
     *
     * @property string ScheduleType
     */

    /**
     * Xero Identifier.
     *
     * @property string PayScheduleId
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PaySchedules';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PaySchedule';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayScheduleId';
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
            Remote\Request::METHOD_POST,
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
            'PayScheduleName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'PaymentDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'StartDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'ScheduleType' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PayScheduleId' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getPayScheduleName()
    {
        return $this->_data['PayScheduleName'];
    }

    /**
     * @param string $value
     *
     * @return PaySchedule
     */
    public function setPayScheduleName($value)
    {
        $this->propertyUpdated('PayScheduleName', $value);
        $this->_data['PayScheduleName'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPaymentDate()
    {
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PaySchedule
     */
    public function setPaymentDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('PaymentDate', $value);
        $this->_data['PaymentDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PaySchedule
     */
    public function setStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleType()
    {
        return $this->_data['ScheduleType'];
    }

    /**
     * @param string $value
     *
     * @return PaySchedule
     */
    public function setScheduleType($value)
    {
        $this->propertyUpdated('ScheduleType', $value);
        $this->_data['ScheduleType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayScheduleId()
    {
        return $this->_data['PayScheduleId'];
    }

    /**
     * @param string $value
     *
     * @return PaySchedule
     */
    public function setPayScheduleId($value)
    {
        $this->propertyUpdated('PayScheduleId', $value);
        $this->_data['PayScheduleId'] = $value;

        return $this;
    }
}
