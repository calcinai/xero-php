<?php
namespace XeroPHP\Models\PayrollUK\Employee;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Employment extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'id';
    }

    /**
     * Get a list of the supported HTTP Methods
     *
     * @return array
     */
    public static function getSupportedMethods()
    {
        return [
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
        return 'employment';
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
            'id' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'payrollCalendarID' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'employeeNumber' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'startDate' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'niCategory' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
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
     * @param string $value
     * @return $this
     */
    public function setPayrollCalendarID(string $value)
    {
        $this->propertyUpdated('payrollCalendarID', $value);
        $this->_data[ 'payrollCalendarID' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeNumber()
    {
        return $this->_data[ 'employeeNumber' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmployeeNumber(string $value)
    {
        $this->propertyUpdated('employeeNumber', $value);
        $this->_data[ 'employeeNumber' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->_data[ 'startDate' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setStartDate(string $value)
    {
        $this->propertyUpdated('startDate', $value);
        $this->_data[ 'startDate' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNiCategory()
    {
        return $this->_data[ 'niCategory' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setNiCategory(string $value)
    {
        $this->propertyUpdated('niCategory', $value);
        $this->_data[ 'niCategory' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getEmploymentID();
    }

    /**
     * @return string
     */
    public function getEmploymentID()
    {
        return $this->_data[ 'id' ];
    }
}
