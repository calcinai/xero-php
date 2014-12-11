<?php

class Model {

    private $name;
    private $properties;
    private $methods;
    private $url;

    private $api;

    /**
     * @var The parent model of the object.  This is if it's defined as a secondary model on a doc page
     */
    private $parent_model;

    /**
     * @var Property of the object that holds the GUID
     */
    private $guid_property;

    /**
     * No args in constructor.  Most things are not known when it's built
     */
    public function __construct(){

        $this->properties = array();
        $this->methods = array();
        $this->sub_models = array();
    }

    /**
     * Setter for api
     *
     * @param API $api
     */
    public function setAPI(API $api){
        //called by the api.
        $this->api = $api;
    }

    /**
     * Getter for api
     *
     * @return mixed
     */
    public function getAPI(){
        return $this->api;
    }


    /**
     * Getter for name
     *
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }


    /**
     * Setter for name
     *
     * @param $name
     */
    public function setName($name) {
        $this->name = $name;
    }


    /**
     * Get the class name for the Model. Purely based on the name property.
     *
     * @return mixed
     */
    public function getClassName($with_ns = false){

        $class_name = \XeroPHP\Helpers::singularize($this->getName());

        if($with_ns)
            return sprintf('%s\\%s', $this->getNamespace(), $class_name);
        else
            return $class_name;
    }

    /**
     * Get the model namespace.  If it's a sub-model, needs to be in the NS of its parent.
     *
     * @return string
     */
    public function getNamespace(){
        if(isset($this->parent_model)){
            return sprintf('%s\\%s', $this->getAPI()->getNamespace(), $this->parent_model->getClassName());
        } else {
            return $this->getAPI()->getNamespace();
        }
    }

    /**
     * Get the referenced classes in the object.  This is for the "use"s of type-hinted objects
     *
     * @return array
     */
    public function getUsedClasses(){

        $classes = array();
        foreach($this->getProperties() as $property){
            if($property->getType() === Property::TYPE_OBJECT) {
                if($property->getRelatedObject()->getNamespace() !== $this->getNamespace()){
                    $key = $property->getRelatedObject()->getClassName(true);
                    $classes[$key] = $key;
                }
            }
        }
        return $classes;
    }

    /**
     * Getter for propertied
     *
     * @return array
     */
    public function getProperties() {
        return $this->properties;
    }


    /**
     * @param Property $properties
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
     * Set accepted methods for API call.  Only going to be set on models that can be referenced directly
     *
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

    /**
     * @return null
     */
    public function getGUIDProperty(){
        if(isset($this->guid_property))
            return $this->guid_property;

        //Otherwise just pick one.  This will only happen if the property isn't called [Model]ID
        foreach($this->properties as $property){
            if($property->getType() === Property::TYPE_GUID)
                return $property;
        }

        //No hope.
        return null;
    }

    /**
     * Manually set GUID property
     *
     * @param Property $property
     */
    public function setGUIDProperty(Property $property){
        $this->guid_property = $property;
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

    /**
     * Shortcut for getting them from $api where the group is the same as this name
     *
     * @return array
     */
    public function getEnums(){
        return $this->getAPI()->getEnumsByGroup($this->getName());
    }

    /**
     * @return string
     */
    public function getResourceName(){

        if(!isset($this->url))
            return null;

        return substr($this->url, strrpos($this->url, '/')+1);
    }

    //https://api.xero.com/api.xro/2.0/Contacts
    public function getResourceURI(){

        if(!isset($this->url))
            return null;

        if(preg_match('#/[a-z]+.xro/[0-9\.]+/(?<uri>.+)#', $this->url, $matches))
            return $matches['uri'];

    }

    /**
     * @param Model $model
     */
    public function setParentModel(Model $model){
        $this->parent_model = $model;
    }


} 