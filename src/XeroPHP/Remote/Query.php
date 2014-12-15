<?php

namespace XeroPHP\Remote;


use XeroPHP\Helpers;

class Query {

    private $app;
    private $from;
    private $where;

    private $elements;

    public function __construct($app){
        $this->app = $app;
        $this->where = array();
    }

    public function from($class){
        $config = $this->app->getConfig('xero');

        if($class[0] !== '\\')
            $class = sprintf('%s\\%s', $config['model_namespace'], $class);

        if(!class_exists($class))
            throw new Exception("Class does not exist [$class]");

        $this->from = $class;

        return $this;
    }

    public function where(){
        $args = func_get_args();

        if(func_num_args() === 2){
            $this->where[] = sprintf('%s="%s"', $args[0], self::escape($args[1]));
        } else {
            $this->where[] = $args[0];
        }

        return $this;
    }

    public function getWhere(){
        return implode(' AND ', $this->where);
    }

    public function execute(){

        $from_class = $this->from;
        $url = new URL($this->app, $from_class::getResourceURI());
        $request = new Request($this->app, $url, Request::METHOD_GET);

        $where = $this->getWhere();
        if(!empty($where))
            $request->setParameter('where', $where);

        $response = $request->send();

        foreach($response->getElements() as $element){
            $built_element = new $from_class;
            $built_element->fromStringArray($element);
            $elements[] = $built_element;
        }

        return $elements;
    }


    public function getFrom(){
        return $this->from;
    }


    public static function escape($string){
        return Helpers::escape($string);
    }
} 