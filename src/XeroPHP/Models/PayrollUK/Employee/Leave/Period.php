<?php

namespace XeroPHP\Models\PayrollUK\Employee\Leave;

use XeroPHP\Remote;
use XeroPHP\Traits\TitleCaseKeysBeforeSave;

class Period extends Remote\Model
{
    use TitleCaseKeysBeforeSave;

    /**
     * The Number of Units for the leave.
     *
     * @property string NumberOfUnits
     */

    /**
     * The Period End Date (YYYY-MM-DD).
     *
     * @property \DateTimeInterface PeriodEndDate
     */

    /**
     * The Period Start Date (YYYY-MM-DD).
     *
     * @property \DateTimeInterface PeriodStartDate
     */

    /**
     * See PeriodStatus.
     *
     * @property string PeriodStatus
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Period';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Period';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
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
            'numberOfUnits' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'periodEndDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'periodStartDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'periodStatus' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getNumberOfUnits()
    {
        return $this->_data['numberOfUnits'];
    }

    /**
     * @param string $value
     *
     * @return Period
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('numberOfUnits', $value);
        $this->_data['numberOfUnits'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodEndDate()
    {
        return $this->_data['periodEndDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Period
     */
    public function setPeriodEndDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('periodEndDate', $value);
        $this->_data['periodEndDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPeriodStartDate()
    {
        return $this->_data['periodStartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Period
     */
    public function setPeriodStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('periodStartDate', $value);
        $this->_data['periodStartDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeriodStatus()
    {
        return $this->_data['periodStatus'];
    }

    /**
     * @param string $value
     *
     * @return Period
     */
    public function setPeriodStatus($value)
    {
        $this->propertyUpdated('periodStatus', $value);
        $this->_data['periodStatus'] = $value;

        return $this;
    }
}
