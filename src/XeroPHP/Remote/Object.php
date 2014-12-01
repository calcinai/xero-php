<?php

namespace XeroPHP\Remote;

class Object {

    protected $_data;
    private $_dirty;

    protected function setDirty($property){

    }

    public function toArray(){
        $out = array();
        foreach($this->_data as $key => $value){
            //override the value if it
            if($value instanceof Object) {
                $value = $value->toArray();
            } elseif(is_array($value)){
                foreach($value as &$element){
                    $element = $element->toArray();
                }
            }

            //then out in.
            $out[$key] = $value;
        }
        return $out;
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

} 