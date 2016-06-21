<?php

namespace XeroPHP\Remote;

use XeroPHP\Application;

class Query {

    const ORDER_ASC  = 'ASC';
    const ORDER_DESC = 'DESC';

    /** @var  \XeroPHP\Application */
    private $app;

    private $from_class;
    private $where;
    private $order;
    private $modifiedAfter;
    private $page;
    private $fromDate;
    private $toDate;
    private $offset;

    public function __construct(Application $app) {
        $this->app = $app;
        $this->where = array();
        $this->order = null;
        $this->modifiedAfter = null;
        $this->page = null;
        $this->offset = null;
    }

    /**
     * @param string $class
     * @return $this
     */
    public function from($class) {

        $this->from_class = $this->app->validateModelClass($class);

        return $this;
    }

    /**
     * @return $this
     */
    public function where() {
        $args = func_get_args();

        if(func_num_args() === 2) {
            if(is_bool($args[1])) {
                $this->where[] = sprintf('%s=%s', $args[0], $args[1] ? 'true' : 'false');
            } elseif(is_int($args[1])) {
                $this->where[] = sprintf('%s==%s', $args[0], $args[1]);
            } elseif(preg_match('/^(\'|")?(true|false)("|\')?$/i', $args[1])) {
                $this->where[] = sprintf('%s=%s', $args[0], $args[1]);
            } elseif(preg_match('/^([a-z]+)\.\1ID$/i', $args[0]) && preg_match('/^[0-9a-f]{8}-([0-9a-f]{4}-){3}[0-9a-f]{12}$/i', $args[1])) {
                $this->where[] = sprintf('%s=Guid("%s")', $args[0], $args[1]);
            } else {
                $this->where[] = sprintf('%s=="%s"', $args[0], $args[1]);
            }
        } else {
            $this->where[] = $args[0];
        }

        return $this;
    }

    public function getWhere() {
        return implode(' AND ', $this->where);
    }

    /**
     * @param string $order
     * @param string $direction
     * @return $this
     */
    public function orderBy($order, $direction = self::ORDER_ASC) {
        $this->order = sprintf('%s %s', $order, $direction);

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $modifiedAfter
     * @return $this
     */
    public function modifiedAfter(\DateTimeInterface $modifiedAfter = null) {
        if($modifiedAfter === null) {
            $modifiedAfter = new \DateTime('@0'); // since ever
        }

        $this->modifiedAfter = $modifiedAfter->format('c');

        return $this;
    }

    /**
     * @param string $fromDate
     * @return $this
     * @throws Exception
     */
    public function fromDate($fromDate) {
        if (preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $fromDate) !== 1) {
            throw new Exception(sprintf('%s is not a valid date. Please use the format YYYY-MM-DD.', $fromDate));
        }

        $this->fromDate = $fromDate;

        return $this;
    }

    /**
     * @param string $toDate
     * @return $this
     * @throws Exception
     */
    public function toDate($toDate) {
        if (preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $toDate) !== 1) {
            throw new Exception(sprintf('%s is not a valid date. Please use the format YYYY-MM-DD.', $toDate));
        }

        $this->toDate = $toDate;

        return $this;
    }

    /**
     * @param int $page
     * @return $this
     * @throws Exception
     */
    public function page($page = 1) {
        /** @var ObjectInterface $from_class */
        $from_class = $this->from_class;
        if(!$from_class::isPageable()){
            throw new Exception(sprintf('%s does not support paging.', $from_class));
        }

        $this->page = intval($page);

        return $this;
    }

    /**
     * @param int $offset
     * @return $this
     */
    public function offset($offset = 0) {
        $this->offset = intval($offset);

        return $this;
    }

    /**
     * @return Collection
     */
    public function execute() {

        /** @var ObjectInterface $from_class */
        $from_class = $this->from_class;
        $url = new URL($this->app, $from_class::getResourceURI(), $from_class::getAPIStem());
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

        if($this->fromDate !== null) {
            $request->setParameter('fromDate', $this->fromDate);
        }

        if($this->toDate !== null) {
            $request->setParameter('toDate', $this->toDate);
        }

        if($this->page !== null) {
            $request->setParameter('page', $this->page);
        }

        if($this->offset !== null) {
            $request->setParameter('offset', $this->offset);
        }

        $request->send();

        $elements = new Collection();
        foreach($request->getResponse()->getElements() as $element) {
            /** @var Object $built_element */
            $built_element = new $from_class($this->app);
            $built_element->fromStringArray($element);
            $elements->append($built_element);
        }

        return $elements;
    }

    /**
     * @return mixed
     */
    public function getFrom() {
        return $this->from_class;
    }
}
