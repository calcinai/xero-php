<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\PDFTrait;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Models\Accounting\LineItem;

class Quote extends Remote\Model
{
    use PDFTrait;
    use HistoryTrait;

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * Date quote was issued – YYYY-MM-DD
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Date quote expires – YYYY-MM-DD
     *
     * @property \DateTimeInterface ExpiryDate
     */

    /**
     * 	See Quote Status Codes
     *
     * @property string Status
     */

    /**
     * See Line Amount Types
     *
     * @property string LineAmountTypes
     */

    /**
     * See LineItems. The LineItems collection can contain any number of individual LineItem sub-elements.
     *
     * @property LineItem[] LineItems
     */

    /**
     * Total of quote excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on quote
     *
     * @property float TotalTax
     */

    /**
     * Total of Quote tax inclusive (i.e. SubTotal + TotalTax)
     *
     * @property float Total
     */

    /**
     * Total of discounts applied on the quote line items
     *
     * @property float TotalDiscount
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * The currency that quote has been raised in (see Currencies).
     *
     * @property string CurrencyCode
     */

    /**
     * The currency rate for a multicurrency quote
     *
     * @property float CurrencyRate
     */

    /**
     * Xero generated unique identifier for a quote
     *
     * @property string QuoteID
     */

    /**
     * Unique alpha numeric code identifying a quote
     *
     * @property string QuoteNumber
     */

    /**
     * Additional reference number
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes
     *
     * @property string BrandingThemeID
     */

    /**
     * The title of the quote
     *
     * @property string Title
     */

    /**
     * The summary of the quote
     *
     * @property string Summary
     */

    /**
     * The terms of the quote
     *
     * @property string Terms
     */

    const QUOTE_STATUS_DRAFT = 'DRAFT';

    const QUOTE_STATUS_DELETED = 'DELETED';

    const QUOTE_STATUS_SENT = 'SENT';

    const QUOTE_STATUS_DECLINED = 'DECLINED';

    const QUOTE_STATUS_ACCEPTED = 'ACCEPTED';

    const QUOTE_STATUS_INVOICED = 'INVOICED';

    /**
     * Get the resource URI of the class.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Quotes';
    }

    /**
     * Get the root node name. Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Quote';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'QuoteID';
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
            'Contact' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'ExpiryDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LineItems' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalDiscount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'QuoteID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'QuoteNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Title' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Summary' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Terms' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Url' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
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
     * @return Quote
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
     * @return Quote
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
    public function getExpiryDate()
    {
        return $this->_data['ExpiryDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Quote
     */
    public function setExpiryDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('ExpiryDate', $value);
        $this->_data['ExpiryDate'] = $value;

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
     * @return Quote
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
     * @return Quote
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
        if (! isset($this->_data['LineItems'])) {
            $this->_data['LineItems'] = new Remote\Collection();
        }

        return $this->_data['LineItems'];
    }

    /**
     * @param LineItem $value
     *
     * @return Quote
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
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
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
     * @return Quote
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
     * @return Quote
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
    public function getQuoteID()
    {
        return $this->_data['QuoteID'];
    }

    /**
     * @param string $value
     *
     * @return Quote
     */
    public function setQuoteID($value)
    {
        $this->propertyUpdated('QuoteID', $value);
        $this->_data['QuoteID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuoteNumber()
    {
        return $this->_data['QuoteNumber'];
    }

    /**
     * @param string $value
     *
     * @return Quote
     */
    public function setQuoteNumber($value)
    {
        $this->propertyUpdated('QuoteNumber', $value);
        $this->_data['QuoteNumber'] = $value;

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
     * @return Quote
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
     * @return Quote
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
    public function getTitle()
    {
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     *
     * @return Quote
     */
    public function setTitle($value)
    {
        $this->propertyUpdated('Title', $value);
        $this->_data['Title'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSummary()
    {
        return $this->_data['Summary'];
    }

    /**
     * @param string $value
     *
     * @return Quote
     */
    public function setSummary($value)
    {
        $this->propertyUpdated('Summary', $value);
        $this->_data['Summary'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTerms()
    {
        return $this->_data['Terms'];
    }

    /**
     * @param string $value
     *
     * @return Quote
     */
    public function setTerms($value)
    {
        $this->propertyUpdated('Terms', $value);
        $this->_data['Terms'] = $value;

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
     * @return Quote
     */
    public function setUrl($value)
    {
        $this->propertyUpdated('Url', $value);
        $this->_data['Url'] = $value;

        return $this;
    }
}
