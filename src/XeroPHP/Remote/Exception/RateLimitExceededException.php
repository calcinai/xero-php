<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class RateLimitExceededException extends Exception
{
    protected $message = 'The API rate limit for your organisation/application pairing has been exceeded.';

    protected $code = Response::STATUS_RATE_LIMIT_EXCEEDED;

    protected $rateLimitProblem;
    protected $retryAfter;

    public static function createFromHeaders($headers)
    {
        $headers = array_change_key_case($headers, CASE_LOWER);

        $problem = isset($headers['x-rate-limit-problem']) ? current($headers['x-rate-limit-problem']) : null;
        $retryAfter = isset($headers['retry-after']) ? current($headers['retry-after']) : null;

        $exception = new self();
        $exception->setRateLimitProblem($problem);
        $exception->setRetryAfter($retryAfter);

        return $exception;
    }

    public function setRateLimitProblem($rateLimitProblem)
    {
        $this->rateLimitProblem = strtolower($rateLimitProblem);
    }

    public function getRateLimitProblem()
    {
        return $this->rateLimitProblem;
    }

    public function setRetryAfter($retryAfter)
    {
        $this->retryAfter = (int) $retryAfter;
    }

    public function getRetryAfter()
    {
        return $this->retryAfter;
    }
}
