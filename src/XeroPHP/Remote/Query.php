<?php

namespace XeroPHP\Remote;

use XeroPHP\Application;
use XeroPHP\Exception;
use XeroPHP\Remote\Exception\QueryParameterNotSetException;
use XeroPHP\Remote\Exception\QueryParameterNotUsedException;

class Query {

    const ORDER_ASC  = 'ASC';
    const ORDER_DESC = 'DESC';

    /**
     * @var Application
     */
    private $app;

    private $from_class;
    private $where;
    private $order;
    private $modifiedAfter;
    private $page;
    private $offset;

    /**
     * @var bool
     */
    private $includeArchived = false;

    /**
     * @var mixed[]
     */
    private $parameters = [];

    /**
     * @var mixed[]
     */
    private $internalParameters = [];

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
     * @param string $where
     * @param mixed|null $value
     * @return $this
     */
    public function where($where, $value = null) {
        if ($value !== null) {
            $parameterName = $this->addInternalParameter($value);
            $this->where[] = sprintf('%s==%s', $where, ":$parameterName");
        } else {
            $this->where[] = $where;
        }

        return $this;
    }

    /**
     * @param string $where
     * @param mixed|null $value
     * @return $this
     */
    public function andWhere($where, $value = null) {
        return $this->where($where, $value);
    }

    /**
     * @return string
     */
    public function getWhere() {
        return implode(' AND ', array_map(function($where) {
            return "($where)";
        }, $this->where));
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return $this
     */
    public function setParameter($key, $value)
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    /**
     * @param mixed[] $values
     * @return $this
     */
    public function setParameters($values)
    {
        $this->parameters = [];
        foreach ($values as $key => $value) {
            $this->setParameter($key, $value);
        }

        return $this;
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
     * @param \DateTime|null $modifiedAfter
     * @return $this
     */
    public function modifiedAfter(\DateTime $modifiedAfter = null) {
        if($modifiedAfter === null) {
            $modifiedAfter = new \DateTime('@0'); // since ever
        }

        $this->modifiedAfter = $modifiedAfter->format('c');

        return $this;
    }

    /**
     * @param int|null $page
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
     * @param bool $includeArchived
     * @return $this
     */
    public function includeArchived($includeArchived = true) {
        $this->includeArchived = $includeArchived == true;

        return $this;
    }

    /**
     * @return array
     */
    public function execute() {

        /** @var ObjectInterface $from_class */
        $from_class = $this->from_class;
        $request = $this->getRequest();
        $request->send();

        $elements = array();
        foreach($request->getResponse()->getElements() as $element) {
            /** @var \XeroPHP\Models\Files\Object $built_element */
            $built_element = new $from_class($this->app);
            $built_element->fromStringArray($element);
            $elements[] = $built_element;
        }

        return $elements;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        $from_class = $this->from_class;
        $url = new URL($this->app, $from_class::getResourceURI());
        $request = new Request($this->app, $url, Request::METHOD_GET);

        $where = $this->getParsedWhere();
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

        if($this->includeArchived !== false) {
            $request->setParameter('includeArchived', $this->includeArchived);
        }

        return $request;
    }

    /**
     * @return string
     * @throws QueryParameterNotUsedException
     */
    private function getParsedWhere()
    {
        $usedParameters = [];
        $parsedWhere = preg_replace_callback('/:[\?_a-zA-Z0-9]+/', function($matches) use (&$usedParameters) {
            $parameterKey = ltrim($matches[0], ':');
            $usedParameters[$parameterKey] = true;

            return $this->convertPHPValueToXeroQuery($this->getParameter($parameterKey));
        }, $this->getWhere());

        if (count($usedParameters) != (count($this->parameters) + count($this->internalParameters))) {
            throw new QueryParameterNotUsedException('Too many parameters: the query defines ' . count($usedParameters) . ' parameters and you bound ' . (count($this->parameters) + count($this->internalParameters)));
        }

        return $parsedWhere;
    }

    /**
     * @param string $value
     * @return string
     */
    private function convertPHPValueToXeroQuery($value)
    {
        if ($value instanceof \DateTime) {
            return sprintf('DateTime(%s)', $value->format('Y,m,d'));
        } else if (is_int($value) || is_float($value)) {
            return (string) $value;
        } else if ($value === true) {
            return 'true';
        } else if ($value === false) {
            return 'false';
        }

        return sprintf('"%s"', addslashes($value));
    }

    public function getFrom() {
        return $this->from_class;
    }

    /**
     * @return int key of added value
     */
    private function addInternalParameter($value)
    {
        $key = count($this->internalParameters);
        $this->internalParameters[$key] = $value;

        return "?$key";
    }

    /**
     * @param string $key
     * @return mixed
     * @throws QueryParameterNotSetException
     */
    private function getParameter($key)
    {
        if ($key[0] === '?') {
            return $this->getInternalParameter($key);
        }

        if (isset($this->parameters[$key])) {
            return $this->parameters[$key];
        }

        throw new QueryParameterNotSetException("Query parameter is not set '$key'");
    }

    /**
     * @param string $key
     * @return mixed
     */
    private function getInternalParameter($key)
    {
        return $this->internalParameters[ltrim($key, '?')];
    }
}
