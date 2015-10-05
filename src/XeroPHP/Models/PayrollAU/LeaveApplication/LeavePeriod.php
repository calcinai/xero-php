<?php
namespace XeroPHP\Models\PayrollAU\LeaveApplication;

use XeroPHP\Remote;

class LeavePeriod extends Remote\Object
{

    /**
     * The Number of Units for the leave
     *
     * @property string NumberOfUnits
     */

    /**
     * The Pay Period End Date (YYYY-MM-DD)
     *
     * @property \DateTime PayPeriodEndDate
     */

    /**
     * The Pay Period Start Date (YYYY-MM-DD)
     *
     * @property \DateTime PayPeriodStartDate
     */

    /**
     * See LeavePeriodStatus
     *
     * @property string LeavePeriodStatus
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LeavePeriod';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LeavePeriod';
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
            'NumberOfUnits' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'PayPeriodEndDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'PayPeriodStartDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'LeavePeriodStatus' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false)
        );
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
        return $this->_data['NumberOfUnits'];
    }

    /**
     * @param string $value
     * @return LeavePeriod
     */
    public function setNumberOfUnit($value)
    {
        $this->propertyUpdated('NumberOfUnits', $value);
        $this->_data['NumberOfUnits'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayPeriodEndDate()
    {
        return $this->_data['PayPeriodEndDate'];
    }

    /**
     * @param \DateTime $value
     * @return LeavePeriod
     */
    public function setPayPeriodEndDate(\DateTime $value)
    {
        $this->propertyUpdated('PayPeriodEndDate', $value);
        $this->_data['PayPeriodEndDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPayPeriodStartDate()
    {
        return $this->_data['PayPeriodStartDate'];
    }

    /**
     * @param \DateTime $value
     * @return LeavePeriod
     */
    public function setPayPeriodStartDate(\DateTime $value)
    {
        $this->propertyUpdated('PayPeriodStartDate', $value);
        $this->_data['PayPeriodStartDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeavePeriodStatus()
    {
        return $this->_data['LeavePeriodStatus'];
    }

    /**
     * @param string $value
     * @return LeavePeriod
     */
    public function setLeavePeriodStatus($value)
    {
        $this->propertyUpdated('LeavePeriodStatus', $value);
        $this->_data['LeavePeriodStatus'] = $value;
        return $this;
    }


}
