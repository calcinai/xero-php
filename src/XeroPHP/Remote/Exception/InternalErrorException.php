<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class InternalErrorException extends Exception
{
    public function __construct($message = null, $code = null, $previous = null)
    {
        if ($message === null) {
            $message = 'An unhandled error with the Xero API. Contact the Xero API team if problems persist.';
        }
        if ($code === null) {
            $code = Response::STATUS_INTERNAL_ERROR;
        }
        parent::__construct($message, $code, $previous);
    }
}
