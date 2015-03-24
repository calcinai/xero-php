<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;


class PayrollCalendar extends Remote\Object {

    /**
     * Name of the Payroll Calendar (max length = 100)
     *
     * @property string Name
     */

    /**
     * See Payroll Calendar types
     *
     * @property string CalendarType
     */

    /**
     * The start date for the first pay period you will process. The end date will be calculated based upon
     * this date, and the calendar type selected (YYYY-MM-DD)
     *
     * @property \DateTime StartDate
     */

    /**
     * The date on which employees will be paid for the first pay period (YYYY-MM-DD)
     *
     * @property \DateTime PaymentDate
     */


    const CALENDARTYPE_WEEKLY       = 'WEEKLY';
    const CALENDARTYPE_FORTNIGHTLY  = 'FORTNIGHTLY';
    const CALENDARTYPE_FOURWEEKLY   = 'FOURWEEKLY';
    const CALENDARTYPE_MONTHLY      = 'MONTHLY';
    const CALENDARTYPE_TWICEMONTHLY = 'TWICEMONTHLY';
    const CALENDARTYPE_QUARTERLY    = 'QUARTERLY';


    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return 'PayrollCalendars';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'PayrollCalendar';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty(){
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem(){
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods() {
        return array(
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *
     * @return array
     */
    public static function getProperties() {
        return array(
            'Name' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'CalendarType' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'StartDate' => array (true, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'PaymentDate' => array (true, self::PROPERTY_TYPE_DATE, '\\DateTime', false)
        );
    }


    /**
     * @return string
     */
    public function getName() {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return PayrollCalendar
     */
    public function setName($value) {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCalendarType() {
        return $this->_data['CalendarType'];
    }

    /**
     * @param string $value
     * @return PayrollCalendar
     */
    public function setCalendarType($value) {
        $this->propertyUpdated('CalendarType', $value);
        $this->_data['CalendarType'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate() {
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayrollCalendar
     */
    public function setStartDate(\DateTime $value) {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate() {
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayrollCalendar
     */
    public function setPaymentDate(\DateTime $value) {
        $this->propertyUpdated('PaymentDate', $value);
        $this->_data['PaymentDate'] = $value;
        return $this;
    }


}