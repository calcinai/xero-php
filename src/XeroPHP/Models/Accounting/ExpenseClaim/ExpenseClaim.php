<?php

namespace XeroPHP\Models\Accounting\ExpenseClaim;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Payment;

class ExpenseClaim extends Remote\Model
{
    /**
     * Xero generated unique identifier for an expense claim.
     *
     * @property string ExpenseClaimID
     */

    /**
     * See Payments.
     *
     * @property Payment[] Payments
     */

    /**
     * Current status of an expense claim – see status types.
     *
     * @property string Status
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * The total of an expense claim being paid.
     *
     * @property float Total
     */

    /**
     * The amount due to be paid for an expense claim.
     *
     * @property float AmountDue
     */

    /**
     * The amount still to pay for an expense claim.
     *
     * @property float AmountPaid
     */

    /**
     * The date when the expense claim is due to be paid YYYY-MM-DD.
     *
     * @property \DateTimeInterface PaymentDueDate
     */

    /**
     * The date the expense claim will be reported in Xero YYYY-MM-DD.
     *
     * @property \DateTimeInterface ReportingDate
     */

    /**
     * The Xero identifier for the Receipt e.g. e59a2c7f-1306-4078-a0f3-73537afcbba9.
     *
     * @property string ReceiptID
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'ExpenseClaim';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'ExpenseClaim';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ExpenseClaimID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
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
            'ExpenseClaimID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountDue' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountPaid' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'PaymentDueDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'ReportingDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'ReceiptID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getExpenseClaimID()
    {
        return $this->_data['ExpenseClaimID'];
    }

    /**
     * @param string $value
     *
     * @return ExpenseClaim
     */
    public function setExpenseClaimID($value)
    {
        $this->propertyUpdated('ExpenseClaimID', $value);
        $this->_data['ExpenseClaimID'] = $value;

        return $this;
    }

    /**
     * @return Payment[]|Remote\Collection
     */
    public function getPayments()
    {
        return $this->_data['Payments'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->_data['Total'];
    }

    /**
     * @return float
     */
    public function getAmountDue()
    {
        return $this->_data['AmountDue'];
    }

    /**
     * @return float
     */
    public function getAmountPaid()
    {
        return $this->_data['AmountPaid'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPaymentDueDate()
    {
        return $this->_data['PaymentDueDate'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getReportingDate()
    {
        return $this->_data['ReportingDate'];
    }

    /**
     * @return string
     */
    public function getReceiptID()
    {
        return $this->_data['ReceiptID'];
    }

    /**
     * @param string $value
     *
     * @return ExpenseClaim
     */
    public function setReceiptID($value)
    {
        $this->propertyUpdated('ReceiptID', $value);
        $this->_data['ReceiptID'] = $value;

        return $this;
    }
}
