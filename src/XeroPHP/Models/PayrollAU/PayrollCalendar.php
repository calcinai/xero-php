<?php
namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

class PayrollCalendar extends Remote\Object
{

    /**
     * Xero identifier
     *
     * @property string PayrollCalendarID
     */

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
     * The start date of the upcoming pay period. The end date will be calculated based upon this date, and
     * the calendar type selected (YYYY-MM-DD), more details.
     *
     * @property \DateTime StartDate
     */

    /**
     * The date on which employees will be paid for the upcoming pay period (YYYY-MM-DD), more details.
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
    public static function getResourceURI()
    {
        return 'PayrollCalendars';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PayrollCalendar';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayrollCalendarID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
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
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return array(
            'PayrollCalendarID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Name' => array (true, self::PROPERTY_TYPE_STRING, null, false, false),
            'CalendarType' => array (true, self::PROPERTY_TYPE_ENUM, null, false, false),
            'StartDate' => array (true, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'PaymentDate' => array (true, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false)
        );
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
     * @return PayrollCalendar
     */
    public function setCalendarType($value)
    {
        $this->propertyUpdated('CalendarType', $value);
        $this->_data['CalendarType'] = $value;
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
     * @return PayrollCalendar
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
    public function getPaymentDate()
    {
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTime $value
     * @return PayrollCalendar
     */
    public function setPaymentDate(\DateTime $value)
    {
        $this->propertyUpdated('PaymentDate', $value);
        $this->_data['PaymentDate'] = $value;
        return $this;
    }


}
