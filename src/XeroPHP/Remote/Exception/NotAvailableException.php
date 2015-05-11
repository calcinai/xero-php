<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class NotAvailableException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'API is currently unavailable.';

        if($code === null)
            $code = Response::STATUS_NOT_AVAILABLE;

        parent::__construct($message, $code, $previous);
    }

}