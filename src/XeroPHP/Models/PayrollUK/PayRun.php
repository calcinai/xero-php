<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class PayRun extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'payRunID';
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
            Remote\Request::METHOD_PUT,
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
        return 'payRuns';
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
     * @return bool
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
            'payRunID'          => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'payrollCalendarID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'periodStartDate'   => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'periodEndDate'     => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data[ 'payrollCalendarID' ];
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getPayRunID();
    }

    /**
     * @return string
     */
    public function getPayRunID()
    {
        return $this->_data[ 'payRunID' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodStartDate()
    {
        return $this->_data[ 'periodStartDate' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodEndDate()
    {
        return $this->_data[ 'periodEndDate' ];
    }
}
