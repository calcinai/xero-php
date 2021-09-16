<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;
use XeroPHP\Models\Accounting\RepeatingInvoice\Schedule;

class RepeatingInvoice extends Remote\Model
{
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * See Invoice Types.
     *
     * @property string Type
     */

    /**
     * See Contacts.
     *
     * @property Contact Contact
     */

    /**
     * See Schedule.
     *
     * @property Schedule Schedule
     */

    /**
     * See LineItems.
     *
     * @property LineItem[] LineItems
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * ACCREC only – additional reference number.
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes.
     *
     * @property string BrandingThemeID
     */

    /**
     * The currency that invoice has been raised in (see Currencies).
     *
     * @property string CurrencyCode
     */

    /**
     * One of the following : DRAFT or AUTHORISED – See Invoice Status Codes.
     *
     * @property string Status
     */

    /**
     * Total of invoice excluding taxes.
     *
     * @property float SubTotal
     */

    /**
     * Total tax on invoice.
     *
     * @property float TotalTax
     */

    /**
     * Total of Invoice tax inclusive (i.e. SubTotal + TotalTax).
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for repeating invoice template.
     *
     * @property string RepeatingInvoiceID
     */

    /**
     * boolean to indicate if an invoice has an attachment.
     *
     * @property bool HasAttachments
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'RepeatingInvoices';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'RepeatingInvoice';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'RepeatingInvoiceID';
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
            'Schedule' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\RepeatingInvoice\\Schedule', false, false],
            'LineItems' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'RepeatingInvoiceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return RepeatingInvoice
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
     * @return RepeatingInvoice
     */
    public function setContact(Contact $value)
    {
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;

        return $this;
    }

    /**
     * @return Schedule
     */
    public function getSchedule()
    {
        return $this->_data['Schedule'];
    }

    /**
     * @param Schedule $value
     *
     * @return RepeatingInvoice
     */
    public function setSchedule(Schedule $value)
    {
        $this->propertyUpdated('Schedule', $value);
        $this->_data['Schedule'] = $value;

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
     * @return RepeatingInvoice
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
     * @return string
     */
    public function getLineAmountTypes()
    {
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     *
     * @return RepeatingInvoice
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
    public function getReference()
    {
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     *
     * @return RepeatingInvoice
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
     * @return RepeatingInvoice
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
    public function getCurrencyCode()
    {
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     *
     * @return RepeatingInvoice
     */
    public function setCurrencyCode($value)
    {
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;

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
     * @return RepeatingInvoice
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

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
     * @param float $value
     *
     * @return RepeatingInvoice
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
     * @return RepeatingInvoice
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
     * @return RepeatingInvoice
     */
    public function setTotal($value)
    {
        $this->propertyUpdated('Total', $value);
        $this->_data['Total'] = $value;

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
     * @return RepeatingInvoice
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
     * @deprecated - this is a read only property and this method will be removed in future versions
     *
     * @param $value
     */
    public function setHasAttachment($value)
    {
    }
}
