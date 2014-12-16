<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class RateLimitExceededException extends Exception {

    public function __construct($message = null, $code = null, $previous = null){

        if($message === null)
            $message = 'Rate Limit Exceeded';

        if($code === null)
            $code = Response::STATUS_RATE_LIMIT_EXCEEDED;

        parent::__construct($message, $code, $previous);
    }

}