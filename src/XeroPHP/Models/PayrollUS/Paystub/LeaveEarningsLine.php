<?php

namespace XeroPHP\Models\PayrollUS\Paystub;

use XeroPHP\Remote;

class LeaveEarningsLine extends Remote\Model
{
    /**
     * Xero identifier for payroll earnings type.
     *
     * @property string EarningsTypeID
     */

    /**
     * Rate per unit for earnings rate.
     *
     * @property float RatePerUnit
     */

    /**
     * Earnings rate number of units.
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
        return 'LeaveEarningsLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeaveEarningsLine';
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
            'RatePerUnit' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
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
    public function getEarningsTypeID()
    {
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     *
     * @return LeaveEarningsLine
     */
    public function setEarningsTypeID($value)
    {
        $this->propertyUpdated('EarningsTypeID', $value);
        $this->_data['EarningsTypeID'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getRatePerUnit()
    {
        return $this->_data['RatePerUnit'];
    }

    /**
     * @param float $value
     *
     * @return LeaveEarningsLine
     */
    public function setRatePerUnit($value)
    {
        $this->propertyUpdated('RatePerUnit', $value);
        $this->_data['RatePerUnit'] = $value;

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
     * @return LeaveEarningsLine
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
