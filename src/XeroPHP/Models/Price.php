<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

class Price extends Model {

    /**
     * The unique identifier for the price
     * 
     * @property int $id
     */

    /**
     * The net (before tax) amount of the price
     * 
     * @property int $amount
     */

    /**
     * The currency of the price
     * 
     * @property string $currency
     */

    public static function getProperties()
    {
        return [
            'id' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'amount' => [true, self::PROPERTY_TYPE_INT, null, false, false],
            'currency' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
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
     * @return int
     */
    public function getAmount()
    {
        return $this->_data['amount'];
    }

    /**
     * @return string
     */
    public function getCurrency()
    {
        return $this->_data['currency'];
    }

    public static function getGUIDProperty()
    {
        return 'id';
    }

    public static function getResourceURI()
    {
        return 'Prices';
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
        return 'Price';
    }

    public static function getAPIStem()
    {
        return URL::API_CORE;
    }
}
