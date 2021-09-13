<?php

namespace XeroPHP\Models\PayrollUS\Paystub;

use XeroPHP\Remote;

class ReimbursementLine extends Remote\Model
{
    /**
     * Xero identifier for payroll reimbursement type.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * Reimbursement lines description (max length 50).
     *
     * @property string Description
     */

    /**
     * Reimbursement expense account. For posted pay run you should be able to see expense account code.
     *
     * @property string ExpenseAccount
     */

    /**
     * Reimbursement amount.
     *
     * @property float Amount
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'ReimbursementLine';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'ReimbursementLine';
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
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExpenseAccount' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return ReimbursementLine
     */
    public function setReimbursementTypeID($value)
    {
        $this->propertyUpdated('ReimbursementTypeID', $value);
        $this->_data['ReimbursementTypeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return ReimbursementLine
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseAccount()
    {
        return $this->_data['ExpenseAccount'];
    }

    /**
     * @param string $value
     *
     * @return ReimbursementLine
     */
    public function setExpenseAccount($value)
    {
        $this->propertyUpdated('ExpenseAccount', $value);
        $this->_data['ExpenseAccount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return ReimbursementLine
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }
}
