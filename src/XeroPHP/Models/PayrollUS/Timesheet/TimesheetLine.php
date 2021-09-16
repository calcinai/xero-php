<?php

namespace XeroPHP\Models\PayrollUS\Timesheet;

use XeroPHP\Remote;

class TimesheetLine extends Remote\Model
{
    /**
     * The Xero identifier for an Earnings Type.
     *
     * @property string EarningsTypeID
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
     * The Xero identifier for a Work Location, which must have been added for this employee under Payroll
     * -> Employees -> Employment.
     *
     * @property string WorkLocationID
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
            'EarningsTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TrackingItemID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NumberOfUnits' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'WorkLocationID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID()
    {
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     *
     * @return TimesheetLine
     */
    public function setEarningsTypeID($value)
    {
        $this->propertyUpdated('EarningsTypeID', $value);
        $this->_data['EarningsTypeID'] = $value;

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

    /**
     * @return string
     */
    public function getWorkLocationID()
    {
        return $this->_data['WorkLocationID'];
    }

    /**
     * @param string $value
     *
     * @return TimesheetLine
     */
    public function setWorkLocationID($value)
    {
        $this->propertyUpdated('WorkLocationID', $value);
        $this->_data['WorkLocationID'] = $value;

        return $this;
    }
}
