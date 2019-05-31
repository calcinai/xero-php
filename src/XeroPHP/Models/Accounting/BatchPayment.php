<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\HistoryTrait;

class BatchPayment extends Remote\Model
{
    use HistoryTrait;

    /**
     *
     *
     * @property Invoice Invoice
     */

    /**
     *
     *
     * @property CreditNote CreditNote
     */

    /**
     *
     *
     * @property PreBatchPayment PreBatchPayment
     */

    /**
     *
     *
     * @property OverBatchPayment OverBatchPayment
     */

    /**
     *
     *
     * @property Account Account
     */

    /**
     * Date the BatchPayment is being made (YYYY-MM-DD) e.g. 2009-09-06
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Exchange rate when BatchPayment is received. Only used for non base currency invoices and credit notes
     * e.g. 0.7500
     *
     * @property float CurrencyRate
     */

    /**
     * The amount of the BatchPayment. Must be less than or equal to the outstanding amount owing on the invoice
     * e.g. 200.00
     *
     * @property float Amount
     */

    /**
     * An optional description for the BatchPayment e.g. Direct Debit
     *
     * @property string Reference
     */

    /**
     * An optional parameter for the BatchPayment. A boolean indicating whether you would like the BatchPayment to be
     * created as reconciled when using PUT, or whether a BatchPayment has been reconciled when using GET
     *
     * @property string IsReconciled
     */

    /**
     * The status of the BatchPayment.
     *
     * @property string Status
     */

    /**
     * See BatchPayment Types.
     *
     * @property string BatchPaymentType
     */

    /**
     * UTC timestamp of last update to the BatchPayment
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * The Xero identifier for an BatchPayment e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string BatchPaymentID
     */


    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BatchPayments';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BatchPayment';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'BatchPaymentID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        ];
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
        return [
            'Account' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Account', false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BatchPaymentID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TotalAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'IsReconciled' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }
}
