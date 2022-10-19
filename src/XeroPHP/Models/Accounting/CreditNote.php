<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\PDFTrait;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;
use XeroPHP\Models\Accounting\CreditNote\Allocation;

class CreditNote extends Remote\Model
{
    use PDFTrait;
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * See Credit Note Types.
     *
     * @property string Type
     */

    /**
     * See Contacts.
     *
     * @property Contact Contact
     */

    /**
     * The date the credit note is issued YYYY-MM-DD.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * See Credit Note Status Codes.
     *
     * @property string Status
     */

    /**
     * See Invoice Line Amount Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * See Invoice Line Items.
     *
     * @property LineItem[] LineItems
     */

    /**
     * The subtotal of the credit note excluding taxes.
     *
     * @property float SubTotal
     */

    /**
     * The total tax on the credit note.
     *
     * @property float TotalTax
     */

    /**
     * The total of the Credit Note(subtotal + total tax).
     *
     * @property float Total
     */

    /**
     * UTC timestamp of last update to the credit note.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * Currency used for the Credit Note.
     *
     * @property string CurrencyCode
     */

    /**
     * Date when credit note was fully paid(UTC format).
     *
     * @property \DateTimeInterface FullyPaidOnDate
     */

    /**
     * Xero generated unique identifier.
     *
     * @property string CreditNoteID
     */

    /**
     * ACCRECCREDIT – Unique alpha numeric code identifying credit note (when missing will auto-generate
     * from your Organisation Invoice Settings).
     *
     * @property string CreditNoteNumber
     */

    /**
     * ACCRECCREDIT only – additional reference number.
     *
     * @property string Reference
     */

    /**
     * boolean to indicate if a credit note has been sent to a contact via the Xero app (currently read
     * only).
     *
     * @property bool SentToContact
     */

    /**
     * The currency rate for a multicurrency invoice. If no rate is specified, the XE.com day rate is used.
     *
     * @property float CurrencyRate
     */

    /**
     * The remaining credit balance on the Credit Note.
     *
     * @property string RemainingCredit
     */

    /**
     * See Allocations.
     *
     * @property Allocation[] Allocations
     */

    /**
     * See BrandingThemes.
     *
     * @property string BrandingThemeID
     */

    /**
     * boolean to indicate if a credit note has an attachment.
     *
     * @property bool HasAttachments
     */
    const CREDIT_NOTE_TYPE_ACCPAYCREDIT = 'ACCPAYCREDIT';

    const CREDIT_NOTE_TYPE_ACCRECCREDIT = 'ACCRECCREDIT';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'CreditNotes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'CreditNote';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'CreditNoteID';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET,
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
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Contact' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LineItems' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FullyPaidOnDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'CreditNoteID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CreditNoteNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SentToContact' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'RemainingCredit' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Allocations' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\CreditNote\\Allocation', true, true],
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'AppliedAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false]
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
     * @return CreditNote
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
     * @return CreditNote
     */
    public function setContact(Contact $value)
    {
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;

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
     * @return CreditNote
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

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
     * @return CreditNote
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
    public function getLineAmountTypes()
    {
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     *
     * @return CreditNote
     */
    public function setLineAmountType($value)
    {
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'] = $value;

        return $this;
    }

    /**
     * @return LineItem[]|Remote\Collection
     */
    public function getLineItems()
    {
        return $this->_data['LineItems'];
    }

    /**
     * @param LineItem $value
     *
     * @return CreditNote
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
     * @return LineItem[]|Remote\Collection
     */
    public function getPayments()
    {
        return $this->_data['Payments'];
    }

    /**
     * @return float
     */
    public function getSubTotal()
    {
        return $this->_data['SubTotal'];
    }

    /**
     * @param float $value
     *
     * @return CreditNote
     */
    public function setSubTotal($value)
    {
        $this->propertyUpdated('SubTotal', $value);
        $this->_data['SubTotal'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax()
    {
        return $this->_data['TotalTax'];
    }

    /**
     * @param float $value
     *
     * @return CreditNote
     */
    public function setTotalTax($value)
    {
        $this->propertyUpdated('TotalTax', $value);
        $this->_data['TotalTax'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTotal()
    {
        return $this->_data['Total'];
    }

    /**
     * @param float $value
     *
     * @return CreditNote
     */
    public function setTotal($value)
    {
        $this->propertyUpdated('Total', $value);
        $this->_data['Total'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return CreditNote
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

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
     * @return CreditNote
     */
    public function setCurrencyCode($value)
    {
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getFullyPaidOnDate()
    {
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return CreditNote
     */
    public function setFullyPaidOnDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('FullyPaidOnDate', $value);
        $this->_data['FullyPaidOnDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditNoteID()
    {
        return $this->_data['CreditNoteID'];
    }

    /**
     * @param string $value
     *
     * @return CreditNote
     */
    public function setCreditNoteID($value)
    {
        $this->propertyUpdated('CreditNoteID', $value);
        $this->_data['CreditNoteID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getCreditNoteNumber()
    {
        return $this->_data['CreditNoteNumber'];
    }

    /**
     * @param string $value
     *
     * @return CreditNote
     */
    public function setCreditNoteNumber($value)
    {
        $this->propertyUpdated('CreditNoteNumber', $value);
        $this->_data['CreditNoteNumber'] = $value;

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
     * @return CreditNote
     */
    public function setReference($value)
    {
        $this->propertyUpdated('Reference', $value);
        $this->_data['Reference'] = $value;

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
     * @return CreditNote
     */
    public function setSentToContact($value)
    {
        $this->propertyUpdated('SentToContact', $value);
        $this->_data['SentToContact'] = $value;

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
     * @return CreditNote
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
    public function getRemainingCredit()
    {
        return $this->_data['RemainingCredit'];
    }

    /**
     * @param string $value
     *
     * @return CreditNote
     */
    public function setRemainingCredit($value)
    {
        $this->propertyUpdated('RemainingCredit', $value);
        $this->_data['RemainingCredit'] = $value;

        return $this;
    }

    /**
     * @return Allocation[]|Remote\Collection
     */
    public function getAllocations()
    {
        return $this->_data['Allocations'];
    }

    /**
     * @param Allocation $value
     *
     * @return CreditNote
     */
    public function addAllocation(Allocation $value)
    {
        $this->propertyUpdated('Allocations', $value);
        if (! isset($this->_data['Allocations'])) {
            $this->_data['Allocations'] = new Remote\Collection();
        }
        $this->_data['Allocations'][] = $value;

        return $this;
    }
    
    /**
     * @return float
     */
    public function getAppliedAmount()
    {
        return $this->_data['AppliedAmount'];
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
     * @return CreditNote
     */
    public function setBrandingThemeID($value)
    {
        $this->propertyUpdated('BrandingThemeID', $value);
        $this->_data['BrandingThemeID'] = $value;

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
     * @deprecated - this is a read only property and this method will be removed in future versions
     *
     * @param $value
     */
    public function setHasAttachment($value)
    {
    }
}
