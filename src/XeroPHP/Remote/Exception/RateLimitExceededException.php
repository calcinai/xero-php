<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class RateLimitExceededException extends Exception
{
    protected $message = 'The API rate limit for your organisation/application pairing has been exceeded.';

    protected $code = Response::STATUS_RATE_LIMIT_EXCEEDED;

    protected $rateLimitProblem = null;

    public function setRateLimitProblem($rateLimitProblem)
    {
        $this->rateLimitProblem = strtolower($rateLimitProblem);
    }

    public function getRateLimitProblem()
    {
        return $this->rateLimitProblem;
    }
}
