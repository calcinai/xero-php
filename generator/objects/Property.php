<?php

use XeroPHP\Remote\Object;

class Property {

    private $model; //this is required so you can search the other models/enums

    private $type;
    private $name;
    private $description;
    private $links;

    private $is_deprecated;
    private $is_mandatory;
    private $is_read_only;

    /**
     * Contains the model that a property contains
     *
     * @var Model $related_object
     */
    private $related_object;

    public $save_directly;

    public function __construct($name, $description, $mandatory = false, $read_only = false, $deprecated = false){
        if(strpos($name, '(deprecated)')){
            $name = str_replace('(deprecated)', '', $name);
            $deprecated = true;
        }

        $this->is_deprecated = $deprecated;
        $this->is_mandatory = $mandatory;
        $this->is_read_only = $read_only;
        $this->name = $name;
        $this->description = $description;
        $this->links = array();
        $this->related_object = null;
        $this->save_directly = false;


    }

    /**
     * @param Model $model
     */
    public function setModel(Model $model){
        //called by the model.
        $this->model = $model;
    }

    /**
     * @return Model
     */
    public function getModel(){
        return $this->model;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNameSingular(){
        return \XeroPHP\Helpers::singularize($this->getName());
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->description;
    }

    /**
     * @return Model|null
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
     * @return bool
     */
    public function isMandatory(){
        return $this->is_mandatory;
    }

    public function isReadOnly(){
        return $this->is_read_only;
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
            case $this->getType() === Object::PROPERTY_TYPE_BOOLEAN:
            case $this->getType() === Object::PROPERTY_TYPE_ENUM:
            case $this->getType() === Object::PROPERTY_TYPE_STRING:
                return false;
            //This to to improve detection of names that are the same plural/sing
            case preg_match('/maximum of [2-9] <(?<model>[a-z]+)> elements/i', $this->getDescription()):
                return true;
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

    public function getTypeConstant(){
        //Ew.
        $rc = new ReflectionClass('\\XeroPHP\\Remote\\Object');
        foreach($rc->getConstants() as $constant_name => $constant_value)
            if($constant_value === $this->getType())
                return $constant_name;

        return null;

    }

    /**
     * @return string
     */
    public function getPHPType($with_ns = false) {

        switch($this->getType()){
            case Object::PROPERTY_TYPE_INT:
                return 'int';

            case Object::PROPERTY_TYPE_FLOAT:
                return 'float';

            case Object::PROPERTY_TYPE_BOOLEAN:
                return 'bool';

            case Object::PROPERTY_TYPE_STRING:
            case Object::PROPERTY_TYPE_GUID:
            case Object::PROPERTY_TYPE_ENUM:
                return 'string';

            case Object::PROPERTY_TYPE_DATE:
            case Object::PROPERTY_TYPE_TIMESTAMP:
                return '\DateTime';

            case Object::PROPERTY_TYPE_OBJECT:
                return $this->related_object->getClassName($with_ns);
        }

        return null;
    }

    /**
     * If the property can be type-hinted in PHP.
     * No point doing a positive test here for scalar/basic
     *
     * @return bool
     */
    public function isHintable(){

        switch($this->getType()){
            case Object::PROPERTY_TYPE_DATE:
            case Object::PROPERTY_TYPE_TIMESTAMP:
            case Object::PROPERTY_TYPE_OBJECT:
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
            $type = Object::PROPERTY_TYPE_BOOLEAN;

        //Spelling errors in the docs
        if(preg_match('/UTC$/', $this->getName()))
            $type = Object::PROPERTY_TYPE_TIMESTAMP;

        if(preg_match('/^Has[A-Z]\w+/', $this->getName()))
            $type = Object::PROPERTY_TYPE_BOOLEAN;

        if(preg_match('/(^sum\b|decimal|the\stotal|total\s(of|tax)|rate\b|amount\b)/i', $this->description)){
            //If not the name of the field itself and not an 'amount type'
            if(stripos($this->name, 'name') === false && stripos($this->description, 'amount type') === false){
                $type = Object::PROPERTY_TYPE_FLOAT;
            }
        }

        if(preg_match('/(alpha numeric)/i', $this->description))
            $type = Object::PROPERTY_TYPE_STRING;

        if(preg_match('/(^int(eger)?\b)/i', $this->description))
            $type = Object::PROPERTY_TYPE_INT;

        if(!isset($type) && preg_match('/(\bdate\b)/i', $this->description))
            $type = Object::PROPERTY_TYPE_DATE;

        if(preg_match('/Xero (generated )?(unique )?identifier/i', $this->description))
            $type = Object::PROPERTY_TYPE_GUID;

        if($this->getModel()->getClassName().'ID' == $this->getName()){
            $type = Object::PROPERTY_TYPE_GUID;
            $this->getModel()->setGUIDProperty($this);
        }

        if(preg_match('/(Code|ID)$/', $this->getName()))
            $type = Object::PROPERTY_TYPE_STRING;

        $result = null;

        if(!isset($type)) {
            //The ns hint for searching, look for subclasses of this first.
            $ns_hint = sprintf('%s\\%s', $this->getModel()->getNamespace(), $this->getModel()->getClassName());

            if(preg_match('/see\s(?<model>[^.]+)/i', $this->getDescription(), $matches)){

                //Try NS'ing it with existing models... MNA htis is getting ugly.
                foreach($this->getModel()->getAPI()->getModels() as $model){
                    $class_name = $model->getClassName();
                    $model_name = $matches['model'];
                    if(strpos($model_name, $class_name) === 0){
                        //this means it starts with the model name
                        $search_text = sprintf('%s\\%s', substr($model_name, 0, strlen($class_name)), substr($model_name, strlen($class_name)));
                        $result = $this->getModel()->getAPI()->searchByKey(str_replace(' ', '', ucwords($search_text)), $this->getModel()->getNamespace());

                    }
                }

            }

            if($result === null && substr_count($ns_hint, '\\') > 1){
                $parent_ns_hint = substr($ns_hint, 0, strrpos($ns_hint, '\\'));
                $result = $this->getModel()->getAPI()->searchByKey($this->getName(), $parent_ns_hint);
            }

            if($result === null)
                $result = $this->getModel()->getAPI()->searchByKey($this->getName(), $ns_hint);

            if($result === null) {
                foreach($this->links as $link) {
                    $search_text = str_replace(' ', '', ucwords($link['text']));

                    $result = $this->getModel()->getAPI()->searchByKey($search_text, $ns_hint);

                    //then try anchor
                    if($result === null) {
                        if(preg_match('/#(?<anchor>.+)/i', $link['href'], $matches)) {
                            $result = $this->getModel()->getAPI()->searchByKey($matches['anchor'], $ns_hint);
                        }
                    }
                }
            }

            //Otherwise, just have a stab again, this needs to be after other references
            if($result === null){
                if(preg_match('/see\s(?<model>[^.]+)/i', $this->getDescription(), $matches)){
                    $result = $this->getModel()->getAPI()->searchByKey(str_replace(' ', '', ucwords($matches['model'])), $ns_hint);
                }
            }

            //Look for pointy bracketed references
            if($result === null){
                if(preg_match('/<(?<model>[^>]+)>/i', $this->getDescription(), $matches)){
                    $result = $this->getModel()->getAPI()->searchByKey(str_replace(' ', '', ucwords($matches['model'])), $ns_hint);
                }
            }


            //I have tried very hard to avoid special cases!
            if($result === null){
                if(preg_match('/^(?<model>Purchase|Sale)s?Details/i', $this->getName(), $matches)){
                    $result = $this->getModel()->getAPI()->searchByKey($matches['model'], $ns_hint);
                }
            }

        }



        if($result instanceof Enum)
            $type = Object::PROPERTY_TYPE_ENUM;
        elseif($result instanceof Model){
            $type = Object::PROPERTY_TYPE_OBJECT;
            $this->related_object = $result;

            //If docs have case-typos in them, take the class name as authoritative.
            if(strcmp($this->getName(), $this->related_object->getName()) !== 0 && strcasecmp($this->getName(), $this->related_object->getName()) === 0)
                $this->name = $this->related_object->getName();


        }

        if(!isset($type))
            $type = Object::PROPERTY_TYPE_STRING;

        return $type;
    }

} 