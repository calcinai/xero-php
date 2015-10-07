<?php
namespace XeroPHP\Models\Accounting\RepeatingInvoice;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Organisation\PaymentTerm;

class Schedule extends Remote\Object
{

    /**
     * Integer used with the unit e.g. 1 (every 1 week), 2 (every 2 months)
     *
     * @property int Period
     */

    /**
     * One of the following : WEEKLY or MONTHLY
     *
     * @property string Unit
     */

    /**
     * Integer used with due date type e.g 20 (of following month), 31 (of current month)
     *
     * @property int DueDate
     */

    /**
     * See Payment Terms
     *
     * @property PaymentTerm DueDateType
     */

    /**
     * Invoice date the first invoice in the repeating schedule
     *
     * @property \DateTime StartDate
     */

    /**
     * The calendar date of the next invoice in the schedule to be generated
     *
     * @property \DateTime NextScheduledDate
     */

    /**
     * Invoice end date – only returned if the template has an end date set
     *
     * @property \DateTime EndDate
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Schedule';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Schedule';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return array(
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
            'Period' => array (false, self::PROPERTY_TYPE_INT, null, false, false),
            'Unit' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'DueDate' => array (false, self::PROPERTY_TYPE_INT, null, false, false),
            'DueDateType' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Organisation\\PaymentTerm', false, false),
            'StartDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'NextScheduledDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'EndDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false)
        );
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getPeriod()
    {
        return $this->_data['Period'];
    }

    /**
     * @param int $value
     * @return Schedule
     */
    public function setPeriod($value)
    {
        $this->propertyUpdated('Period', $value);
        $this->_data['Period'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit()
    {
        return $this->_data['Unit'];
    }

    /**
     * @param string $value
     * @return Schedule
     */
    public function setUnit($value)
    {
        $this->propertyUpdated('Unit', $value);
        $this->_data['Unit'] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getDueDate()
    {
        return $this->_data['DueDate'];
    }

    /**
     * @param int $value
     * @return Schedule
     */
    public function setDueDate($value)
    {
        $this->propertyUpdated('DueDate', $value);
        $this->_data['DueDate'] = $value;
        return $this;
    }

    /**
     * @return PaymentTerm
     */
    public function getDueDateType()
    {
        return $this->_data['DueDateType'];
    }

    /**
     * @param PaymentTerm $value
     * @return Schedule
     */
    public function setDueDateType(PaymentTerm $value)
    {
        $this->propertyUpdated('DueDateType', $value);
        $this->_data['DueDateType'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setStartDate(\DateTime $value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getNextScheduledDate()
    {
        return $this->_data['NextScheduledDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setNextScheduledDate(\DateTime $value)
    {
        $this->propertyUpdated('NextScheduledDate', $value);
        $this->_data['NextScheduledDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->_data['EndDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setEndDate(\DateTime $value)
    {
        $this->propertyUpdated('EndDate', $value);
        $this->_data['EndDate'] = $value;
        return $this;
    }


}
