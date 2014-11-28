<?php

class Enum {

    private $group;
    private $name;
    private $anchor;

    private $values;

    public function __construct($group, $name, $anchor){
        $this->group = $group;
        $this->name = $name;
        $this->anchor = $anchor;
    }

    public function addValue($name, $description){
        $this->values[] = array(
            'name' => $name,
            'description' => $description
        );
    }

    public function getName(){
        return $this->name;
    }

    public function getAnchor(){
        return $this->anchor;
    }

} 