<?php
namespace XeroPHP\Models\PayrollAU\Timesheet;

use XeroPHP\Remote;

class TimesheetLine extends Remote\Object
{

    /**
     * The Xero identifier for an Earnings Rate
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
     * Number of units of a Timesheet line
     *
     * @property string NumberOfUnits
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TimesheetLines';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TimesheetLine';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return array(
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return array(
            'EarningsRateID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'TrackingItemID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'NumberOfUnits' => array (false, self::PROPERTY_TYPE_STRING, null, false, false)
        );
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
     * @return TimesheetLine
     */
    public function setTrackingItemID($value)
    {
        $this->propertyUpdated('TrackingItemID', $value);
        $this->_data['TrackingItemID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string $value
     * @return TimesheetLine
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        $this->_data['NumberOfUnits'] = $value;
        return $this;
    }


}
