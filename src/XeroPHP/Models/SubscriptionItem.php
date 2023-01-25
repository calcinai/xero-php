<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

/**
 * Property ref: https://developer.xero.com/documentation/api/xero-app-store/subscriptions/#get-subscription
 */
class SubscriptionItem extends Model {

    /**
     * The unique identifier for the subscription
     * 
     * @property int $id
     */

    /**
     * The price of the product subscribed to
     *
     * @property Price $price
     */

    /** 
     * Date when the subscription to this product will end
     *
     * @property string $endDate
     */    

    /**
     * Start date for the subscription to this item. Note: this may be in the future for downgrades or reduced number of seats that haven't taken effect yet
     * 
     * @property string $startDate
     */

    /**
     * Status of the subscription items the user is subscribed to
     * 
     * @property string $status
     */

    /**
     * The product subscribed to
     * 
     * @property Product $product
     */

    public static function getProperties()
    {
        return [
            'id' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'endDate' => [false, self::PROPERTY_TYPE_DATE, null, false, false],
            'startDate' => [true, self::PROPERTY_TYPE_DATE, null, false, false],
            'status' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'price' => [true, self::PROPERTY_TYPE_OBJECT, '\\Price', false, false],
            'product' => [true, self::PROPERTY_TYPE_OBJECT, '\\Product', false, false],
        ];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_data['id'];
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->_data['endDate'];
    }

    /**
     * @return string
     */
    public function getStartDate()
    {
        return $this->_data['startDate'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->data['status'];
    }

    /**
     * @return Price
     */
    public function getPrice()
    {
        return $this->_data['price'];
    }

    /**
     * @return Product
     */
    public function getProduct()
    {
        return $this->_data['product'];
    }

    public static function getGUIDProperty()
    {
        return 'id';
    }

    public static function getResourceURI()
    {
        return 'Subscriptions';
    }

    public static function isPageable()
    {
        return true;
    }

    public static function getSupportedMethods()
    {
        return [
            Request::METHOD_GET,
        ];
    }

    public static function getRootNodeName()
    {
        return 'Subscription';
    }

    public static function getAPIStem()
    {
        return URL::API_CORE;
    }
}
