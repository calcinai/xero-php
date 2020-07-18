<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class ForbiddenException extends Exception
{
    protected $message = 'You are not permitted to access this resource';

    protected $code = Response::STATUS_FORBIDDEN;

    /**
     * ForbiddenException constructor.
     * @param string $message
     * @param null $code
     */
    public function __construct($message=null,$code=null)
    {
        parent::__construct($message,$code);
        if ($message) $this->message = $message;
        if ($code) $this->code = $code;
    }


}
