<?php
namespace XeroPHP\Models\PayrollAU\Payslip;

use XeroPHP\Remote;

class EarningsLine extends Remote\Object
{

    /**
     * Xero identifier for payroll earnings rate.
     *
     * @property string EarningsRateID
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
     * Earnings rate amount.  Only applicable if the EarningsRate RateType is Fixed
     *
     * @property float FixedAmount
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'EarningsLine';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'EarningsLine';
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
            'RatePerUnit' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'NumberOfUnits' => array (false, self::PROPERTY_TYPE_FLOAT, null, true, false),
            'FixedAmount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false)
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
     * @return EarningsLine
     */
    public function setEarningsRateID($value)
    {
        $this->propertyUpdated('EarningsRateID', $value);
        $this->_data['EarningsRateID'] = $value;
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
     * @return EarningsLine
     */
    public function setRatePerUnit($value)
    {
        $this->propertyUpdated('RatePerUnit', $value);
        $this->_data['RatePerUnit'] = $value;
        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getNumberOfUnits()
    {
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param float $value
     * @return EarningsLine
     */
    public function addNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        if(!isset($this->_data['NumberOfUnits'])){
            $this->_data['NumberOfUnits'] = new Remote\Collection();
        }
        $this->_data['NumberOfUnits'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getFixedAmount()
    {
        return $this->_data['FixedAmount'];
    }

    /**
     * @param float $value
     * @return EarningsLine
     */
    public function setFixedAmount($value)
    {
        $this->propertyUpdated('FixedAmount', $value);
        $this->_data['FixedAmount'] = $value;
        return $this;
    }


}
