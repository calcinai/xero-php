<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\PDFTrait;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;

class PurchaseOrder extends Remote\Model
{
    use PDFTrait;
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * The PurchaseOrders endpoint does not create new contacts. You need to provide the ContactID or
     * ContactNumber of an existing contact. For more information on creating contacts see Contacts.
     *
     * @property Contact Contact
     */

    /**
     * See LineItems.
     *
     * @property LineItem[] LineItems
     */

    /**
     * Date purchase order was issued – YYYY-MM-DD. Learn more.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Date the goods are to be delivered – YYYY-MM-DD.
     *
     * @property \DateTimeInterface DeliveryDate
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * Unique alpha numeric code identifying purchase order (when missing will auto-generate from your
     * Organisation Invoice Settings).
     *
     * @property string PurchaseOrderNumber
     */

    /**
     * Additional reference number.
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes.
     *
     * @property string BrandingThemeID
     */

    /**
     * The currency that purchase order has been raised in (see Currencies).
     *
     * @property string CurrencyCode
     */

    /**
     * See Purchase Order Status Codes.
     *
     * @property string Status
     */

    /**
     * Boolean to set whether the purchase order should be marked as “sent”. This can be set only on
     * purchase orders that have been approved or billed.
     *
     * @property bool SentToContact
     */

    /**
     * The address the goods are to be delivered to.
     *
     * @property string DeliveryAddress
     */

    /**
     * The person that the delivery is going to.
     *
     * @property string AttentionTo
     */

    /**
     * The phone number for the person accepting the delivery.
     *
     * @property string Telephone
     */

    /**
     * A free text feild for instructions (500 characters max).
     *
     * @property string DeliveryInstructions
     */

    /**
     * The date the goods are expected to arrive.
     *
     * @property \DateTimeInterface ExpectedArrivalDate
     */

    /**
     * Xero generated unique identifier for purchase order.
     *
     * @property string PurchaseOrderID
     */

    /**
     * The currency rate for a multicurrency purchase order. As no rate can be specified, the XE.com day
     * rate is used.
     *
     * @property float CurrencyRate
     */

    /**
     * Total of purchase order excluding taxes.
     *
     * @property float SubTotal
     */

    /**
     * Total tax on purchase order.
     *
     * @property float TotalTax
     */

    /**
     * Total of Purchase Order tax inclusive (i.e. SubTotal + TotalTax).
     *
     * @property float Total
     */

    /**
     * Total of discounts applied on the purchase order line items.
     *
     * @property float TotalDiscount
     */

    /**
     * boolean to indicate if a purchase order has an attachment.
     *
     * @property bool HasAttachments
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */
    const PURCHASE_ORDER_STATUS_DRAFT = 'DRAFT';

    const PURCHASE_ORDER_STATUS_SUBMITTED = 'SUBMITTED';

    const PURCHASE_ORDER_STATUS_AUTHORISED = 'AUTHORISED';

    const PURCHASE_ORDER_STATUS_BILLED = 'BILLED';

    const PURCHASE_ORDER_STATUS_DELETED = 'DELETED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PurchaseOrders';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PurchaseOrder';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PurchaseOrderID';
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
            'LineItems' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'DeliveryDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'PurchaseOrderNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BrandingThemeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'SentToContact' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'DeliveryAddress' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AttentionTo' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Telephone' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'DeliveryInstructions' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ExpectedArrivalDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'PurchaseOrderID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalDiscount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
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
     * @return PurchaseOrder
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
        return $this->_data['LineItems'];
    }

    /**
     * @param LineItem $value
     *
     * @return PurchaseOrder
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
     * @return PurchaseOrder
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
    public function getDeliveryDate()
    {
        return $this->_data['DeliveryDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PurchaseOrder
     */
    public function setDeliveryDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('DeliveryDate', $value);
        $this->_data['DeliveryDate'] = $value;

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
     * @return PurchaseOrder
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
    public function getPurchaseOrderNumber()
    {
        return $this->_data['PurchaseOrderNumber'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setPurchaseOrderNumber($value)
    {
        $this->propertyUpdated('PurchaseOrderNumber', $value);
        $this->_data['PurchaseOrderNumber'] = $value;

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
     * @return PurchaseOrder
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
     * @return PurchaseOrder
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
     * @return PurchaseOrder
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
     * @return PurchaseOrder
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
     * @return PurchaseOrder
     */
    public function setSentToContact($value)
    {
        $this->propertyUpdated('SentToContact', $value);
        $this->_data['SentToContact'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryAddress()
    {
        return $this->_data['DeliveryAddress'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setDeliveryAddress($value)
    {
        $this->propertyUpdated('DeliveryAddress', $value);
        $this->_data['DeliveryAddress'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttentionTo()
    {
        return $this->_data['AttentionTo'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setAttentionTo($value)
    {
        $this->propertyUpdated('AttentionTo', $value);
        $this->_data['AttentionTo'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->_data['Telephone'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setTelephone($value)
    {
        $this->propertyUpdated('Telephone', $value);
        $this->_data['Telephone'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDeliveryInstructions()
    {
        return $this->_data['DeliveryInstructions'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setDeliveryInstruction($value)
    {
        $this->propertyUpdated('DeliveryInstructions', $value);
        $this->_data['DeliveryInstructions'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getExpectedArrivalDate()
    {
        return $this->_data['ExpectedArrivalDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return PurchaseOrder
     */
    public function setExpectedArrivalDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('ExpectedArrivalDate', $value);
        $this->_data['ExpectedArrivalDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseOrderID()
    {
        return $this->_data['PurchaseOrderID'];
    }

    /**
     * @param string $value
     *
     * @return PurchaseOrder
     */
    public function setPurchaseOrderID($value)
    {
        $this->propertyUpdated('PurchaseOrderID', $value);
        $this->_data['PurchaseOrderID'] = $value;

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
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }
}
