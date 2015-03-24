<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class NotFoundException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'Resource Not Found';

        if($code === null)
            $code = Response::STATUS_NOT_FOUND;

        parent::__construct($message, $code, $previous);
    }

}