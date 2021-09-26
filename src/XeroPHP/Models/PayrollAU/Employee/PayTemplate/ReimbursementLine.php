<?php

namespace XeroPHP\Models\PayrollAU\Employee\PayTemplate;

use XeroPHP\Remote;

class ReimbursementLine extends Remote\Model
{
    /**
     * Xero reimbursement type identifier.
     *
     * @property string ReimbursementTypeID
     */

    /**
     * The description of the reimbursement type.
     *
     * @property string Description
     */

    /**
     * The amount of the reimbursement type.
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
            'ReimbursementTypeID' => [false, self::PROPERTY_TYPE_GUID, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
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
