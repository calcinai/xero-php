<?php

class Property {

    const TYPE_STRING   = 'string';
    const TYPE_INT      = 'int';
    const TYPE_FLOAT    = 'float';
    const TYPE_BOOLEAN  = 'bool';
    const TYPE_ENUM     = 'enum';
    const TYPE_GUID     = 'guid';
    const TYPE_DATE     = 'date';
    const TYPE_OBJECT   = 'object';

    private $model; //this is required so you can search the other models/enums

    private $type;
    private $name;
    private $description;
    private $links;

    private $related_object;

    public function __construct($name, $description){
        $this->name = $name;
        $this->description = $description;
        $this->links = array();
    }

    public function setModel(Model $model){
        //called by the model.
        $this->model = $model;
    }

    public function getModel(){
        return $this->model;
    }

    public function getName(){
        return $this->name;
    }

    public function getNameSingular(){
        return \XeroPHP\Helpers::singularize($this->getName());
    }

    public function getDescription(){
        return $this->description;
    }

    public function addLink($text, $href){
        $this->links[] = array(
            'text' => $text,
            'href' => $href
        );
    }

    public function isArray(){
        return $this->getNameSingular() != $this->getName();
    }

    public function getType(){

        if(!isset($this->type))
            $this->type = $this->parseType();

        return $this->type;
    }

    private function parseType(){

        if(preg_match('/^bool/i', $this->description))
            $type = self::TYPE_BOOLEAN;

        if(preg_match('/(^sum|decimal|amount)/i', $this->description))
            $type = self::TYPE_FLOAT;

        if(preg_match('/(number)/i', $this->name))
            $type = self::TYPE_INT;

        if(preg_match('/(UTC|timestamp|date)/i', $this->description))
            $type = self::TYPE_DATE;

        if(false !== stripos($this->description, 'Xero identifier')){
            $type = self::TYPE_GUID;
        }

        foreach($this->links as $link){
            $search_text = str_replace(' ', '', $link['text']);
            $result = $this->getModel()->getAPI()->searchByKey($search_text);

            if($result instanceof Enum)
                $type = self::TYPE_ENUM;
            elseif($result instanceof Model){
                $type = self::TYPE_OBJECT;
                $this->related_object = $result;
            }

        }

        if(!isset($type))
            $type = self::TYPE_STRING;

        return $type;
    }

} 