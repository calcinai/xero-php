<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Exception;
use XeroPHP\Traits\PDFTrait;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\SendEmailTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;

/**
 * @property string $Type See Invoice Types.
 * @property Contact $Contact See Contacts.
 * @property LineItem[] $LineItems See LineItems.
 * @property \DateTimeInterface $Date Date invoice was issued – YYYY-MM-DD. Learn more.
 * @property \DateTimeInterface $DueDate Date invoice is due – YYYY-MM-DD.
 * @property string $LineAmountTypes Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount Types.
 * @property string $InvoiceNumber ACCREC – Unique alpha numeric code identifying invoice (when missing will auto-generate from your Organisation Invoice Settings) (max length = 255).
 * @property string $Reference ACCREC only – additional reference number (max length = 255).
 * @property string $BrandingThemeID See BrandingThemes.
 * @property string $Url URL link to a source document – shown as “Go to [appName]” in the Xero app.
 * @property string $CurrencyCode The currency that invoice has been raised in (see Currencies).
 * @property float $CurrencyRate The currency rate for a multicurrency invoice. If no rate is specified, the XE.com day rate is used. (max length = [18].[6]).
 * @property string $Status See Invoice Status Codes.
 * @property bool $SentToContact Boolean to set whether the invoice in the Xero app should be marked as “sent”. This can be set only on invoices that have been approved.
 * @property \DateTimeInterface $ExpectedPaymentDate Shown on sales invoices (Accounts Receivable) when this has been set.
 * @property \DateTimeInterface $PlannedPaymentDate Shown on bills (Accounts Payable) when this has been set.
 * @property float $SubTotal Total of invoice excluding taxes.
 * @property float $TotalTax Total tax on invoice.
 * @property float $Total Total of Invoice tax inclusive (i.e. SubTotal + TotalTax). This will be ignored if it doesn’t equal the sum of the LineAmounts.
 * @property float $TotalDiscount Total of discounts applied on the invoice line items.
 * @property string $InvoiceID Xero generated unique identifier for invoice.
 * @property string $RepeatingInvoiceID See RepeatingInvoices.
 * @property bool $HasAttachments boolean to indicate if an invoice has an attachment.
 * @property Payment[] $Payments See Payments.
 * @property Prepayment[] $Prepayments See Prepayments.
 * @property Overpayment[] $Overpayments See Overpayments.
 * @property float $AmountDue Amount remaining to be paid on invoice.
 * @property float $AmountPaid Sum of payments received for invoice.
 * @property \DateTimeInterface $FullyPaidOnDate The date the invoice was fully paid. Only returned on fully paid invoices.
 * @property float $AmountCredited Sum of all credit notes, over-payments and pre-payments applied to invoice.
 * @property \DateTimeInterface $UpdatedDateUTC Last modified date UTC format.
 * @property CreditNote[] $CreditNotes Details of credit notes that have been applied to an invoice.
 */
class Invoice extends Remote\Model
{
    use PDFTrait;
    use AttachmentTrait;
    use SendEmailTrait;
    use HistoryTrait;

    const INVOICE_TYPE_ACCPAY = 'ACCPAY';

    const INVOICE_TYPE_ACCREC = 'ACCREC';

    const INVOICE_STATUS_DRAFT = 'DRAFT';

    const INVOICE_STATUS_SUBMITTED = 'SUBMITTED';

    const INVOICE_STATUS_DELETED = 'DELETED';

    const INVOICE_STATUS_AUTHORISED = 'AUTHORISED';

    const INVOICE_STATUS_PAID = 'PAID';

    const INVOICE_STATUS_VOIDED = 'VOIDED';

    /**
     * @deprecated Use \XeroPHP\Models\Accounting\LineItem::TYPE_EXCLUSIVE instead.
     */
    const LINEAMOUNT_TYPE_EXCLUSIVE = 'Exclusive';

    /**
     * @deprecated Use \XeroPHP\Models\Accounting\LineItem::TYPE_INCLUSIVE instead.
     */
    const LINEAMOUNT_TYPE_INCLUSIVE = 'Inclusive';

    /**
     * @deprecated Use \XeroPHP\Models\Accounting\LineItem::TYPE_NOTAX instead.
     */
    const LINEAMOUNT_TYPE_NOTAX = 'NoTax';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Invoices';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Invoice';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'InvoiceID';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
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
            'Type' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Contact' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false, false],
            'LineItems' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'DueDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'InvoiceNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Url' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'SentToContact' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'ExpectedPaymentDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PlannedPaymentDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalDiscount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'InvoiceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'RepeatingInvoiceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
            'Prepayments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Prepayment', true, false],
            'Overpayments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Overpayment', true, false],
            'AmountDue' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountPaid' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'FullyPaidOnDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'AmountCredited' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'CreditNotes' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\CreditNote', true, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->_data['Contact'];
    }

    /**
     * @param Contact $value
     *
     * @return Invoice
     */
    public function setContact(Contact $value)
    {
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;

        return $this;
    }

    /**
     * @return LineItem[]|Remote\Collection
     */
    public function getLineItems()
    {
        if (! isset($this->_data['LineItems'])) {
            $this->_data['LineItems'] = new Remote\Collection();
        }

        return $this->_data['LineItems'];
    }

    /**
     * @param LineItem $value
     *
     * @return Invoice
     */
    public function addLineItem(LineItem $value)
    {
        $this->propertyUpdated('LineItems', $value);
        if (! isset($this->_data['LineItems'])) {
            $this->_data['LineItems'] = new Remote\Collection();
        }
        $this->_data['LineItems'][] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Invoice
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDueDate()
    {
        return $this->_data['DueDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Invoice
     */
    public function setDueDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('DueDate', $value);
        $this->_data['DueDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLineAmountTypes()
    {
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setLineAmountType($value)
    {
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getInvoiceNumber()
    {
        return $this->_data['InvoiceNumber'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setInvoiceNumber($value)
    {
        $this->propertyUpdated('InvoiceNumber', $value);
        $this->_data['InvoiceNumber'] = $value;

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
     *
     * @return Invoice
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
    public function getBrandingThemeID()
    {
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setBrandingThemeID($value)
    {
        $this->propertyUpdated('BrandingThemeID', $value);
        $this->_data['BrandingThemeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setUrl($value)
    {
        $this->propertyUpdated('Url', $value);
        $this->_data['Url'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode()
    {
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setCurrencyCode($value)
    {
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;

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
     *
     * @return Invoice
     */
    public function setCurrencyRate($value)
    {
        $this->propertyUpdated('CurrencyRate', $value);
        $this->_data['CurrencyRate'] = $value;

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
     *
     * @return Invoice
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSentToContact()
    {
        return $this->_data['SentToContact'];
    }

    /**
     * @param bool $value
     *
     * @return Invoice
     */
    public function setSentToContact($value)
    {
        $this->propertyUpdated('SentToContact', $value);
        $this->_data['SentToContact'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getExpectedPaymentDate()
    {
        return $this->_data['ExpectedPaymentDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Invoice
     */
    public function setExpectedPaymentDate($value)
    {
        $this->propertyUpdated('ExpectedPaymentDate', $value);
        $this->_data['ExpectedPaymentDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getPlannedPaymentDate()
    {
        return $this->_data['PlannedPaymentDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Invoice
     */
    public function setPlannedPaymentDate($value)
    {
        $this->propertyUpdated('PlannedPaymentDate', $value);
        $this->_data['PlannedPaymentDate'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getSubTotal()
    {
        return $this->_data['SubTotal'];
    }

    /**
     * @return float
     */
    public function getTotalTax()
    {
        return $this->_data['TotalTax'];
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
    public function getTotalDiscount()
    {
        return $this->_data['TotalDiscount'];
    }

    /**
     * @return string
     */
    public function getInvoiceID()
    {
        return $this->_data['InvoiceID'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setInvoiceID($value)
    {
        $this->propertyUpdated('InvoiceID', $value);
        $this->_data['InvoiceID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRepeatingInvoiceID()
    {
        return $this->_data['RepeatingInvoiceID'];
    }

    /**
     * @param string $value
     *
     * @return Invoice
     */
    public function setRepeatingInvoiceID($value)
    {
        $this->propertyUpdated('RepeatingInvoiceID', $value);
        $this->_data['RepeatingInvoiceID'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return Payment[]|Remote\Collection
     */
    public function getPayments()
    {
        return $this->_data['Payments'];
    }

    /**
     * @return Prepayment[]|Remote\Collection
     */
    public function getPrepayments()
    {
        return $this->_data['Prepayments'];
    }

    /**
     * @return Overpayment[]|Remote\Collection
     */
    public function getOverpayments()
    {
        return $this->_data['Overpayments'];
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
    public function getFullyPaidOnDate()
    {
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @return float
     */
    public function getAmountCredited()
    {
        return $this->_data['AmountCredited'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @return CreditNote[]|Remote\Collection
     */
    public function getCreditNotes()
    {
        return $this->_data['CreditNotes'];
    }

    /**
     * Retrieve the online invoice URL.
     *
     * @throws \XeroPHP\Exception
     *
     * @return string
     */
    public function getOnlineInvoiceUrl()
    {
        if (! $this->hasGUID()) {
            throw new Exception('Unable to retrieve the online invoice URL as the invoice has no GUID');
        }

        return $this->onlineInvoiceRequest()
            ->send()
            ->getElements()[0]['OnlineInvoiceUrl'];
    }

    /**
     * Build the online invoice request object.
     *
     * @return \XeroPHP\Remote\Request
     */
    protected function onlineInvoiceRequest()
    {
        return new Remote\Request(
            $this->_application,
            $this->onlineInvoiceRemoteUrl()
        );
    }

    /**
     * Build the online invoice URL object.
     *
     * @return \XeroPHP\Remote\URL
     */
    protected function onlineInvoiceRemoteUrl()
    {
        return new Remote\URL(
            $this->_application,
            'Invoices/'.$this->getGUID().'/OnlineInvoice'
        );
    }
}
