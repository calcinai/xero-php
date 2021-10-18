<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

class PayrollCalendar extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string PayrollCalendarID
     */

    /**
     * Name of the Payroll Calendar (max length = 100).
     *
     * @property string Name
     */

    /**
     * See Payroll Calendar types.
     *
     * @property string CalendarType
     */

    /**
     * The start date of the upcoming pay period. The end date will be calculated based upon this date, and
     * the calendar type selected (YYYY-MM-DD), more details.
     *
     * @property \DateTimeInterface StartDate
     */
    
    /**
     * The date the calendar was last updated
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * The date on which employees will be paid for the upcoming pay period (YYYY-MM-DD), more details.
     *
     * @property \DateTimeInterface PaymentDate
     */
    const CALENDARTYPE_WEEKLY = 'WEEKLY';

    const CALENDARTYPE_FORTNIGHTLY = 'FORTNIGHTLY';

    const CALENDARTYPE_FOURWEEKLY = 'FOURWEEKLY';

    const CALENDARTYPE_MONTHLY = 'MONTHLY';

    const CALENDARTYPE_TWICEMONTHLY = 'TWICEMONTHLY';

    const CALENDARTYPE_QUARTERLY = 'QUARTERLY';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PayrollCalendars';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayrollCalendar';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayrollCalendarID';
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
            'PayrollCalendarID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'CalendarType' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'StartDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PaymentDate' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'ReferenceDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false]
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data['PayrollCalendarID'];
    }

    /**
     * @param string $value
     *
     * @return PayrollCalendar
     */
    public function setPayrollCalendarID($value)
    {
        $this->propertyUpdated('PayrollCalendarID', $value);
        $this->_data['PayrollCalendarID'] = $value;

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
     * @return PayrollCalendar
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
    public function getCalendarType()
    {
        return $this->_data['CalendarType'];
    }

    /**
     * @param string $value
     *
     * @return PayrollCalendar
     */
    public function setCalendarType($value)
    {
        $this->propertyUpdated('CalendarType', $value);
        $this->_data['CalendarType'] = $value;

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
     * @return PayrollCalendar
     */
    public function setStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;

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
     * @return PayrollCalendar
     */
    public function setPaymentDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('PaymentDate', $value);
        $this->_data['PaymentDate'] = $value;

        return $this;
    }
    
    /**
     * return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }
    
    /**
     * return \DateTimeInterface
     */
    public function getReferenceDate()
    {
        return $this->_data['ReferenceDate'];
    }
}
