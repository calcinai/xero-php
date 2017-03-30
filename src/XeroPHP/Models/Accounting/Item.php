<?php
namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Item\Purchase;
use XeroPHP\Models\Accounting\Item\Sale;

class Item extends Remote\Object
{

    /**
     * Xero identifier
     *
     * @property string ItemID
     */

    /**
     * User defined item code (max length = 30)
     *
     * @property string Code
     */

    /**
     * The inventory asset account for the item. The account must be of type INVENTORY. The 
     * COGSAccountCode in PurchaseDetails is also required to create a tracked item
     *
     * @property string InventoryAssetAccountCode
     */

    /**
     * The name of the item (max length = 50)
     *
     * @property string Name
     */

    /**
     * Boolean value, defaults to true. When IsSold is true the item will be available on sales
     * transactions in the Xero UI. If IsSold is updated to false then Description and SalesDetails values
     * will be nulled.
     *
     * @property bool IsSold
     */

    /**
     * Boolean value, defaults to true. When IsPurchased is true the item is available for purchase
     * transactions in the Xero UI. If IsPurchased is updated to false then PurchaseDescription and
     * PurchaseDetails values will be nulled.
     *
     * @property bool IsPurchased
     */

    /**
     * The sales description of the item (max length = 4000)
     *
     * @property string Description
     */

    /**
     * The purchase description of the item (max length = 4000)
     *
     * @property string PurchaseDescription
     */

    /**
     * See Purchases & Sales
     *
     * @property Purchase[] PurchaseDetails
     */

    /**
     * See Purchases & Sales
     *
     * @property Sale[] SalesDetails
     */

    /**
     * True for items that are tracked as inventory. An item will be tracked as inventory if the
     * InventoryAssetAccountCode and COGSAccountCode are set.
     *
     * @property bool IsTrackedAsInventory
     */

    /**
     * The value of the item on hand. Calculated using average cost accounting.
     *
     * @property string TotalCostPool
     */

    /**
     * The quantity of the item on hand
     *
     * @property string QuantityOnHand
     */

    /**
     * Last modified date in UTC format
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Items';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Item';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ItemID';
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
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE
        ];
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
        return [
            'ItemID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Code' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'InventoryAssetAccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsSold' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'IsPurchased' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PurchaseDescription' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PurchaseDetails' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Item\\Purchase', true, false],
            'SalesDetails' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Item\\Sale', true, false],
            'IsTrackedAsInventory' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'TotalCostPool' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'QuantityOnHand' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getItemID()
    {
        return $this->_data['ItemID'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setItemID($value)
    {
        $this->propertyUpdated('ItemID', $value);
        $this->_data['ItemID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setCode($value)
    {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInventoryAssetAccountCode()
    {
        return $this->_data['InventoryAssetAccountCode'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setInventoryAssetAccountCode($value)
    {
        $this->propertyUpdated('InventoryAssetAccountCode', $value);
        $this->_data['InventoryAssetAccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsSold()
    {
        return $this->_data['IsSold'];
    }

    /**
     * @param bool $value
     * @return Item
     */
    public function setIsSold($value)
    {
        $this->propertyUpdated('IsSold', $value);
        $this->_data['IsSold'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPurchased()
    {
        return $this->_data['IsPurchased'];
    }

    /**
     * @param bool $value
     * @return Item
     */
    public function setIsPurchased($value)
    {
        $this->propertyUpdated('IsPurchased', $value);
        $this->_data['IsPurchased'] = $value;
        return $this;
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
     * @return Item
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
    public function getPurchaseDescription()
    {
        return $this->_data['PurchaseDescription'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setPurchaseDescription($value)
    {
        $this->propertyUpdated('PurchaseDescription', $value);
        $this->_data['PurchaseDescription'] = $value;
        return $this;
    }

    /**
     * @return Purchase[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getPurchaseDetails()
    {
        return $this->_data['PurchaseDetails'];
    }

    /**
     * @param Purchase $value
     * @return Item
     */
    public function addPurchaseDetail(Purchase $value)
    {
        $this->propertyUpdated('PurchaseDetails', $value);
        if (!isset($this->_data['PurchaseDetails'])) {
            $this->_data['PurchaseDetails'] = new Remote\Collection();
        }
        $this->_data['PurchaseDetails'][] = $value;
        return $this;
    }

    /**
     * @return Sale[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getSalesDetails()
    {
        return $this->_data['SalesDetails'];
    }

    /**
     * @param Sale $value
     * @return Item
     */
    public function addSalesDetail(Sale $value)
    {
        $this->propertyUpdated('SalesDetails', $value);
        if (!isset($this->_data['SalesDetails'])) {
            $this->_data['SalesDetails'] = new Remote\Collection();
        }
        $this->_data['SalesDetails'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsTrackedAsInventory()
    {
        return $this->_data['IsTrackedAsInventory'];
    }

    /**
     * @param bool $value
     * @return Item
     */
    public function setIsTrackedAsInventory($value)
    {
        $this->propertyUpdated('IsTrackedAsInventory', $value);
        $this->_data['IsTrackedAsInventory'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalCostPool()
    {
        return $this->_data['TotalCostPool'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setTotalCostPool($value)
    {
        $this->propertyUpdated('TotalCostPool', $value);
        $this->_data['TotalCostPool'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantityOnHand()
    {
        return $this->_data['QuantityOnHand'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setQuantityOnHand($value)
    {
        $this->propertyUpdated('QuantityOnHand', $value);
        $this->_data['QuantityOnHand'] = $value;
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
     * @return Item
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }


}
