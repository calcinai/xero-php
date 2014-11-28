<?php

class Model {

    private $name;
    private $properties;
    private $methods;
    private $url;

    private $api;

    private $sub_models;

    public function __construct(){

        $this->properties = array();
        $this->methods = array();
        $this->sub_models = array();
    }

    public function setAPI(API $api){
        //called by the api.
        $this->api = $api;
    }

    public function getAPI(){
        return $this->api;
    }


    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }


    public function setName($name) {
        $this->name = $name;
    }


    public function getClassName(){
        return \XeroPHP\Helpers::singularize($this->getName());
    }

    /**
     * @return mixed
     */
    public function getProperties() {
        return $this->properties;
    }


    /**
     * @param mixed $properties
     */
    public function addProperty(Property $property) {
        $property->setModel($this);
        $this->properties[$property->getName()] = $property;
    }

    /**
     * @return mixed
     */
    public function getMethods() {
        return $this->methods;
    }

    /**
     * @param mixed $methods
     */
    public function setMethods($methods) {

        if(is_array($methods)){
            $this->methods = $methods;
        } else {
            preg_match_all('/(?<methods>GET|PUT|POST|DELETE)/', $methods, $matches);
            $this->methods = $matches['methods'];
        }
    }

    public function getGUIDProperty(){
        foreach($this->properties as $property){
            if($property->getType() === Property::TYPE_GUID)
                return $property;
        }
        return null;
    }


    /**
     * @return mixed
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param mixed $url
     */
    public function setUrl($url) {
        $this->url = $url;
    }

    public function getResourceName(){
        return substr($this->url, strrpos($this->url, '/')+1);
    }

    public function addSubModel(Model $model){
        $this->sub_models[] = $model;
    }


} 