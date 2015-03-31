<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Item\Purchase;
use XeroPHP\Models\Accounting\Organisation\Sale;

class Item extends Remote\Object {

    /**
     * User defined item code (max length = 30)
     *
     * @property string Code
     */

    /**
     * Description of item
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
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI(){
        return 'Items';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName(){
        return 'Item';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty(){
        return '';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods() {
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
    public static function getProperties() {
        return array(
            'Code' => array (true, self::PROPERTY_TYPE_STRING, null, false, false),
            'Description' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'PurchaseDetails' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Item\\Purchase', true, false),
            'SalesDetails' => array (false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Organisation\\Sale', true, false)
        );
    }


    /**
     * @return string
     */
    public function getCode() {
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setCode($value) {
        $this->propertyUpdated('Code', $value);
        $this->_data['Code'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setDescription($value) {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return Purchase[]
     */
    public function getPurchaseDetails() {
        return $this->_data['PurchaseDetails'];
    }

    /**
     * @param Purchase $value
     * @return Item
     */
    public function addPurchaseDetail(Purchase $value) {
        $this->propertyUpdated('PurchaseDetails', $value);
        $this->_data['PurchaseDetails'][] = $value;
        return $this;
    }

    /**
     * @return Sale[]
     */
    public function getSalesDetails() {
        return $this->_data['SalesDetails'];
    }

    /**
     * @param Sale $value
     * @return Item
     */
    public function addSalesDetail(Sale $value) {
        $this->propertyUpdated('SalesDetails', $value);
        $this->_data['SalesDetails'][] = $value;
        return $this;
    }


}