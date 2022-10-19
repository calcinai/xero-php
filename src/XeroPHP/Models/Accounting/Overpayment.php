<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\LineItem;
use XeroPHP\Models\Accounting\Overpayment\Allocation;

class Overpayment extends Remote\Model
{
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * This property has been removed from the Xero API.
     *
     * @property string Reference
     *
     * @deprecated
     */

    /**
     * See Overpayment Types.
     *
     * @property string Type
     */

    /**
     * See Contacts.
     *
     * @property Contact Contact
     */

    /**
     * The date the overpayment is created YYYY-MM-DD.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * See Overpayment Status Codes.
     *
     * @property string Status
     */

    /**
     * See Overpayment Line Amount Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * See Overpayment Line Items.
     *
     * @property LineItem[] LineItems
     */

    /**
     * The subtotal of the overpayment excluding taxes.
     *
     * @property float SubTotal
     */

    /**
     * The total tax on the overpayment.
     *
     * @property float TotalTax
     */

    /**
     * The total of the overpayment (subtotal + total tax).
     *
     * @property float Total
     */

    /**
     * UTC timestamp of last update to the overpayment.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * Currency used for the overpayment.
     *
     * @property string CurrencyCode
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property string FullyPaidOnDate
     *
     * @deprecated
     */

    /**
     * Xero generated unique identifier.
     *
     * @property string OverpaymentID
     */

    /**
     * The currency rate for a multicurrency overpayment. If no rate is specified, the XE.com day rate is
     * used.
     *
     * @property float CurrencyRate
     */

    /**
     * The remaining credit balance on the overpayment.
     *
     * @property string RemainingCredit
     */

    /**
     * See Allocations.
     *
     * @property Allocation[] Allocations
     */

    /**
     * See Payments.
     *
     * @property Payment[] Payments
     */

    /**
     * boolean to indicate if a overpayment has an attachment.
     *
     * @property bool HasAttachments
     */
    const TYPE_RECEIVE_OVERPAYMENT = 'RECEIVE-OVERPAYMENT';

    const TYPE_SPEND_OVERPAYMENT = 'SPEND-OVERPAYMENT';

    const OVERPAYMENT_STATUS_AUTHORISED = 'AUTHORISED';

    const OVERPAYMENT_STATUS_PAID = 'PAID';

    const OVERPAYMENT_STATUS_VOIDED = 'VOIDED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Overpayments';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Overpayment';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'OverpaymentID';
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
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Contact' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Contact', false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'LineItems' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\LineItem', true, false],
            'SubTotal' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TotalTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Total' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'CurrencyCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'FullyPaidOnDate' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'OverpaymentID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'RemainingCredit' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Allocations' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Overpayment\\Allocation', true, true],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
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
     *
     * @deprecated
     */
    public function getReference()
    {
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     *
     * @return Overpayment
     *
     * @deprecated
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
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @param float $value
     *
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
     */
    public function setCurrencyCode($value)
    {
        $this->propertyUpdated('CurrencyCode', $value);
        $this->_data['CurrencyCode'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getFullyPaidOnDate()
    {
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @param string $value
     *
     * @return Overpayment
     *
     * @deprecated
     */
    public function setFullyPaidOnDate($value)
    {
        $this->propertyUpdated('FullyPaidOnDate', $value);
        $this->_data['FullyPaidOnDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getOverpaymentID()
    {
        return $this->_data['OverpaymentID'];
    }

    /**
     * @param string $value
     *
     * @return Overpayment
     */
    public function setOverpaymentID($value)
    {
        $this->propertyUpdated('OverpaymentID', $value);
        $this->_data['OverpaymentID'] = $value;

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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Overpayment
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
     * @return Payment[]|Remote\Collection
     */
    public function getPayments()
    {
        return $this->_data['Payments'];
    }

    /**
     * @param Payment $value
     *
     * @return Overpayment
     */
    public function addPayment(Payment $value)
    {
        $this->propertyUpdated('Payments', $value);
        if (! isset($this->_data['Payments'])) {
            $this->_data['Payments'] = new Remote\Collection();
        }
        $this->_data['Payments'][] = $value;

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
