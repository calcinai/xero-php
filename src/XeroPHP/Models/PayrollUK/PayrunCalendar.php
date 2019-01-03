<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class PayrunCalendar extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    const TYPE_WEEKLY = 'Weekly';
    const TYPE_FORTNIGHTLY = 'Fortnightly';
    const TYPE_FOURWEEKLY = 'FourWeekly';
    const TYPE_MONTHLY = 'Monthly';
    const TYPE_ANNUAL = 'Annual';
    const TYPE_QUARTERLY = 'Quarterly';

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'PayRunCalendarID';
    }

    /**
     * Get a list of the supported HTTP Methods
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_POST,
        ];
    }

    /**
     * Check for create method override
     *
     * @return null|string
     */
    public static function getCreateMethod()
    {
        return Remote\Request::METHOD_POST;
    }

    /**
     * return the URI of the resource (if any)
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'payRunCalendars';
    }

    /**
     * @return string
     */
    public static function getRootNodeName()
    {
        return '';
    }

    /**
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * Is pageable
     *
     * @return boolean
     */
    public static function isPageable()
    {
        return true;
    }

    /**
     * Get a list of properties
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'calendarType'    => [ true, self::PROPERTY_TYPE_STRING, null, false, false ],
            'periodStartDate' => [ true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false ],
            'paymentDate'     => [ true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false ],
            'periodEndDate'   => [ false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false ],
            'updatedDateUTC'  => [ false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false ],
        ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCalendarType()
    {
        return $this->_data[ 'calendarType' ];
    }

    public function setCalendarType(string $value)
    {
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodStartDate()
    {
        return $this->_data[ 'periodStartDate' ];
    }

    public function setPeriodStartDate(\DateTimeInterface $value)
    {
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPaymentDate()
    {
        return $this->_data[ 'paymentDate' ];
    }

    public function setPaymentDate(\DateTimeInterface $value)
    {
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodEndDate()
    {
        return $this->_data[ 'periodEndDate' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data[ 'updatedDateUTC' ];
    }
}
