<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollUK\Timesheet\Line;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Timesheet extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    const TYPE_DRAFT = 'Draft';
    const TYPE_APPROVED = 'Approved';
    const TYPE_COMPLETED = 'Completed';

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'timesheetID';
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
            Remote\Request::METHOD_DELETE,
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
        return 'timesheets';
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
            'timesheetID'       => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'payrollCalendarID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'employeeID'        => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'startDate'         => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'endDate'           => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'status'            => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'totalHours'        => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'updatedDateUTC'    => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'lines'             => [false, self::PROPERTY_TYPE_OBJECT, Line::class, true, true]
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
    public function getEmployeeID()
    {
        return $this->_data[ 'employeeID' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEmployeeID(string $value)
    {
        $this->propertyUpdated('employeeID', $value);
        $this->_data[ 'employeeID' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->_data[ 'startDate' ];
    }

    /**
     * @param $value
     * @return $this
     */
    public function setStartDate($value)
    {
        $this->propertyUpdated('startDate', $value);
        $this->_data[ 'startDate' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate()
    {
        return $this->_data[ 'endDate' ];
    }

    /**
     * @param $value
     * @return $this
     */
    public function setEndDate($value)
    {
        $this->propertyUpdated('endDate', $value);
        $this->_data[ 'endDate' ] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection
     */
    public function getLines()
    {
        return $this->_data[ 'lines' ];
    }

    /**
     * @param Line $value
     * @return $this
     */
    public function addLine(Line $value)
    {
        $this->propertyUpdated('lines', $value);

        if (!isset($this->_data[ 'lines' ])) {
            $this->_data[ 'lines' ] = new Remote\Collection;
        }

        $this->_data[ 'lines' ][] = $value;

        return $this;
    }

    /**
     * @param Remote\Collection $value
     * @return $this
     */
    public function setLines(Remote\Collection $value)
    {
        $this->propertyUpdated('lines', $value);
        $this->_data[ 'lines' ] = $collectionOfLines;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getTimesheetID();
    }

    /**
     * @return string
     */
    public function getTimesheetID()
    {
        return $this->_data[ 'timesheetID' ];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data[ 'status' ];
    }

    /**
     * @return float
     */
    public function getTotalHours()
    {
        return $this->_data[ 'totalHours' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data[ 'updatedDateUTC' ];
    }
}
