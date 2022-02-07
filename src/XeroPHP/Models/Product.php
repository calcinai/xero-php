<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

class Product extends Model {

    /**
     * The unique identifier for the price
     * 
     * @property int $id
     */

    /**
     * The name of the product
     * 
     * @property string $name
     */

    /**
     * The currency of the pricing model of the product. FIXED, PER_SEAT
     * 
     * @property string $type
     */

    public static function getProperties()
    {
        return [
            'id' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'name' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'type' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
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
    public function getType()
    {
        return $this->_data['type'];
    }

    public static function getGUIDProperty()
    {
        return 'id';
    }

    public static function getResourceURI()
    {
        return 'Products';
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
        return 'Product';
    }

    public static function getAPIStem()
    {
        return URL::API_CORE;
    }
}
