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
     * The sales description of the item (max length = 4000)
     *
     * @property string Description
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
     * Last modified date in UTC format
     *
     * @property \DateTime UpdatedDateUTC
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
        return array(
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
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
            'ItemID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Code' => array (true, self::PROPERTY_TYPE_STRING, null, false, false),
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'PurchaseDetails' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Item\\Purchase', true, false),
            'SalesDetails' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Item\\Sale', true, false),
            'UpdatedDateUTC' => array (false, self::PROPERTY_TYPE_DATE, '\\DateTime', false, false)
        );
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
        if(!isset($this->_data['PurchaseDetails'])){
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
        if(!isset($this->_data['SalesDetails'])){
            $this->_data['SalesDetails'] = new Remote\Collection();
        }
        $this->_data['SalesDetails'][] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }



}
