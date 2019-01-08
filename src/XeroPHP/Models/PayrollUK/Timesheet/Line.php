<?php
namespace XeroPHP\Models\PayrollUK\Timesheet;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Line extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'timesheetLineID';
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
        return 'lines';
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
            'timesheetLineID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'earningsRateID'  => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'date'            => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'numberOfUnits'   => [true, self::PROPERTY_TYPE_INT, null, false, false],
            'updatedDateUTC'  => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'createdDateUTC'  => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    /**
     * @return string
     */
    public function getEarningsRateID()
    {
        return $this->_data[ 'earningsRateID' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEarningsRateID(string $value)
    {
        $this->propertyUpdated('earningsRateID', $value);
        $this->_data[ 'earningsRateID' ] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data[ 'date' ];
    }

    /**
     * @param \DateTimeInterface $value
     * @return $this
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('date', $value);
        $this->_data[ 'date' ] = $value;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNumberOfUnits()
    {
        return $this->_data[ 'numberOfUnits' ];
    }

    /**
     * @param $value
     * @return $this
     */
    public function setNumberOfUnits($value)
    {
        $this->propertyUpdated('numberOfUnits', $value);
        $this->_data[ 'numberOfUnits' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getTimesheetLineID();
    }

    /**
     * @return string
     */
    public function getTimesheetLineID()
    {
        return $this->_data[ 'timesheetLineID' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data[ 'updatedDateUTC' ];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data[ 'createdDateUTC' ];
    }
}
