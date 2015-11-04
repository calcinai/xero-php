<?php
namespace XeroPHP\Models\Accounting\BankTransaction;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TrackingCategory;

class LineItem extends Remote\Object
{

    /**
     * Description needs to be at least 1 char long.
     *
     * @property string Description
     */

    /**
     * Quantity must be >= 0
     *
     * @property string Quantity
     */

    /**
     * Lineitem unit amount must be > 0. By default, unit amount will be rounded to two decimal places. You
     * can opt in to use four decimal places by adding the querystring parameter unitdp=4 to your query.
     * See the Rounding in Xero guide for more information.
     *
     * @property float UnitAmount
     */

    /**
     * AccountCode must be active for the organisation. See Accounts
     *
     * @property string AccountCode
     */

    /**
     * <ItemCode> can only be used when the Bank Transaction <Type> is SPEND or RECEIVE. If <Description>,
     * <UnitAmount> or <AccountCode> are not specified, then the defaults from the Item will be applied.
     *
     * @property string ItemCode
     */

    /**
     * The Xero generated identifier for a LineItem. If LineItemIDs are not included with line items in an
     * update request then the line items are deleted and recreated.
     *
     * @property string LineItemID
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * If you wish to omit either of the <Quantity> or <UnitAmount> you can provide a LineAmount and Xero
     * will calculate the missing amount for you
     *
     * @property float LineAmount
     */

    /**
     * Optional Tracking Category – see Tracking.  Any LineItem can have a maximum of 2
     * <TrackingCategory> elements.
     *
     * @property TrackingCategory[] Tracking
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LineItems';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LineItem';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LineItemID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return array(
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return array(
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Quantity' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'UnitAmount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'AccountCode' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'ItemCode' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'LineItemID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'TaxType' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false),
            'LineAmount' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Tracking' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true, false)
        );
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
    public function getAccountCode()
    {
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
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
    public function getItemCode()
    {
        return $this->_data['ItemCode'];
    }

    /**
     * @param string $value
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
    public function getLineItemID()
    {
        return $this->_data['LineItemID'];
    }

    /**
     * @param string $value
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
    public function getLineAmount()
    {
        return $this->_data['LineAmount'];
    }

    /**
     * @param float $value
     * @return LineItem
     */
    public function setLineAmount($value)
    {
        $this->propertyUpdated('LineAmount', $value);
        $this->_data['LineAmount'] = $value;
        return $this;
    }

    /**
     * @return TrackingCategory[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getTracking()
    {
        return $this->_data['Tracking'];
    }

    /**
     * @param TrackingCategory $value
     * @return LineItem
     */
    public function addTracking(TrackingCategory $value)
    {
        $this->propertyUpdated('Tracking', $value);
        if(!isset($this->_data['Tracking'])){
            $this->_data['Tracking'] = new Remote\Collection();
        }
        $this->_data['Tracking'][] = $value;
        return $this;
    }


}
