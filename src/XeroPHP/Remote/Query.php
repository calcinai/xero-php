<?php

namespace XeroPHP\Remote;


class Query {

    const ORDER_ASC  = 'ASC';
    const ORDER_DESC = 'DESC';

    private $app;
    private $from;
    private $where;
    private $order;
    private $modifiedAfter;
    private $page;
    private $offset;

    public function __construct($app) {
        $this->app = $app;
        $this->where = array();
        $this->order = null;
        $this->modifiedAfter = null;
        $this->page = null;
        $this->offset = null;
    }

    public function from($class) {
        $config = $this->app->getConfig('xero');

        if($class[0] !== '\\')
            $class = sprintf('%s\\%s', $config['model_namespace'], $class);

        if(!class_exists($class))
            throw new Exception("Class does not exist [$class]");

        $this->from = $class;

        return $this;
    }

    public function where() {
        $args = func_get_args();

        if(func_num_args() === 2) {
            $this->where[] = sprintf('%s=="%s"', $args[0], $args[1]);
        } else {
            $this->where[] = $args[0];
        }

        return $this;
    }

    public function getWhere() {
        return implode(' AND ', $this->where);
    }

    public function orderBy($order, $direction = self::ORDER_ASC) {
        $this->order = sprintf('%s %s', $order, $direction);
    }

    public function modifiedAfter(\DateTime $modifiedAfter = null) {
        if($modifiedAfter === null) {
            $modifiedAfter = new \DateTime('@0'); // since ever
        }

        $this->modifiedAfter = $modifiedAfter->format('c');

        return $this;
    }

    public function page($page = 1) {
        $this->page = intval($page);

        return $this;
    }

    public function offset($offset = 0) {
        $this->offset = intval($offset);

        return $this;
    }

    public function execute() {

        $from_class = $this->from;
        $url = new URL($this->app, $from_class::getResourceURI());
        $request = new Request($this->app, $url, Request::METHOD_GET);

        $where = $this->getWhere();
        if(!empty($where)) {
            $request->setParameter('where', $where);
        }

        if($this->order !== null) {
            $request->setParameter('order', $this->order);
        }

        if($this->modifiedAfter !== null) {
            $request->setHeader('If-Modified-Since', $this->modifiedAfter);
        }

        if($this->page !== null) {
            $request->setParameter('page', $this->page);
        }

        if($this->offset !== null) {
            $request->setParameter('offset', $this->offset);
        }

        $request->send();

        $elements = array();
        foreach($request->getResponse()->getElements() as $element) {
            $built_element = new $from_class;
            $built_element->fromStringArray($element);
            $elements[] = $built_element;
        }

        return $elements;
    }


    public function getFrom() {
        return $this->from;
    }
}
