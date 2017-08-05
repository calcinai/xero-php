<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class NotAvailableException extends Exception
{
    protected $message = 'API is currently unavailable.';

    protected $code = Response::STATUS_NOT_AVAILABLE;
}
