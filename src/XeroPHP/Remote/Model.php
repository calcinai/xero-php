<?php

namespace XeroPHP\Remote;

use XeroPHP\Helpers;
use XeroPHP\Application;

/**
 * Class Model.
 */
abstract class Model implements ObjectInterface, \JsonSerializable, \ArrayAccess
{
    /**
     * Keys for the meta properties array.
     */
    const KEY_MANDATORY = 0;

    const KEY_TYPE = 1;

    const KEY_PHP_TYPE = 2;

    const KEY_IS_ARRAY = 3;

    const KEY_SAVE_DIRECTLY = 4;

    const PROPERTY_TYPE_STRING = 'string';

    const PROPERTY_TYPE_INT = 'int';

    const PROPERTY_TYPE_FLOAT = 'float';

    const PROPERTY_TYPE_BOOLEAN = 'bool';

    const PROPERTY_TYPE_ENUM = 'enum';

    const PROPERTY_TYPE_GUID = 'guid';

    const PROPERTY_TYPE_DATE = 'date';

    const PROPERTY_TYPE_TIMESTAMP = 'timestamp';

    const PROPERTY_TYPE_OBJECT = 'object';

    /**
     * Container to the actual properties of the object.
     *
     * @var array
     */
    protected $_data;

    /**
     * Holds a record of which properties have been changed.
     *
     * @var array
     */
    protected $_dirty;

    /**
     * Holds a list of objects that hold child references to this one.
     *
     * @var self[]
     */
    protected $_associated_objects;

    /**
     * Holds a ref to the application that was used to load the object,
     * enables shorthand $object->save();.
     *
     * @var Application|null
     */
    protected $_application;

    public function __construct(Application $application = null)
    {
        $this->_application = $application;
        $this->_dirty = [];
        $this->_data = [];
        $this->_associated_objects = [];
    }

    /**
     * This should be compulsory in the constructor in the future,
     * but will have to be like this for BC until the next major version.
     *
     * @param Application $application
     *
     * @return $this
     */
    public function setApplication(Application $application)
    {
        $this->_application = $application;

        return $this;
    }

    /**
     * Get the application.
     *
     * @return \XeroPHP\Application
     */
    protected function getApplication()
    {
        return $this->_application;
    }

    /**
     * If there have been any properties changed since load.
     *
     * @param null $property
     *
     * @return bool
     */
    public function isDirty($property = null)
    {
        if ($property === null) {
            return count($this->_dirty) > 0;
        }

        return isset($this->_dirty[$property]);
    }

    /**
     * Manually set a property as dirty.
     *
     * @param $property
     *
     * @return self
     */
    public function setDirty($property)
    {
        $this->_dirty[$property] = true;

        return $this;
    }

    /**
     * Manually set a property as clean.
     *
     * @param null $property
     *
     * @return self
     */
    public function setClean($property = null)
    {
        if ($property === null) {
            $this->_dirty = [];
        } else {
            unset($this->_dirty[$property]);
        }

        return $this;
    }

    /**
     * This is used to detect if the object has copy at the source.
     *
     * @return bool
     */
    public function hasGUID()
    {
        return isset($this->_data[static::getGUIDProperty()]);
    }

    /**
     * @return string
     */
    public function getGUID()
    {
        return $this->__get(static::getGUIDProperty());
    }

    /**
     * @param string $guid
     *
     * @return $this
     */
    public function setGUID($guid)
    {
        $this->__set(static::getGUIDProperty(), $guid);

        return $this;
    }

    /**
     * Load an assoc array into the instance of the object $property => $value
     * $replace_data - replace existing data.
     *
     * @param $input_array
     * @param $replace_data
     */
    public function fromStringArray($input_array, $replace_data = false)
    {
        foreach (static::getProperties() as $property => $meta) {
            $type = $meta[self::KEY_TYPE];
            $php_type = $meta[self::KEY_PHP_TYPE];
            $isArray = $meta[self::KEY_IS_ARRAY];

            //If set and NOT replace data, continue
            if (! $replace_data && isset($this->_data[$property])) {
                continue;
            }

            if (! isset($input_array[$property])) {
                $this->_data[$property] = null;

                continue;
            }

            if ($isArray && ! is_array($input_array[$property])) {
                $this->_data[$property] = null;

                continue;
            }

            //Fix for an earlier assumption that the API didn't return more than
            //two levels of nested objects.
            //Handles Invoice > Contact > Address etc. in one build.
            if ($isArray && Helpers::isAssoc($input_array[$property]) === false) {
                $collection = new Collection();
                $collection->addAssociatedObject($property, $this);
                foreach ($input_array[$property] as $assoc_element) {
                    $cast = self::castFromString($type, $assoc_element, $php_type);
                    //Do this here so that you know it's not a static method call to ::castFromString
                    if ($cast instanceof self) {
                        $cast->addAssociatedObject($property, $this);
                    }
                    $collection->append($cast);
                }
                $this->_data[$property] = $collection;
            } else {
                $cast = self::castFromString($type, $input_array[$property], $php_type);
                //Do this here so that you know it's not a static method call to ::castFromString
                if ($cast instanceof self) {
                    $cast->addAssociatedObject($property, $this);
                }
                $this->_data[$property] = $cast;
            }
        }
    }

    /**
     * Convert the object into an array, and any non-primitives to string.
     *
     * @param mixed $dirty_only
     *
     * @return array
     */
    public function toStringArray($dirty_only = false)
    {
        $out = [];
        foreach (static::getProperties() as $property => $meta) {
            if (! isset($this->_data[$property])) {
                continue;
            }

            //if we only want the dirty props, stop here
            if ($dirty_only && ! isset($this->_dirty[$property]) && $property !== static::getGUIDProperty()) {
                continue;
            }

            $type = $meta[self::KEY_TYPE];

            if ($this->_data[$property] instanceof Collection) {
                $out[$property] = [];
                foreach ($this->_data[$property] as $assoc_property) {
                    $out[$property][] = self::castToString($type, $assoc_property);
                }
            } else {
                $out[$property] = self::castToString($type, $this->_data[$property]);
            }
        }

        return $out;
    }

    /**
     * Convert properties to strings, based on the types parsed.
     *
     * @param $type
     * @param $value
     *
     * @return string
     */
    public static function castToString($type, $value)
    {
        if ($value === '') {
            return '';
        }

        switch ($type) {
            case self::PROPERTY_TYPE_BOOLEAN:
                return $value ? 'true' : 'false';

            case self::PROPERTY_TYPE_DATE:
                /**
                 * @var \DateTimeInterface
                 */
                return $value->format('Y-m-d');

            case self::PROPERTY_TYPE_TIMESTAMP:
                /**
                 * @var \DateTimeInterface
                 */
                return $value->format('c');

            case self::PROPERTY_TYPE_OBJECT:
                if ($value instanceof self) {
                    return $value->toStringArray();
                }

                return '';
            default:
                if (is_scalar($value)) {
                    return (string) $value;
                }

                return '';
        }
    }

    /**
     * Cast the values to PHP types.
     *
     * @param $type
     * @param $value
     * @param $php_type
     *
     * @return bool|\DateTimeInterface|float|int|string
     */
    public static function castFromString($type, $value, $php_type)
    {
        //Here should maybe handle locale specific tz overrides in the future.
        $timezone = null;

        switch ($type) {

            case self::PROPERTY_TYPE_INT:
                return (int) $value;

            case self::PROPERTY_TYPE_FLOAT:
                return (float) $value;

            case self::PROPERTY_TYPE_BOOLEAN:
                return in_array(strtolower($value), ['true', '1', 'yes'], true);

            /** @noinspection PhpMissingBreakStatementInspection */
            case self::PROPERTY_TYPE_TIMESTAMP:
                $timezone = new \DateTimeZone('UTC');

                // no break
            case self::PROPERTY_TYPE_DATE:
                if (preg_match('/Date\\((?<timestamp>[0-9\\+\\.]+)\\)/', $value, $matches)) { //to catch stupid .net date serialisation
                    $value = $matches['timestamp'];
                }

                return new \DateTime($value, $timezone);

            case self::PROPERTY_TYPE_OBJECT:
                $php_type = sprintf('\\XeroPHP\\Models\\%s', $php_type);
                /** @var self $instance */
                $instance = new $php_type();
                $instance->fromStringArray($value);

                return $instance;

            default:
                if (is_scalar($value)) {
                    return (string) $value;
                }

                return (object) $value;
        }
    }

    /**
     * Validate the object and (optionally) the child objects recursively.
     *
     * @param bool $check_children
     *
     * @throws Exception
     *
     * @return bool
     */
    public function validate($check_children = true)
    {
        //validate
        foreach (static::getProperties() as $property => $meta) {
            $mandatory = $meta[self::KEY_MANDATORY];

            //If it's got a GUID, it's already going to be valid almost all cases
            if (! $this->hasGUID() && $mandatory) {
                if (! isset($this->_data[$property]) || empty($this->_data[$property])) {
                    throw new Exception(
                        sprintf(
                            '%s::$%s is mandatory and is either missing or empty.',
                            get_class($this),
                            $property
                        )
                    );
                }

                if ($check_children) {
                    if ($this->_data[$property] instanceof self) {
                        //Keep IDEs happy
                        /** @var self $obj */
                        $obj = $this->_data[$property];
                        $obj->validate();
                    } elseif ($this->_data[$property] instanceof Collection) {
                        foreach ($this->_data[$property] as $element) {
                            if ($element instanceof self) {
                                $element->validate();
                            }
                        }
                    }
                }
            }
        }

        return true;
    }

    /**
     * Shorthand save an object if it is instantiated with app context.
     *
     * @throws Exception
     *
     * @return Response|null
     */
    public function save()
    {
        if ($this->_application === null) {
            throw new Exception(
                '->save() is only available on objects that have an injected application context.'
            );
        }

        return $this->_application->save($this);
    }

    /**
     * Shorthand delete an object if it is instantiated with app context.
     *
     * @throws Exception
     *
     * @return Response
     */
    public function delete()
    {
        if ($this->_application === null) {
            throw new Exception(
                '->delete() is only available on objects that have an injected application context.'
            );
        }

        return $this->_application->delete($this);
    }

    /**
     * @param string $property
     * @param Model $object
     */
    public function addAssociatedObject($property, self $object)
    {
        $this->_associated_objects[$property] = $object;
    }

    /**
     * Magic method for testing if properties exist.
     *
     * @param $property
     *
     * @return bool
     */
    public function __isset($property)
    {
        return isset($this->_data[$property]);
    }

    /**
     * Magic getter for accessing properties directly.
     *
     * @param $property
     *
     * @return mixed
     */
    public function __get($property)
    {
        $getter = sprintf('get%s', $property);

        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    /**
     * Magic setter for setting properties directly.
     *
     * @param $property
     * @param $value
     *
     * @return mixed
     */
    public function __set($property, $value)
    {
        $setter = sprintf('set%s', $property);

        if (method_exists($this, $setter)) {
            return $this->$setter($value);
        }

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    protected function propertyUpdated($property, $value)
    {
        if (! isset($this->_data[$property]) || $this->_data[$property] !== $value) {
            //If this object can update itself, set its own dirty flag, otherwise, set its parent's.
            if (count(array_intersect($this::getSupportedMethods(), [Request::METHOD_PUT, Request::METHOD_POST])) > 0) {
                //Object can update itself
                $this->setDirty($property);
            } else {
                //Object can't update itself, so tell its parents
                foreach ($this->_associated_objects as $parent_property => $object) {
                    $object->setDirty($parent_property);
                }
            }
        }
    }

    /**
     * If the object supports a specific HTTP method.
     *
     * @param $method
     *
     * @return bool
     */
    public static function supportsMethod($method)
    {
        return in_array($method, static::getSupportedMethods(), true);
    }

    /**
     * JSON Encode overload to pull out hidden properties.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toStringArray();
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return $this->__isset($offset);
    }

    /**
     * @param mixed $offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return $this->__get($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return mixed
     */
    public function offsetSet($offset, $value)
    {
        return $this->__set($offset, $value);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->_data[$offset]);
    }
}
