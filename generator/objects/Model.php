<?php

use XeroPHP\Helpers;
use XeroPHP\Remote\Object;
use XeroPHP\Remote\Request;

class Model implements ParsedObjectInterface {

    private $name;
    private $properties;
    private $methods;
    private $url;

    private $api;

    /**
     * The parent model of the object.  This is if it's defined as a secondary model on a doc page
     *
     * @var Model $parent_model
     */
    private $parent_model;

    /**
     * @var Property of the object that holds the GUID
     */
    private $guid_property;

    /**
     * @var bool $supports_pdf
     */
    private $supports_pdf;

    /**
     * @var bool $supports_page
     */
    private $is_pageable;


    public $rawHTML;

    /**
     * No args in constructor.  Most things are not known when it's built
     */
    public function __construct(){

        $this->properties = array();
        $this->methods = array();
        $this->sub_models = array();
        $this->supports_pdf = false;
        $this->supports_page = false;
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
     * @return API
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
     * @param bool $with_ns
     * @return mixed
     */
    public function getClassName($with_ns = false){

        $class_name = Helpers::singularize($this->getName());

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
            if($property->getType() === Object::PROPERTY_TYPE_OBJECT) {
                if($property->getRelatedObject()->getNamespace() !== $this->getNamespace()){
                    $key = $property->getRelatedObject()->getClassName(true);
                    $classes[$key] = $key;
                }
            }
        }
        return $classes;
    }

    /**
     * Bit of a messy way to add properties at a position.  Just so it doesn't muck about the generated property order.
     * As it's an associative array there's not a lot else that can be done.
     * It's not crucial that the order stays the same either.
     *
     * @param Property $property
	 * @param null $insert_position
	 * @param boolean $get_only
     */
    public function addProperty(Property $property, $insert_position = null, $get_only = false) {
        $key_name = strtolower($property->getName());

        if(isset($this->properties[$key_name]) && $get_only) {
            return;
        }

        $property->setModel($this);

        //This is so it can be retrospectively added in the case of deprecation.
        if($insert_position !== null){
            $properties = array();
            $property_position = 0;
            foreach($this->properties as $existing_name => $existing_property){
                if($property_position++ === $insert_position){
                    $properties[$key_name] = $property;
                }
                $properties[$existing_name] = $existing_property;
            }

            //Otherwise it's at the end (or after)
            if($insert_position >= $property_position)
                $properties[$key_name] = $property;

            $this->properties = $properties;

        } else {
            $this->properties[$key_name] = $property;
        }
    }


    public function hasProperty($property_name){
        return isset($this->properties[strtolower($property_name)]);
    }

    /**
     * Getter for property
     *
     * @param $property_name
     * @return Property
     */
    public function getProperty($property_name) {
        return $this->properties[strtolower($property_name)];
    }


    /**
     * Getter for properties
     *
     * @return array
     */
    public function getProperties() {
        return $this->properties;
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
            $this->methods = array_unique($matches['methods']);
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
            if($property->getType() === Object::PROPERTY_TYPE_GUID)
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
     * This should be enough to tell if it supports them
     *
     * @return boolean
     */
    public function getSupportsAttachments() {
        return $this->hasProperty('HasAttachments');
    }

    /**
     * @return boolean
     */
    public function getSupportsPDF() {
        return $this->supports_pdf;
    }

    /**
     * @param boolean $supports_pdf
     */
    public function setSupportsPDF($supports_pdf) {
        $this->supports_pdf = $supports_pdf;
    }

    /**
     * @return boolean
     */
    public function isPageable() {
        return $this->is_pageable;
    }

    /**
     * @param boolean $is_pageable
     */
    public function setIsPagable($is_pageable) {
        $this->is_pageable = $is_pageable;
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

        if(preg_match('#/[a-z]+.xro/[0-9\.]+/(?<uri>.+)#', $this->url, $matches))
            return $matches['uri'];

        //Otherwise default to name of object
        return $this->getName();
    }

    /**
     * @param Model $model
     */
    public function setParentModel(Model $model){
        $this->parent_model = $model;
    }

    public function isWritable(){
        return in_array(Request::METHOD_POST, $this->methods) ||
            in_array(Request::METHOD_PUT, $this->methods);
    }


    /**
     * Pretty ugly eh!
     * For debugging
     *
     */
    public function printPropertyTable(){
        $rows = array();
        $column_sizes = array();

        foreach($this->getProperties() as $key => $property){
            $rows[$key] = array($property->getName(), $string = substr(preg_replace('/[^\w\s.\-\(\)]|\n/', '', $property->getDescription()), 0, 100));

            foreach($rows[$key] as $column_index => $column){
                $column_sizes[$column_index] = max(isset($column_sizes[$column_index]) ? $column_sizes[$column_index] : 0, iconv_strlen($column));
            }
        }
        //Cannot echo the data types here.  They are lazily calculated after all the models are aware of each other.
        $total_row_width = array_sum($column_sizes) + count($column_sizes) * 3 + 1;
        echo str_repeat('-', $total_row_width)."\n";
        printf("| %-".($total_row_width - 4)."s |\n", $this->getName());
        echo str_repeat('-', $total_row_width)."\n";
        foreach($rows as $row){
            echo '|';
            foreach($row as $column_index => $column) {
                printf(' %-' . $column_sizes[$column_index] . 's |', $column);
            }
            echo "\n";
        }
        echo str_repeat('-', $total_row_width)."\n\n";


    }

} 