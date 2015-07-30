<?php

use XeroPHP\Helpers;

class API {

    private $name;
    private $namespace;
    private $uri;
    private $models;
    private $model_aliases;
    private $enums;

    private $stem_constant;

    /**
     * @var bool If the search index has been built yet
     */
    private $is_indexed;

    /** @var Model[]|Enum[] */
    private $search_keys;

    /**
     * @param $name
     * @param $namespace
     * @param $stem
     */
    public function __construct($name, $namespace, $stem) {

        $this->name = $name;
        $this->namespace = $namespace;
        $this->stem_constant  = $stem;

        $this->models = array();
        $this->enums = array();

        $this->model_aliases = array();

        $this->search_keys = array();
        $this->is_indexed = false;

    }

    /**
     * Get all Enums belonging to a group
     *
     * @param $group
     * @return array
     */
    public function getEnumsByGroup($group){
        $enums = array();
        foreach($this->getEnums() as $enum){
            if($enum->getGroup() == $group)
                $enums[] = $enum;
        }
        return $enums;
    }

    /**
     * Get an array of Enums that can't be matched with a class.  This is largely
     * a set of generic constants referred to in multiple places
     *
     * @return array
     */
    public function getStrayEnums(){
        $names = array();
        foreach($this->getModels() as $model){
            //just so we're comparing apples with apples
            $names[] = Helpers::singularize($model->getName());
        }

        $strays = array();
        foreach($this->getEnums() as $enum){
            //just so we're comparing apples with apples
            $singular_group = Helpers::singularize($enum->getGroup());
            if(!in_array($singular_group, $names))
                $strays[$singular_group][] = $enum;
        }
        return $strays;
    }

    /**
     * Get all Enums
     *
     * @return Enum[]
     */
    public function getEnums() {
        return $this->enums;
    }

    /**
     * Add an enum
     *
     * @param Enum $enum
     */
    public function addEnum(Enum $enum) {
        $this->enums[$enum->getGroup().$enum->getName()] = $enum;
    }

    /**
     * @param bool $include_aliases
     *
     * @return Model[]
     */
    public function getModels($include_aliases = true) {
        $models = $this->models;

        if($include_aliases){
            foreach($this->model_aliases as $alias){
                /** @var Model $clone */
                $clone = clone $alias['model'];
                $clone->setName($alias['name']);
                $models[] = $clone;
            }

        }
        return $models;
    }

    /**
     * Add a model representation to the api
     *
     * @param Model $model
     */
    public function addModel(Model $model) {
        $model->setAPI($this);
        $this->models[] = $model;
    }

    /**
     * Add an alias to a class.  Used for search
     *
     * @param Model $model
     * @param $class_name
     */
    public function addModelAlias(Model $model, $class_name){
        $this->model_aliases[] = array(
            'name' => $class_name,
            'model' => $model
        );
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @return string
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @param string $uri
     */
    public function setUri($uri) {
        $this->uri = $uri;
    }

    /**
     * @return string
     */
    public function getStemConstant() {
        return $this->stem_constant;
    }



    //Following functions are for matching data types and relations.

    /**
     * @return bool
     */
    public function isIndexed(){
        return $this->is_indexed;
    }

    /**
     * Add a key to the search index
     *
     * @param string $key
     * @param string $object
     */
    public function addSearchKey($key, $object){

        //Models take precedence (I think this only happens in one case)
        if(isset($this->search_keys[$key]) && $this->search_keys[$key] instanceof Model)
            return;

        $this->search_keys[$key] = $object;
    }

    /**
     * Search for an entity based on a term. Search by class name, FQ class name - both as-is, plural and singular
     *
     * Crude.
     *
     * @param $key
     * @param string $namespace_hint
     * @return null
     */
    public function searchByKey($key, $namespace_hint = ''){

        if(!$this->isIndexed())
            $this->buildSearchIndex();

        //Yuck
        $plural_key = Helpers::pluralize($key);
        $singular_key = Helpers::singularize($key);

        $ns_key = sprintf('%s\\%s', $namespace_hint, $key);
        $plural_ns_key = Helpers::pluralize($ns_key);
        $singular_ns_key = Helpers::singularize($ns_key);

        if(isset($this->search_keys[$ns_key])) {
            return $this->search_keys[$ns_key];

        } elseif(isset($this->search_keys[$plural_ns_key])) {
            return $this->search_keys[$plural_ns_key];

        } elseif(isset($this->search_keys[$singular_ns_key])) {
            return $this->search_keys[$singular_ns_key];

        } elseif(isset($this->search_keys[$key])) {
            return $this->search_keys[$key];

        } elseif(isset($this->search_keys[$plural_key])){
            return $this->search_keys[$plural_key];

        } elseif(isset($this->search_keys[$singular_key])){
            return $this->search_keys[$singular_key];

        } else {
            return null;
        }
    }

    /**
     * Return a representation of the search index
     *
     * @return array
     */
    public function getSearchKeys(){

        if(!$this->isIndexed())
            $this->buildSearchIndex();

        $keys = array();
        foreach($this->search_keys as $key => $model){
            $keys[$key] = sprintf('%s\\%s', get_class($model), $model->getName());
        }

        ksort($keys);
        return $keys;
    }

    /**
     * Build the search index
     */
    public function buildSearchIndex(){

        //possibly not the best place to do this, but you want it to be done as late as possible so all classes are indexed
        foreach($this->getModels() as $model){
            $this->addSearchKey(sprintf('%s\\%s', $model->getNamespace(), $model->getClassName()), $model);
            $this->addSearchKey($model->getName(), $model);
        }

        foreach($this->getEnums() as $enum){
            $this->addSearchKey($enum->getGroup(), $enum);
            $this->addSearchKey($enum->getName(), $enum);
            $this->addSearchKey($enum->getAnchor(), $enum);
        }

        $this->is_indexed = true;

    }
} 