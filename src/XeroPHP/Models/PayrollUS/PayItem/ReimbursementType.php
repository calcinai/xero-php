<?php

namespace XeroPHP\Models\PayrollUS\PayItem;

use XeroPHP\Remote;

class ReimbursementType extends Remote\Model
{
    /**
     * Name of the reimbursement type (max length = 50).
     *
     * @property ReimbursementType ReimbursementType
     */

    /**
     * See Accounts.
     *
     * @property string ExpenseOrLiabilityAccountCode
     */

    /**
     * Xero identifier.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'ReimbursementTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'ReimbursementType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ReimbursementTypeID';
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
            'ReimbursementType' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollUS\\PayItem\\ReimbursementType', false, false],
            'ExpenseOrLiabilityAccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return ReimbursementType
     */
    public function getReimbursementType()
    {
        return $this->_data['ReimbursementType'];
    }

    /**
     * @param ReimbursementType $value
     *
     * @return ReimbursementType
     */
    public function setReimbursementType(self $value)
    {
        $this->propertyUpdated('ReimbursementType', $value);
        $this->_data['ReimbursementType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseOrLiabilityAccountCode()
    {
        return $this->_data['ExpenseOrLiabilityAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return ReimbursementType
     */
    public function setExpenseOrLiabilityAccountCode($value)
    {
        $this->propertyUpdated('ExpenseOrLiabilityAccountCode', $value);
        $this->_data['ExpenseOrLiabilityAccountCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReimbursementTypeID()
    {
        return $this->_data['ReimbursementTypeID'];
    }

    /**
     * @param string $value
     *
     * @return ReimbursementType
     */
    public function setReimbursementTypeID($value)
    {
        $this->propertyUpdated('ReimbursementTypeID', $value);
        $this->_data['ReimbursementTypeID'] = $value;

        return $this;
    }
}
