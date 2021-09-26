<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TrackingCategory;

class LineItem extends Remote\Model
{
    /**
     * The Xero generated identifier for a LineItem. If LineItemIDs are not included with line items in an
     * update request then the line items are deleted and recreated.
     *
     * @property string LineItemID
     */

    /**
     * Description needs to be at least 1 char long. A line item with just a description (i.e no unit
     * amount or quantity) can be created by specifying just a <Description> element that
     * contains at least 1 character.
     *
     * @property string Description
     */

    /**
     * LineItem Quantity (max length = 13).
     *
     * @property string Quantity
     */

    /**
     * Lineitem unit amount. By default, unit amount will be rounded to two decimal places. You can opt in
     * to use four decimal places by adding the querystring parameter unitdp=4 to your query. See the
     * Rounding in Xero guide for more information.
     *
     * @property float UnitAmount
     */

    /**
     * See Items.
     *
     * @property string ItemCode
     */

    /**
     * See Accounts.
     *
     * @property string AccountCode
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * The tax amount is auto calculated as a percentage of the LineAmount based on the tax
     * rate. This value can be overriden if the calculated <TaxAmount> is not correct.
     *
     * @property float TaxAmount
     */

    /**
     * The line amount reflects the discounted price if a DiscountRate has been used i.e LineAmount =
     * Quantity * Unit Amount * ((100 – DiscountRate)/100)  (can’t exceed 9,999,999,999.99).
     *
     * @property float LineAmount
     */

    /**
     * Optional Tracking Category – see Tracking. Any LineItem can have a maximum of 2 <TrackingCategory>
     * elements.
     *
     * @property TrackingCategory[] Tracking
     */

    /**
     * Percentage discount being applied to a line item (only supported on ACCREC invoices – ACC PAY
     * invoices and credit notes in Xero do not support discounts.
     *
     * @property string DiscountRate
     */

    /**
     * Discount amount being applied to a line item.
     *
     * @property float DiscountAmount
     */

    /**
     * The Xero identifier for a Repeating Invoice.
     *
     * @property string RepeatingInvoiceID
     */

    const TYPE_EXCLUSIVE = 'Exclusive';

    const TYPE_INCLUSIVE = 'Inclusive';

    const TYPE_NOTAX = 'NoTax';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LineItems';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LineItem';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LineItemID';
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
            'LineItemID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Quantity' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UnitAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'ItemCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TaxAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'LineAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Tracking' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true, false],
            'DiscountRate' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'DiscountAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'RepeatingInvoiceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuantity()
    {
        return $this->_data['Quantity'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setQuantity($value)
    {
        $this->propertyUpdated('Quantity', $value);
        $this->_data['Quantity'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getUnitAmount()
    {
        return $this->_data['UnitAmount'];
    }

    /**
     * @param float $value
     *
     * @return LineItem
     */
    public function setUnitAmount($value)
    {
        $this->propertyUpdated('UnitAmount', $value);
        $this->_data['UnitAmount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getItemCode()
    {
        return $this->_data['ItemCode'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setItemCode($value)
    {
        $this->propertyUpdated('ItemCode', $value);
        $this->_data['ItemCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode()
    {
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setAccountCode($value)
    {
        $this->propertyUpdated('AccountCode', $value);
        $this->_data['AccountCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLineItemID()
    {
        return $this->_data['LineItemID'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setLineItemID($value)
    {
        $this->propertyUpdated('LineItemID', $value);
        $this->_data['LineItemID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType()
    {
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setTaxType($value)
    {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->_data['TaxAmount'];
    }

    /**
     * @param float $value
     *
     * @return LineItem
     */
    public function setTaxAmount($value)
    {
        $this->propertyUpdated('TaxAmount', $value);
        $this->_data['TaxAmount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getLineAmount()
    {
        return $this->_data['LineAmount'];
    }

    /**
     * @param float $value
     *
     * @return LineItem
     */
    public function setLineAmount($value)
    {
        $this->propertyUpdated('LineAmount', $value);
        $this->_data['LineAmount'] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TrackingCategory[]
     */
    public function getTracking()
    {
        return $this->_data['Tracking'];
    }

    /**
     * @param TrackingCategory $value
     *
     * @return LineItem
     */
    public function addTracking(TrackingCategory $value)
    {
        $this->propertyUpdated('Tracking', $value);
        if (! isset($this->_data['Tracking'])) {
            $this->_data['Tracking'] = new Remote\Collection();
        }
        $this->_data['Tracking'][] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountRate()
    {
        return $this->_data['DiscountRate'];
    }

    /**
     * @param string $value
     *
     * @return LineItem
     */
    public function setDiscountRate($value)
    {
        $this->propertyUpdated('DiscountRate', $value);
        $this->_data['DiscountRate'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getDiscountAmount()
    {
        return $this->_data['DiscountAmount'];
    }

    /**
     * @param float $value
     *
     * @return LineItem
     */
    public function setDiscountAmount($value)
    {
        $this->propertyUpdated('DiscountAmount', $value);
        $this->_data['DiscountAmount'] = $value;

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
     * @return LineItem
     */
    public function setRepeatingInvoiceID($value)
    {
        $this->propertyUpdated('RepeatingInvoiceID', $value);
        $this->_data['RepeatingInvoiceID'] = $value;

        return $this;
    }
}
