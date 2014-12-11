<?php

namespace XeroPHP\Remote;

use XeroPHP\Exception;

class Object {

    const KEY_MANDATORY = 0;
    const KEY_TYPE      = 1;

    protected $_data;
    private $_dirty;

    protected function setDirty($property){

    }

    public function isDirty(){
        return true;
    }

    public function hasGUID(){
        return isset($this->_data[static::getGUIDProperty()]);
    }

    public function getGUID(){
        $this->_data[static::getGUIDProperty()];
    }

    public function fromArray($input_array){

        foreach(static::getProperties() as $property => $meta) {
            $mandatory = $meta[self::KEY_MANDATORY];
            $type = $meta[self::KEY_TYPE];

            if(isset($input_array[$property])){

                if($type !== null){
                    //Append the base model NS
                    if($type[0] !== '\\'){
                        $type = sprintf('\XeroPHP\Models\\%s', $type);
                    }

                }

                //if($input_array[$property])
            }

        }

    }

    public function toArray(){
        $out = array();
        foreach($this->_data as $key => $value){
            //override the value if it
            if($value instanceof Object) {
                $value = $value->toArray();
            } elseif($value instanceof \DateTime) {
                $value = $value->format('c');
            } elseif (is_array($value)){
                foreach($value as &$element){
                    if($element instanceof Object)
                        $element = $element->toArray();
                }
            } elseif(!is_scalar($value)) {
                throw new Exception(sprintf('Unknown value in object property %s::$%s.', get_class($value), $key));
            }

            //then put in.
            $out[$key] = $value;
        }
        return $out;
    }

    public function validate($check_children = true){

        //validate
        foreach(static::getProperties() as $property => $meta){
            $mandatory = $meta[self::KEY_MANDATORY];

            if($mandatory){
                if(!isset($this->_data[$property]) || empty($this->_data[$property]))
                    throw new Exception(sprintf('%s::$%s is mandatory and is either missing or empty.', get_class($this->_data[$property]), $property));

                if($check_children){
                    if($this->_data[$property] instanceof Object) {
                        $this->_data[$property]->validate();

                    } elseif (is_array($this->_data[$property])){
                        foreach($this->_data[$property] as $element){
                            if($element instanceof Object)
                                $element->validate();
                        }
                    }
                }
            }
        }

        return true;
    }

    public function __get($property){
        $getter = sprintf('get%s', $property);

        if(method_exists($this, $getter))
            return $this->$getter();

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    public function __set($property, $value){
        $setter = sprintf('set%s', $property);

        if(method_exists($this, $setter))
            return $this->$setter($value);

        trigger_error(sprintf("Undefined property %s::$%s.\n", __CLASS__, $property));
    }

    public static function supportsMethod($method){
        return in_array($method, static::getSupportedMethods());
    }

} 