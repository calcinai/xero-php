<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class UnauthorizedException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'Unauthorized';

        if($code === null)
            $code = Response::STATUS_UNAUTHORISED;

        parent::__construct($message, $code, $previous);
    }
}