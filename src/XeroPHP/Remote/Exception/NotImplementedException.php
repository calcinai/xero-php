<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class NotImplementedException extends Exception
{
    protected $message = 'The method you have called has not been implemented.';

    protected $code = Response::STATUS_INTERNAL_ERROR;
}
