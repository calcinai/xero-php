<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class NotImplementedException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'The method you have called has not been implemented.';

        if($code === null)
            $code = Response::STATUS_INTERNAL_ERROR;

        parent::__construct($message, $code, $previous);
    }

}