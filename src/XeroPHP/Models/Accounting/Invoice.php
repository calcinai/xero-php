<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Invoice\LineItem;

class Invoice extends Remote\Object {

    /**
     * See Invoice Types
     *
     * @property string Type
     */

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * See LineItems
     *
     * @property LineItem[] LineItems
     */

    /**
     * Date invoice was issued – YYYY-MM-DD. Learn more
     *
     * @property \DateTime Date
     */

    /**
     * Date invoice is due – YYYY-MM-DD
     *
     * @property \DateTime DueDate
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types
     *
     * @property float[] LineAmountTypes
     */

    /**
     * ACCREC – Unique alpha numeric code identifying invoice (when missing will auto-generate from your
     * Organisation Invoice Settings)
     *
     * @property float InvoiceNumber
     */

    /**
     * ACCREC only – additional reference number
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes
     *
     * @property string BrandingThemeID
     */

    /**
     * URL link to a source document – shown as "Go to [appName]" in the Xero app
     *
     * @property string Url
     */

    /**
     * The currency that invoice has been raised in (see Currencies)
     *
     * @property string CurrencyCode
     */

    /**
     * The currency rate for a multicurrency invoice. If no rate is specified, the XE.com day rate is used.
     *
     * @property float CurrencyRate
     */

    /**
     * See Invoice Status Codes
     *
     * @property string Status
     */

    /**
     * Boolean to set whether the invoice in the Xero app should be marked as “sent”. This can be set
     * only on invoices that have been approved
     *
     * @property bool SentToContact
     */

    /**
     * Shown on sales invoices (Accounts Receivable) when this has been set
     *
     * @property string ExpectedPaymentDate
     */

    /**
     * Shown on bills (Accounts Payable) when this has been set
     *
     * @property string PlannedPaymentDate
     */

    /**
     * Total of invoice excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on invoice
     *
     * @property float TotalTax
     */

    /**
     * Total of Invoice tax inclusive (i.e. SubTotal + TotalTax). This will be ignored if it doesn’t
     * equal the sum of the LineAmounts
     *
     * @property float Total
     */

    /**
     * Total of discounts applied on the invoice line items
     *
     * @property float TotalDiscount
     */

    /**
     * Xero generated unique identifier for invoice
     *
     * @property string InvoiceID
     */

    /**
     * boolean to indicate if an invoice has an attachment
     *
     * @property bool HasAttachments
     */

    /**
     * See Payments
     *
     * @property Payment[] Payments
     */

    /**
     * See Prepayments
     *
     * @property Prepayment[] Prepayments
     */

    /**
     * See Overpayments
     *
     * @property Overpayment[] Overpayments
     */

    /**
     * Amount remaining to be paid on invoice
     *
     * @property float AmountDue
     */

    /**
     * Sum of payments received for invoice
     *
     * @property float AmountPaid
     */

    /**
     * The date the invoice was fully paid. Only returned on fully paid invoices
     *
     * @property \DateTime FullyPaidOnDate
     */

    /**
     * Sum of all credit notes, over-payments and pre-payments applied to invoice
     *
     * @property float AmountCredited
     */

    /**
     * Last modified date UTC format
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * Details of credit notes that have been applied to an invoice
     *
     * @property CreditNote[] CreditNotes
     */


    const INVOICE_TYPE_ACCPAY = 'ACCPAY';
    const INVOICE_TYPE_ACCREC = 'ACCREC';

    const INVOICE_STATUS_DRAFT      = 'DRAFT';
    const INVOICE_STATUS_SUBMITTED  = 'SUBMITTED';
    const INVOICE_STATUS_DELETED    = 'DELETED';
    const INVOICE_STATUS_AUTHORISED = 'AUTHORISED';
    const INVOICE_STATUS_PAID       = 'PAID';
    const INVOICE_STATUS_VOIDED     = 'VOIDED';

    const LINEAMOUNT_TYPE_EXCLUSIVE = 'Exclusive';
    const LINEAMOUNT_TYPE_INCLUSIVE = 'Inclusive';
    const LINEAMOUNT_TYPE_NOTAX     = 'NoTax';


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'Invoices';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'Invoice';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'InvoiceID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
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
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'Type' => array (true, self::PROPERTY_TYPE_ENUM, null, false),
            'Contact' => array (true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false),
            'LineItems' => array (true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Invoice\\LineItem', true),
            'Date' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'DueDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'LineAmountTypes' => array (false, self::PROPERTY_TYPE_FLOAT, null, true),
            'InvoiceNumber' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Reference' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'BrandingThemeID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'Url' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'CurrencyCode' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'CurrencyRate' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Status' => array (false, self::PROPERTY_TYPE_ENUM, null, false),
            'SentToContact' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false),
            'ExpectedPaymentDate' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'PlannedPaymentDate' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'SubTotal' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'TotalTax' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'Total' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'TotalDiscount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'InvoiceID' => array (false, self::PROPERTY_TYPE_STRING, null, false),
            'HasAttachments' => array (false, self::PROPERTY_TYPE_BOOLEAN, null, false),
            'Payments' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true),
            'Prepayments' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Prepayment', true),
            'Overpayments' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Overpayment', true),
            'AmountDue' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'AmountPaid' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'FullyPaidOnDate' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'AmountCredited' => array (false, self::PROPERTY_TYPE_FLOAT, null, false),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false),
            'CreditNotes' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\CreditNote', true)
        );
    }


    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setType($value){
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(){
        return $this->_data['Contact'];
    }

    /**
     * @param Contact $value
     * @return Invoice
     */
    public function setContact(Contact $value){
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return LineItem
     */
    public function getLineItems(){
        return $this->_data['LineItems'];
    }

    /**
     * @param LineItem[] $value
     * @return Invoice
     */
    public function addLineItem(LineItem $value){
        $this->propertyUpdated('LineItems', $value);
        $this->_data['LineItems'][] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setDate(\DateTime $value){
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(){
        return $this->_data['DueDate'];
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setDueDate(\DateTime $value){
        $this->propertyUpdated('DueDate', $value);
        $this->_data['DueDate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param float[] $value
     * @return Invoice
     */
    public function addLineAmountType($value){
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getInvoiceNumber(){
        return $this->_data['InvoiceNumber'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setInvoiceNumber($value){
        $this->propertyUpdated('InvoiceNumber', $value);
        $this->_data['InvoiceNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setReference($value){
        $this->propertyUpdated('Reference', $value);
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandingThemeID(){
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setBrandingThemeID($value){
        $this->propertyUpdated('BrandingThemeID', $value);
        $this->_data['BrandingThemeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setUrl($value){
        $this->propertyUpdated('Url', $value);
        $this->_data['Url'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(){
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setCurrencyCode($value){
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setCurrencyRate($value){
        $this->propertyUpdated('CurrencyRate', $value);
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setStatus($value){
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSentToContact(){
        return $this->_data['SentToContact'];
    }

    /**
     * @param bool $value
     * @return Invoice
     */
    public function setSentToContact($value){
        $this->propertyUpdated('SentToContact', $value);
        $this->_data['SentToContact'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedPaymentDate(){
        return $this->_data['ExpectedPaymentDate'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setExpectedPaymentDate($value){
        $this->propertyUpdated('ExpectedPaymentDate', $value);
        $this->_data['ExpectedPaymentDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlannedPaymentDate(){
        return $this->_data['PlannedPaymentDate'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setPlannedPaymentDate($value){
        $this->propertyUpdated('PlannedPaymentDate', $value);
        $this->_data['PlannedPaymentDate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getSubTotal(){
        return $this->_data['SubTotal'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setSubTotal($value){
        $this->propertyUpdated('SubTotal', $value);
        $this->_data['SubTotal'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax(){
        return $this->_data['TotalTax'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setTotalTax($value){
        $this->propertyUpdated('TotalTax', $value);
        $this->_data['TotalTax'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(){
        return $this->_data['Total'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setTotal($value){
        $this->propertyUpdated('Total', $value);
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalDiscount(){
        return $this->_data['TotalDiscount'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setTotalDiscount($value){
        $this->propertyUpdated('TotalDiscount', $value);
        $this->_data['TotalDiscount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceID(){
        return $this->_data['InvoiceID'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setInvoiceID($value){
        $this->propertyUpdated('InvoiceID', $value);
        $this->_data['InvoiceID'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool $value
     * @return Invoice
     */
    public function setHasAttachment($value){
        $this->propertyUpdated('HasAttachments', $value);
        $this->_data['HasAttachments'] = $value;
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayments(){
        return $this->_data['Payments'];
    }

    /**
     * @param Payment[] $value
     * @return Invoice
     */
    public function addPayment(Payment $value){
        $this->propertyUpdated('Payments', $value);
        $this->_data['Payments'][] = $value;
        return $this;
    }

    /**
     * @return Prepayment
     */
    public function getPrepayments(){
        return $this->_data['Prepayments'];
    }

    /**
     * @param Prepayment[] $value
     * @return Invoice
     */
    public function addPrepayment(Prepayment $value){
        $this->propertyUpdated('Prepayments', $value);
        $this->_data['Prepayments'][] = $value;
        return $this;
    }

    /**
     * @return Overpayment
     */
    public function getOverpayments(){
        return $this->_data['Overpayments'];
    }

    /**
     * @param Overpayment[] $value
     * @return Invoice
     */
    public function addOverpayment(Overpayment $value){
        $this->propertyUpdated('Overpayments', $value);
        $this->_data['Overpayments'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountDue(){
        return $this->_data['AmountDue'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setAmountDue($value){
        $this->propertyUpdated('AmountDue', $value);
        $this->_data['AmountDue'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountPaid(){
        return $this->_data['AmountPaid'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setAmountPaid($value){
        $this->propertyUpdated('AmountPaid', $value);
        $this->_data['AmountPaid'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFullyPaidOnDate(){
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setFullyPaidOnDate(\DateTime $value){
        $this->propertyUpdated('FullyPaidOnDate', $value);
        $this->_data['FullyPaidOnDate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountCredited(){
        return $this->_data['AmountCredited'];
    }

    /**
     * @param float $value
     * @return Invoice
     */
    public function setAmountCredited($value){
        $this->propertyUpdated('AmountCredited', $value);
        $this->_data['AmountCredited'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return Invoice
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return CreditNote
     */
    public function getCreditNotes(){
        return $this->_data['CreditNotes'];
    }

    /**
     * @param CreditNote[] $value
     * @return Invoice
     */
    public function addCreditNote(CreditNote $value){
        $this->propertyUpdated('CreditNotes', $value);
        $this->_data['CreditNotes'][] = $value;
        return $this;
    }


}