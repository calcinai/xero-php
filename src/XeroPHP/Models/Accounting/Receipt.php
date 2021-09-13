<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;

class Receipt extends Remote\Model
{
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * Date of receipt – YYYY-MM-DD.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * See Contacts.
     *
     * @property Contact Contact
     */

    /**
     * See LineItems.
     *
     * @property LineItem[] LineItems
     */

    /**
     * The user in the organisation that the expense claim receipt is for. See Users.
     *
     * @property User User
     */

    /**
     * Additional reference number.
     *
     * @property string Reference
     */

    /**
     * See Line Amount Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * Total of receipt excluding taxes.
     *
     * @property float SubTotal
     */

    /**
     * Total tax on receipt.
     *
     * @property float TotalTax
     */

    /**
     * Total of receipt tax inclusive (i.e. SubTotal + TotalTax).
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for receipt.
     *
     * @property string ReceiptID
     */

    /**
     * Current status of receipt – see status types.
     *
     * @property string Status
     */

    /**
     * Xero generated sequence number for receipt in current claim for a given user.
     *
     * @property string ReceiptNumber
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * boolean to indicate if a receipt has an attachment.
     *
     * @property bool HasAttachments
     */

    /**
     * URL link to a source document – shown as “Go to [appName]” in the Xero app.
     *
     * @property string Url
     */
    const RECEIPT_STATUS_DRAFT = 'DRAFT';

    const RECEIPT_STATUS_SUBMITTED = 'SUBMITTED';

    const RECEIPT_STATUS_AUTHORISED = 'AUTHORISED';

    const RECEIPT_STATUS_DECLINED = 'DECLINED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Receipts';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Receipt';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ReceiptID';
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
            'Date' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Contact' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false, false],
            'LineItems' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'User' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\User', false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'ReceiptID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReceiptNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Url' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
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
     * @return Receipt
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

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
     * @return Receipt
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
     * @return Receipt
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
     * @return User
     */
    public function getUser()
    {
        return $this->_data['User'];
    }

    /**
     * @param User $value
     *
     * @return Receipt
     */
    public function setUser(User $value)
    {
        $this->propertyUpdated('User', $value);
        $this->_data['User'] = $value;

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
     * @return Receipt
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
    public function getLineAmountTypes()
    {
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     *
     * @return Receipt
     */
    public function setLineAmountType($value)
    {
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'] = $value;

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
     * @return Receipt
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
     * @return Receipt
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
     * @return Receipt
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
    public function getReceiptID()
    {
        return $this->_data['ReceiptID'];
    }

    /**
     * @param string $value
     *
     * @return Receipt
     */
    public function setReceiptID($value)
    {
        $this->propertyUpdated('ReceiptID', $value);
        $this->_data['ReceiptID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber()
    {
        return $this->_data['ReceiptNumber'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->_data['Url'];
    }
}
