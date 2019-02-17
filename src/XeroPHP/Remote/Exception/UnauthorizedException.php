<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class UnauthorizedException extends Exception
{
    protected $message = 'Invalid authorization credentials.';

    protected $code = Response::STATUS_UNAUTHORISED;
}
