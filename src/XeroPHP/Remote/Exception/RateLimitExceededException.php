<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class RateLimitExceededException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'The API rate limit for your organisation/application pairing has been exceeded.';

        if($code === null)
            $code = Response::STATUS_RATE_LIMIT_EXCEEDED;

        parent::__construct($message, $code, $previous);
    }

}