<?php

namespace XeroPHP\Remote;

use DateTime;
use XeroPHP\Application;

class Query
{
    const ORDER_ASC = 'ASC';

    const ORDER_DESC = 'DESC';

    /** @var \XeroPHP\Application */
    private $app;

    private $from_class;

    private $where;

    private $order;

    private $modifiedAfter;

    private $page;

    private $fromDate;

    private $toDate;

    private $date;

    private $offset;

    private $includeArchived;

    private $createdByMyApp;

    private $params;

    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->where = [];
        $this->order = null;
        $this->modifiedAfter = null;
        $this->page = null;
        $this->offset = null;
        $this->includeArchived = false;
        $this->createdByMyApp = false;
        $this->params = [];
    }

    /**
     * @param string $class
     *
     * @return $this
     */
    public function from($class)
    {
        $this->from_class = $this->app->validateModelClass($class);

        return $this;
    }

    /**
     * Adds a WHERE statement to the query.
     * Can also be used to chain an AND WHERE statement to a query.
     *
     * @return $this
     */
    public function where()
    {
        return $this->addWhere('AND', func_get_args());
    }

    /**
     * Chains an OR WHERE statement on to the query.
     *
     * @return $this
     */
    public function orWhere()
    {
        return $this->addWhere('OR', func_get_args());
    }

    /**
     * Chains an AND WHERE statement on to the query.
     * ( Note this method is effectively an alias for where() to help make fluent
     * queries more readable and less ambiguous ).
     *
     * @return $this
     */
    public function andWhere()
    {
        return $this->addWhere('AND', func_get_args());
    }

    /**
     * @param string $operator
     * @param array $args
     *
     * @return $this
     */
    public function addWhere($operator, $args)
    {
        // Add operator unless this is the first where statement
        if (count($this->where) > 0) {
            $this->where[] = $operator;
        }

        if (count($args) === 2) {
            if (is_bool($args[1])) {
                $this->where[] = sprintf('%s=%s', $args[0], $args[1] ? 'true' : 'false');
            } elseif (is_int($args[1]) || is_float($args[1])) {
                $this->where[] = sprintf('%s==%s', $args[0], $args[1]);
            } elseif (preg_match('/^(\'|")?(true|false)("|\')?$/i', $args[1])) {
                $this->where[] = sprintf('%s=%s', $args[0], $args[1]);
            } elseif (preg_match('/^([a-z]+)(\\.\\1)?ID$/i', $args[0])
                && preg_match(
                    '/^[0-9a-f]{8}-([0-9a-f]{4}-){3}[0-9a-f]{12}$/i',
                    $args[1]
                )
            ) {
                $this->where[] = sprintf('%s=Guid("%s")', $args[0], $args[1]);
            } elseif (preg_match('/^DateTime\(.+\)$/', $args[1])) {
                $this->where[] = sprintf('%s==%s', $args[0], $args[1]);
            } else {
                $this->where[] = sprintf('%s=="%s"', $args[0], $args[1]);
            }
        } else {
            $this->where[] = $args[0];
        }

        return $this;
    }

    /**
     * Concatenates the array of where statements stored in $this->where and returns
     * them as a string.
     *
     * @return string
     */
    public function getWhere()
    {
        return implode(' ', $this->where);
    }

    /**
     * @param string $order
     * @param string $direction
     *
     * @return $this
     */
    public function orderBy($order, $direction = self::ORDER_ASC)
    {
        $this->order = sprintf('%s %s', $order, $direction);

        return $this;
    }

    /**
     * @param \DateTimeInterface|null $modifiedAfter
     *
     * @return $this
     */
    public function modifiedAfter(\DateTimeInterface $modifiedAfter = null)
    {
        if ($modifiedAfter === null) {
            $modifiedAfter = new \DateTime('@0'); // since ever
        }

        $this->modifiedAfter = $modifiedAfter->format('c');

        return $this;
    }

    /**
     * @param DateTime $fromDate
     *
     * @return $this
     */
    public function fromDate(DateTime $fromDate)
    {
        $this->fromDate = $fromDate->format('Y-m-d');

        return $this;
    }

    /**
     * @param DateTime $toDate
     *
     * @return $this
     */
    public function toDate(DateTime $toDate)
    {
        $this->toDate = $toDate->format('Y-m-d');

        return $this;
    }

    /**
     * @param DateTime $date
     *
     * @return $this
     */
    public function date(DateTime $date)
    {
        $this->date = $date->format('Y-m-d');

        return $this;
    }

    /**
     * @param int $page
     *
     * @throws Exception
     *
     * @return $this
     */
    public function page($page = 1)
    {
        /**
         * @var ObjectInterface
         */
        $from_class = $this->from_class;
        if (! $from_class::isPageable()) {
            throw new Exception(sprintf('%s does not support paging.', $from_class));
        }
        $this->page = (int) $page;

        return $this;
    }

    /**
     * @param int $offset
     *
     * @return $this
     */
    public function offset($offset = 0)
    {
        $this->offset = (int) $offset;

        return $this;
    }

    public function includeArchived($includeArchived = true)
    {
        $this->includeArchived = (bool) $includeArchived;

        return $this;
    }

    public function createdByMyApp($createdByMyApp = true)
    {
        $this->createdByMyApp = (bool) $createdByMyApp;

        return $this;
    }

    public function setParameter($key, $value)
    {
        $this->params[(string) $key] = (string) $value;

        return $this;
    }

    /**
     * @return Collection
     */
    public function execute()
    {
        /**
         * @var ObjectInterface
         */
        $from_class = $this->from_class;
        $url = new URL(
            $this->app,
            $from_class::getResourceURI(),
            $from_class::getAPIStem()
        );
        $request = new Request($this->app, $url, Request::METHOD_GET);

        // Add params
        foreach ($this->params as $key => $value) {
            $request->setParameter($key, $value);
        }

        // Concatenate where statements
        $where = $this->getWhere();

        if (! empty($where)) {
            $request->setParameter('where', $where);
        }

        if ($this->order !== null) {
            $request->setParameter('order', $this->order);
        }

        if ($this->modifiedAfter !== null) {
            $request->setHeader('If-Modified-Since', $this->modifiedAfter);
        }

        if ($this->fromDate !== null) {
            $request->setParameter('fromDate', $this->fromDate);
        }

        if ($this->toDate !== null) {
            $request->setParameter('toDate', $this->toDate);
        }

        if ($this->date !== null) {
            $request->setParameter('date', $this->date);
        }

        if ($this->page !== null) {
            $request->setParameter('page', $this->page);
        }

        if ($this->offset !== null) {
            $request->setParameter('offset', $this->offset);
        }

        if ($this->includeArchived !== false) {
            $request->setParameter('includeArchived', 'true');
        }

        if ($this->createdByMyApp !== false) {
            $request->setParameter('createdByMyApp', 'true');
        }

        $request->send();

        $elements = new Collection();
        foreach ($request->getResponse()->getElements() as $element) {
            /**
             * @var Model
             */
            $built_element = new $from_class($this->app);
            $built_element->fromStringArray($element);
            $elements->append($built_element);
        }

        return $elements;
    }

    public function first()
    {
        return $this->execute()->first();
    }

    public function last()
    {
        return $this->execute()->last();
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from_class;
    }
}
