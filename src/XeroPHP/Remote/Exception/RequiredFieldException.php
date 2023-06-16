<?php

namespace XeroPHP\Remote\Exception;

use Throwable;
use XeroPHP\Remote\Exception;

class RequiredFieldException extends Exception
{
    protected $class;
    protected $field;

    public function __construct($class, $field, $message = "", $code = 0, Throwable $previous = null)
    {
        $this->class = $class;
        $this->field = $field;

        parent::__construct($message, $code, $previous);
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getField()
    {
        return $this->field;
    }
}