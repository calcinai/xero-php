<?php
namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class Payment extends Remote\Object
{

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
     * @property Prepayment Prepayment
     */

    /**
     * 
     *
     * @property Overpayment Overpayment
     */

    /**
     * 
     *
     * @property Account Account
     */

    /**
     * Date the payment is being made (YYYY-MM-DD) e.g. 2009-09-06
     *
     * @property \DateTime Date
     */

    /**
     * Exchange rate when payment is received. Only used for non base currency invoices and credit notes
     * e.g. 0.7500
     *
     * @property float CurrencyRate
     */

    /**
     * The amount of the payment. Must be less than or equal to the outstanding amount owing on the invoice
     * e.g. 200.00
     *
     * @property float Amount
     */

    /**
     * An optional description for the payment e.g. Direct Debit
     *
     * @property string Reference
     */

    /**
     * An optional parameter for the payment. A boolean indicating whether you would like the payment to be
     * created as reconciled when using PUT, or whether a payment has been reconciled when using GET
     *
     * @property string IsReconciled
     */

    /**
     * The status of the payment.
     *
     * @property string Status
     */

    /**
     * See Payment Types.
     *
     * @property string PaymentType
     */

    /**
     * UTC timestamp of last update to the payment
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * The Xero identifier for an Payment e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string PaymentID
     */


    const PAYMENT_STATUS_AUTHORISED = 'AUTHORISED';
    const PAYMENT_STATUS_DELETED    = 'DELETED';

    const PAYMENT_TERM_DAYSAFTERBILLDATE  = 'DAYSAFTERBILLDATE';
    const PAYMENT_TERM_DAYSAFTERBILLMONTH = 'DAYSAFTERBILLMONTH';
    const PAYMENT_TERM_OFCURRENTMONTH     = 'OFCURRENTMONTH';
    const PAYMENT_TERM_OFFOLLOWINGMONTH   = 'OFFOLLOWINGMONTH';

    const PAYMENT_TYPE_ACCRECPAYMENT        = 'ACCRECPAYMENT';
    const PAYMENT_TYPE_ACCPAYPAYMENT        = 'ACCPAYPAYMENT';
    const PAYMENT_TYPE_ARCREDITPAYMENT      = 'ARCREDITPAYMENT';
    const PAYMENT_TYPE_APCREDITPAYMENT      = 'APCREDITPAYMENT';
    const PAYMENT_TYPE_AROVERPAYMENTPAYMENT = 'AROVERPAYMENTPAYMENT';
    const PAYMENT_TYPE_ARPREPAYMENTPAYMENT  = 'ARPREPAYMENTPAYMENT';
    const PAYMENT_TYPE_APPREPAYMENTPAYMENT  = 'APPREPAYMENTPAYMENT';
    const PAYMENT_TYPE_APOVERPAYMENTPAYMENT = 'APOVERPAYMENTPAYMENT';


    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Payments';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Payment';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PaymentID';
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
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
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
            'Invoice' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Invoice', false, false),
            'CreditNote' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\CreditNote', false, false),
            'Prepayment' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Prepayment', false, false),
            'Overpayment' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Overpayment', false, false),
            'Account' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Account', false, false),
            'Date' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false),
            'CurrencyRate' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Amount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Reference' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'IsReconciled' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Status' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false),
            'PaymentType' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTime', false, false),
            'PaymentID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false)
        );
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->_data['Invoice'];
    }

    /**
     * @param Invoice $value
     * @return Payment
     */
    public function setInvoice(Invoice $value)
    {
        $this->propertyUpdated('Invoice', $value);
        $this->_data['Invoice'] = $value;
        return $this;
    }

    /**
     * @return CreditNote
     */
    public function getCreditNote()
    {
        return $this->_data['CreditNote'];
    }

    /**
     * @param CreditNote $value
     * @return Payment
     */
    public function setCreditNote(CreditNote $value)
    {
        $this->propertyUpdated('CreditNote', $value);
        $this->_data['CreditNote'] = $value;
        return $this;
    }

    /**
     * @return Prepayment
     */
    public function getPrepayment()
    {
        return $this->_data['Prepayment'];
    }

    /**
     * @param Prepayment $value
     * @return Payment
     */
    public function setPrepayment(Prepayment $value)
    {
        $this->propertyUpdated('Prepayment', $value);
        $this->_data['Prepayment'] = $value;
        return $this;
    }

    /**
     * @return Overpayment
     */
    public function getOverpayment()
    {
        return $this->_data['Overpayment'];
    }

    /**
     * @param Overpayment $value
     * @return Payment
     */
    public function setOverpayment(Overpayment $value)
    {
        $this->propertyUpdated('Overpayment', $value);
        $this->_data['Overpayment'] = $value;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->_data['Account'];
    }

    /**
     * @param Account $value
     * @return Payment
     */
    public function setAccount(Account $value)
    {
        $this->propertyUpdated('Account', $value);
        $this->_data['Account'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return Payment
     */
    public function setDate(\DateTime $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate()
    {
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param float $value
     * @return Payment
     */
    public function setCurrencyRate($value)
    {
        $this->propertyUpdated('CurrencyRate', $value);
        $this->_data['CurrencyRate'] = $value;
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
     * @return Payment
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setReference($value)
    {
        $this->propertyUpdated('Reference', $value);
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsReconciled()
    {
        return $this->_data['IsReconciled'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setIsReconciled($value)
    {
        $this->propertyUpdated('IsReconciled', $value);
        $this->_data['IsReconciled'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType()
    {
        return $this->_data['PaymentType'];
    }


    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }


    /**
     * @return string
     */
    public function getPaymentID()
    {
        return $this->_data['PaymentID'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setPaymentID($value)
    {
        $this->propertyUpdated('PaymentID', $value);
        $this->_data['PaymentID'] = $value;
        return $this;
    }


}
