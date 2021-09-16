<?php

namespace XeroPHP\Models\Accounting\Item;

use XeroPHP\Remote;

class Sale extends Remote\Model
{
    /**
     * Unit Price of the item. By default UnitPrice is rounded to two decimal places. You can use 4 decimal
     * places by adding the unitdp=4 querystring parameter to your request.
     *
     * @property float UnitPrice
     */

    /**
     * Default account code to be used for purchased/sale. Not applicable to the purchase details of
     * tracked items.
     *
     * @property string AccountCode
     */

    /**
     * Cost of goods sold account. Only applicable to the purchase details of tracked items.
     *
     * @property string COGSAccountCode
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     *
     * @deprecated
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Sales';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Sale';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
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
            'UnitPrice' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'COGSAccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return float
     */
    public function getUnitPrice()
    {
        return $this->_data['UnitPrice'];
    }

    /**
     * @param float $value
     *
     * @return Sale
     */
    public function setUnitPrice($value)
    {
        $this->propertyUpdated('UnitPrice', $value);
        $this->_data['UnitPrice'] = $value;

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
     * @return Sale
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
    public function getCOGSAccountCode()
    {
        return $this->_data['COGSAccountCode'];
    }

    /**
     * @param string $value
     *
     * @return Sale
     */
    public function setCOGSAccountCode($value)
    {
        $this->propertyUpdated('COGSAccountCode', $value);
        $this->_data['COGSAccountCode'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     *
     * @deprecated
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Sale
     *
     * @deprecated
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
    public function getTaxType()
    {
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     *
     * @return Sale
     */
    public function setTaxType($value)
    {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;

        return $this;
    }
}
