<?php

namespace XeroPHP\Remote;

use XeroPHP\Exception;

/**
 * Class Object
 * @package XeroPHP\Remote
 */
class Object {

    /**
     * Keys for the meta properties array
     */
    const KEY_MANDATORY      = 0;
    const KEY_TYPE           = 1;
    const KEY_PHP_TYPE       = 2;
    const KEY_IS_ARRAY       = 3;
    const KEY_SAVE_DIRECTLY  = 4;

    /**
     *
     */
    const PROPERTY_TYPE_STRING  = 'string';
    const PROPERTY_TYPE_INT     = 'int';
    const PROPERTY_TYPE_FLOAT   = 'float';
    const PROPERTY_TYPE_BOOLEAN = 'bool';
    const PROPERTY_TYPE_ENUM    = 'enum';
    const PROPERTY_TYPE_GUID    = 'guid';
    const PROPERTY_TYPE_DATE    = 'date';
    const PROPERTY_TYPE_OBJECT  = 'object';


    public function __construct() {
        $this->_dirty = array();
        $this->_data = array();
    }

    /**
     * Container to the actual properties of the object
     *
     * @var array
     */
    protected $_data;

    /**
     * Holds a record of which properties have been changed
     *
     * @var array
     */
    protected $_dirty;

    /**
     * If there have been any properties changed since load
     *
     * @return bool
     */
    public function isDirty($property = null) {
        if($property === null)
            return count($this->_dirty) > 0;
        else
            return isset($this->_dirty[$property]);
    }

    public function setClean($property = null) {
        if($property === null)
            $this->_dirty = array();
        else
            unset($this->_dirty[$property]);

    }

    /**
     * This is used to detect if the object has copy at the source
     *
     * @return bool
     */
    public function hasGUID() {
        return isset($this->_data[static::getGUIDProperty()]);
    }

    /**
     *
     * @return string
     */
    public function getGUID() {
        return $this->_data[static::getGUIDProperty()];
    }


    public function setGUID($guid) {
        $this->_data[static::getGUIDProperty()] = $guid;
        return $this;
    }

    /**
     * Load an assoc array into the instance of the object $property => $value
     * $replace_data - replace existing data
     *
     * @param $input_array
     * @param $replace_data
     * @return Object
     */
    public function fromStringArray($input_array, $replace_data = false) {

        foreach(static::getProperties() as $property => $meta) {
            $type = $meta[self::KEY_TYPE];
            $php_type = $meta[self::KEY_PHP_TYPE];

            //If set and NOT replace data, continue
            if(!$replace_data && isset($this->_data[$property]))
                continue;

            if(!isset($input_array[$property]))
                continue;

            if(is_array($input_array[$property])) {
                $this->_data[$property] = array();
                foreach($input_array[$property] as $assoc_element) {
                    $this->_data[$property][] = self::castFromString($type, $assoc_element, $php_type);
                }
            } else {
                $this->_data[$property] = self::castFromString($type, $input_array[$property], $php_type);
            }
        }
    }

    /**
     * Convert the object into an array, and any non-primitives to string.
     *
     * @return array
     */
    public function toStringArray() {
        $out = array();
        foreach(static::getProperties() as $property => $meta) {

            if(!isset($this->_data[$property]))
                continue;

            $type = $meta[self::KEY_TYPE];

            if(is_array($this->_data[$property])) {
                $out[$property] = array();
                foreach($this->_data[$property] as $assoc_property) {
                    $out[$property][] = self::castToString($type, $assoc_property);
                }
            } else {
                $out[$property] = self::castToString($type, $this->_data[$property]);
            }

        }
        return $out;
    }


    /**
     * Convert properties to strings, based ont he types parsed
     *
     * @param $type
     * @param $value
     * @return string
     */
    public static function castToString($type, $value) {

        if($value === '')
            return '';

        switch($type) {
            case self::PROPERTY_TYPE_BOOLEAN:
                return $value ? 'true' : 'false';

            case self::PROPERTY_TYPE_DATE:
                return $value->format('c');

            case self::PROPERTY_TYPE_OBJECT:
                if($value instanceof Object)
                    return $value->toStringArray();
                return '';
            default:
                return (string) $value;
        }
    }

    /**
     * Cast the values to PHP types
     *
     * @param $type
     * @param $value
     * @return bool|\DateTime|float|int|string
     */
    public static function castFromString($type, $value, $php_type) {

        switch($type) {

            case self::PROPERTY_TYPE_INT:
                return intval($value);

            case self::PROPERTY_TYPE_FLOAT:
                return floatval($value);

            case self::PROPERTY_TYPE_BOOLEAN:
                return in_array(strtolower($value), array('true', '1', 'yes'));

            case self::PROPERTY_TYPE_DATE:
                if(preg_match('/Date\((?<timestamp>[0-9\+\.]+)\)/', $value, $matches)) //to catch stupid .net date serialisation
                    $value = $matches['timestamp'];
                return new \DateTime($value);

            case self::PROPERTY_TYPE_OBJECT:
                $php_type = sprintf('\\XeroPHP\\Models\\%s', $php_type);
                $instance = new $php_type();
                $instance->fromStringArray($value);
                return $instance;

            default:
                if(is_scalar($value))
                    return (string) $value;
                return '';

        }

    }


    /**
     * Validate the object and (optionally) the child objects recursively.
     *
     * @param bool $check_children
     * @return bool
     * @throws Exception
     */
    public function validate($check_children = true) {

        //validate
        foreach(static::getProperties() as $property => $meta) {
            $mandatory = $meta[self::KEY_MANDATORY];

            if($mandatory) {
                if(!isset($this->_data[$property]) || empty($this->_data[$property]))
                    throw new Exception(sprintf('%s::$%s is mandatory and is either missing or empty.', get_class($this), $property));

                if($check_children) {
                    if($this->_data[$property] instanceof Object) {
                        $this->_data[$property]->validate();

                    } elseif(is_array($this->_data[$property])) {
                        foreach($this->_data[$property] as $element) {
                            if($element instanceof Object)
                                $element->validate();
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * Magic getter for accessing properties directly
     *
     * @param $property
     * @return mixed
     */
    public function __get($property) {
        $getter = sprintf('get%s', $property);

        if(method_exists($this, $getter))
            return $this->$getter();

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    /**
     * Magic setter for setting properties directly
     *
     * @param $property
     * @param $value
     * @return mixed
     */
    public function __set($property, $value) {
        $setter = sprintf('set%s', $property);

        if(method_exists($this, $setter))
            return $this->$setter($value);

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    protected function propertyUpdated($property, $value) {
        if(!isset($this->_data[$property]) || $this->_data[$property] !== $value)
            $this->_dirty[$property] = true;
    }

    /**
     * If the object supports a specific HTTP method
     *
     * @param $method
     * @return bool
     */
    public static function supportsMethod($method) {
        return in_array($method, static::getSupportedMethods());
    }

} 