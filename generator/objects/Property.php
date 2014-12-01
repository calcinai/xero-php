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

    private $is_deprecated;

    private $related_object;

    public function __construct($name, $description){

        if(strpos($name, '(deprecated)')){
            $name = str_replace('(deprecated)', '', $name);
            $this->is_deprecated = true;
        }

        $this->name = $name;
        $this->description = $description;
        $this->links = array();
        $this->related_object = null;
    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model){
        //called by the model.
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getModel(){
        return $this->model;
    }

    /**
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNameSingular(){
        return \XeroPHP\Helpers::singularize($this->getName());
    }

    /**
     * @return mixed
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @return null
     */
    public function getRelatedObject(){
        return $this->related_object;
    }

    /**
     * @return bool
     */
    public function isDeprecated(){
        return $this->is_deprecated;
    }

    /**
     * @param $text
     * @param $href
     */
    public function addLink($text, $href){
        $this->links[] = array(
            'text' => $text,
            'href' => $href
        );
    }

    /**
     * @return bool
     */
    public function isArray(){

        switch(true){
            case stripos($this->getName(), 'status') !== false:
            case $this->getType() === self::TYPE_BOOLEAN:
            case $this->getType() === self::TYPE_ENUM:
                return false;
            default:
                return $this->getNameSingular() != $this->getName();
        }

    }

    /**
     * @return string
     */
    public function getType(){

        if(!isset($this->type))
            $this->type = $this->parseType();

        return $this->type;
    }

    /**
     * @return string
     */
    public function getPHPType() {

        switch($this->getType()){
            case self::TYPE_INT:
                return 'int';

            case self::TYPE_FLOAT:
                return 'float';

            case self::TYPE_BOOLEAN:
                return 'bool';

            case self::TYPE_STRING:
            case self::TYPE_GUID:
            case self::TYPE_ENUM:
                return 'string';

            case self::TYPE_DATE:
                return '\DateTime';

            case self::TYPE_OBJECT:
                return $this->related_object->getClassName();
        }

    }

    /**
     * If the property can be type-hinted in PHP.
     * No point doing a positive test here for scalar/basic
     *
     * @return bool
     */
    public function isHintable(){

        switch($this->getType()){
            case self::TYPE_DATE:
            case self::TYPE_OBJECT:
                return true;
            default:
                return false;
        }

    }


    /**
     * A very ugly function to parse the property type based on a massive arbitrary set of rules.
     *
     * @return string
     */
    private function parseType(){

        //Spelling errors in the docs
        if(preg_match('/^((a\s)?bool|true\b|booelan)/i', $this->description))
            $type = self::TYPE_BOOLEAN;

        if(preg_match('/(^sum\b|decimal|the\stotal|total\s(of|tax)|rate\b|amount\b)/i', $this->description))
            $type = self::TYPE_FLOAT;

        if(preg_match('/(^int(eger)?\b)/i', $this->description))
            $type = self::TYPE_INT;

        if(preg_match('/(UTC|timestamp|\bdate\b)/i', $this->description))
            $type = self::TYPE_DATE;

        if(preg_match('/Xero (generated )?(unique )?identifier/i', $this->description))
            $type = self::TYPE_GUID;

        if($this->getModel()->getClassName().'ID' == $this->getName()){
            $type = self::TYPE_GUID;
            $this->getModel()->setGUIDProperty($this);
        }

        //The ns hint for searching, look for subclasses of this first.
        $ns_hint = sprintf('%s\\%s', $this->getModel()->getNamespace(), $this->getModel()->getClassName());

        $result = null;
        foreach($this->links as $link) {
            $search_text = str_replace(' ', '', ucwords($link['text']));
            $result = $this->getModel()->getAPI()->searchByKey($search_text, $ns_hint);

            //then try anchor
            if($result === null){
                if(preg_match('/#(?<anchor>.+)/i', $link['href'], $matches)){
                    $result = $this->getModel()->getAPI()->searchByKey($matches['anchor'], $ns_hint);
                }
            }
        }

        if(!isset($type) && $result === null){
            if(preg_match('/See (?<model>.+)\.?$/i', $this->getDescription(), $matches))
                $result = $this->getModel()->getAPI()->searchByKey(str_replace(' ', '', ucwords($matches['model'])), $ns_hint);
        }

        //I have tried very hard to avoid special cases!
        if(!isset($type) && $result === null){
            if(preg_match('/^(?<model>Purchase|Sale)s?Details/i', $this->getName(), $matches))
                $result = $this->getModel()->getAPI()->searchByKey($matches['model'], $ns_hint);
        }

        if($result instanceof Enum)
            $type = self::TYPE_ENUM;
        elseif($result instanceof Model){
            $type = self::TYPE_OBJECT;
            $this->related_object = $result;
        }

        if(!isset($type))
            $type = self::TYPE_STRING;

        return $type;
    }

} 