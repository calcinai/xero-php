<?php
namespace XeroPHP\Models\PayrollUK;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class EarningsRate extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    const EARNINGS_TYPE_REGULAR_EARNINGS = 'RegularEarnings';
    const RATE_TYPE_RATE_PER_UNIT = 'RatePerUnit';

    /**
     * Get the GUID Property if it exists
     *
     * @return string|null
     */
    public static function getGUIDProperty()
    {
        return 'earningsRateID';
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
        return 'earningsRates';
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
            'earningsRateID'   => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'expenseAccountID' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'name'             => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'earningsType'     => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'rateType'         => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'typeOfUnits'      => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'updatedDateUTC'   => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'createdDateUTC'   => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    /**
     * @return string
     */
    public function getExpenseAccountID()
    {
        return $this->_data[ 'expenseAccountID' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setExpenseAccountID(string $value)
    {
        $this->propertyUpdated('expenseAccountID', $value);
        $this->_data[ 'expenseAccountID' ] = $value;

        return $this;
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
    public function getRateType()
    {
        return $this->_data[ 'rateType' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setRateType(string $value)
    {
        $this->propertyUpdated('rateType', $value);
        $this->_data[ 'rateType' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsType()
    {
        return $this->_data[ 'earningsType' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setEarningsType(string $value)
    {
        $this->propertyUpdated('earningsType', $value);
        $this->_data[ 'earningsType' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTypeOfUnits()
    {
        return $this->_data[ 'typeOfUnits' ];
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setTypeOfUnit(string $value)
    {
        $this->propertyUpdated('typeOfUnits', $value);
        $this->_data[ 'typeOfUnits' ] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->getEarningsRateID();
    }

    /**
     * @return string
     */
    public function getEarningsRateID()
    {
        return $this->_data[ 'earningsRateID' ];
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
