<?php

namespace XeroPHP\Models\PayrollAU\Timesheet;

use XeroPHP\Remote;

class TimesheetLine extends Remote\Model
{
    /**
     * The Xero identifier for an Earnings Rate.
     *
     * @property string EarningsRateID
     */

    /**
     * The Xero identifier for a Tracking Category <TrackingOptionID>. The <TrackingOptionID> must belong
     * to the TrackingCategory selected as <TimesheetCategories> under Payroll Settings.
     *
     * @property string TrackingItemID
     */

    /**
     * Number of units of a Timesheet line.
     *
     * @property float[] NumberOfUnits
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TimesheetLines';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TimesheetLine';
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
            'EarningsRateID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TrackingItemID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEarningsRateID()
    {
        return $this->_data['EarningsRateID'];
    }

    /**
     * @param string $value
     *
     * @return TimesheetLine
     */
    public function setEarningsRateID($value)
    {
        $this->propertyUpdated('EarningsRateID', $value);
        $this->_data['EarningsRateID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrackingItemID()
    {
        return $this->_data['TrackingItemID'];
    }

    /**
     * @param string $value
     *
     * @return TimesheetLine
     */
    public function setTrackingItemID($value)
    {
        $this->propertyUpdated('TrackingItemID', $value);
        $this->_data['TrackingItemID'] = $value;

        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param float $value
     *
     * @return TimesheetLine
     */
    public function addNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        if (! isset($this->_data['NumberOfUnits'])) {
            $this->_data['NumberOfUnits'] = new Remote\Collection();
        }
        $this->_data['NumberOfUnits'][] = $value;

        return $this;
    }
}
