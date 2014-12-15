<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;


class TimeOffType extends Remote\Object {

    /**
     * Name of the time off type (max length = 50)
     *
     * @property string TimeOffType
     */

    /**
     * Select Unpaid Time Off to indicate that an employee will not get paid when taking this time off
     * type.
If Paid Time Off is selected the employee will get paid when taking this time off type and you
     * can accrue the liability on the Balance Sheet
     *
     * @property string TimeOffCategory
     */

    /**
     * The account to which the amount of the time off is to be debited. Only applies for TimeOffCategory
     * of PAIDTIMEOFF
     *
     * @property string ExpenseAccountCode
     */

    /**
     * The computed amount of the time off is credited to this account
     *
     * @property string LiabilityAccountCode
     */

    /**
     * Xero identifier
     *
     * @property string TimeOffTypeID
     */

    /**
     * Set it to true if you want the balance for this time off type to show on the employee’s paystub
     * and in the employee’s My Payroll account.
     *
     * @property string ShowBalanceToEmployee
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'TimeOffType';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'TimeOffTypeID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_PAYROLL;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
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
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'TimeOffType' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'TimeOffCategory' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'ExpenseAccountCode' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'LiabilityAccountCode' => array (true, self::PROPERTY_TYPE_STRING, null, false),
            'TimeOffTypeID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'ShowBalanceToEmployee' => array (false, self::PROPERTY_TYPE_STRING, null, false)
        );
    }


    /**
     * @return string
     */
    public function getTimeOffType(){
        return $this->_data['TimeOffType'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setTimeOffType($value){
        $this->_dirty['TimeOffType'] = $this->_data['TimeOffType'] != $value;
        $this->_data['TimeOffType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOffCategory(){
        return $this->_data['TimeOffCategory'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setTimeOffCategory($value){
        $this->_dirty['TimeOffCategory'] = $this->_data['TimeOffCategory'] != $value;
        $this->_data['TimeOffCategory'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccountCode(){
        return $this->_data['ExpenseAccountCode'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setExpenseAccountCode($value){
        $this->_dirty['ExpenseAccountCode'] = $this->_data['ExpenseAccountCode'] != $value;
        $this->_data['ExpenseAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLiabilityAccountCode(){
        return $this->_data['LiabilityAccountCode'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setLiabilityAccountCode($value){
        $this->_dirty['LiabilityAccountCode'] = $this->_data['LiabilityAccountCode'] != $value;
        $this->_data['LiabilityAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimeOffTypeID(){
        return $this->_data['TimeOffTypeID'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setTimeOffTypeID($value){
        $this->_dirty['TimeOffTypeID'] = $this->_data['TimeOffTypeID'] != $value;
        $this->_data['TimeOffTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getShowBalanceToEmployee(){
        return $this->_data['ShowBalanceToEmployee'];
    }

    /**
     * @param string $value
     * @return TimeOffType
     */
    public function setShowBalanceToEmployee($value){
        $this->_dirty['ShowBalanceToEmployee'] = $this->_data['ShowBalanceToEmployee'] != $value;
        $this->_data['ShowBalanceToEmployee'] = $value;
        return $this;
    }


}