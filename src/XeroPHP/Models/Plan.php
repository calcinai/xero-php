<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

/**
 * @property string $id The unique identifier for the plan
 * @property string $name The name of the plan, this will display as the plan name in the plan selection UI
 * @property string $status Status of the plan the user is subscribed to
 * @property SubscriptionItem[] $subscriptionItems List of the subscription items belongin got the plan. This will return all relevant items for the current billing period
 */
class Plan extends Model
{
    public static function getSupportedMethods()
    {
        return [
            Request::METHOD_GET,
        ];
    }

    public static function getGUIDProperty()
    {
        return 'id';
    }

    public static function getRootNodeName()
    {
        return 'Plan';
    }

    public static function getProperties()
    {
        return [
            'id' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'status' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'subscriptionItems' => [true, self::PROPERTY_TYPE_OBJECT, '\\SubscriptionItem', true, false]
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
    public function getName()
    {
        return $this->_data['name'];
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['status'];
    }

    /**
     * @return SubscriptionItem[]
     */
    public function getSubscriptionItems()
    {
        return $this->_data['subscription_items'];
    }

    public static function getResourceURI()
    {
        return 'Plans';
    }
    
    public static function isPageable()
    {
        return true;
    }

    public static function getAPIStem()
    {
        return URL::API_CORE;
    }
}
