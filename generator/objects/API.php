<?php

class API {

    private $name;
    private $namespace;
    private $uri;
    private $models;
    private $enums;

    public function __construct($name, $namespace) {

        $this->name = $name;
        $this->namespace = $namespace;
        $this->models = array();
        $this->enums = array();

        $this->search_keys = array();

    }

    /**
     * @return mixed
     */
    public function getEnums() {
        return $this->enums;
    }

    /**
     * @param mixed $enums
     */
    public function addEnum($enum) {
        $this->enums[] = $enum;

        $this->addSearchKey($enum->getName(), $enum);
        $this->addSearchKey($enum->getAnchor(), $enum);

    }

    /**
     * @return mixed
     */
    public function getModels() {
        return $this->models;
    }

    /**
     * @param mixed $models
     */
    public function addModel(Model $model) {
        $model->setAPI($this);

        $this->addSearchKey($model->getName(), $model);
        $this->models[] = $model;
    }

    /**
     * @return mixed
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getNamespace() {
        return $this->namespace;
    }

    /**
     * @return mixed
     */
    public function getUri() {
        return $this->uri;
    }

    /**
     * @param mixed $uri
     */
    public function setUri($uri) {
        $this->uri = $uri;
    }

    public function addSearchKey($key, $object){
        $this->search_keys[$key] = $object;
    }

    public function searchByKey($key){
        return isset($this->search_keys[$key]) ? $this->search_keys[$key] : null;
    }

} 