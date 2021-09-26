<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class PayRollCalendar extends Remote\Model
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
        return 'PayrollCalendarID';
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
            'payrollCalendarID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'name'              => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'calendarType'      => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'periodStartDate'   => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'paymentDate'       => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'periodEndDate'     => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'updatedDateUTC'    => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data[ 'name' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setName(string $value)
    {
        $this->propertyUpdated('name', $value);
        $this->_data[ 'name' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCalendarType()
    {
        return $this->_data[ 'calendarType' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setCalendarType(string $value)
    {
        $this->propertyUpdated('calendarType', $value);
        $this->_data[ 'calendarType' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodStartDate()
    {
        return $this->_data[ 'periodStartDate' ];
    }

    /**
     * @param \DateTimeInterface $value
     * @return $this
     */
    public function setPeriodStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('periodStartDate', $value);
        $this->_data[ 'periodStartDate' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPaymentDate()
    {
        return $this->_data[ 'paymentDate' ];
    }

    /**
     * @param \DateTimeInterface $value
     * @return $this
     */
    public function setPaymentDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('paymentDate', $value);
        $this->_data[ 'paymentDate' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getPayrollCalendarID();
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data[ 'payrollCalendarID' ];
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
