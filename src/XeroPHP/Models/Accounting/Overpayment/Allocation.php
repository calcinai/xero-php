<?php

namespace XeroPHP\Models\Accounting\Overpayment;

use XeroPHP\Models\Accounting\Invoice;
use XeroPHP\Remote;

class Allocation extends Remote\Model
{
    /**
     * the invoice the overpayment is being allocated against.
     *
     * @property Invoice Invoice
     */

    /**
     * the amount being applied to the invoice.
     *
     * @property float AppliedAmount
     */

    /**
     * the date the overpayment is applied YYYY-MM-DD (read-only). This will be the latter of the invoice
     * date and the overpayment date.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     */
    public static function getResourceURI(): string
    {
        return 'Allocations';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     */
    public static function getRootNodeName(): string
    {
        return 'Allocation';
    }

    /**
     * Get the guid property.
     */
    public static function getGUIDProperty(): string
    {
        return '';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     */
    public static function getAPIStem(): string
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods(): array
    {
        return [];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     */
    public static function getProperties(): array
    {
        return [
            'Invoice'       => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Invoice', false, false],
            'AppliedAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Date'          => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
        ];
    }

    public static function isPageable(): bool
    {
        return false;
    }

    public function getInvoice(): Invoice
    {
        return $this->_data['Invoice'];
    }

    public function setInvoice(Invoice $value): static
    {
        $this->propertyUpdated('Invoice', $value);
        $this->_data['Invoice'] = $value;

        return $this;
    }

    public function getAppliedAmount(): float
    {
        return $this->_data['AppliedAmount'];
    }

    public function setAppliedAmount(float $value): static
    {
        $this->propertyUpdated('AppliedAmount', $value);
        $this->_data['AppliedAmount'] = $value;

        return $this;
    }

    public function getDate(): \DateTimeInterface
    {
        return $this->_data['Date'];
    }

    public function setDate(\DateTimeInterface $value): static
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }
}
