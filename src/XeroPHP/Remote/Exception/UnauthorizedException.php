<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class UnauthorizedException extends Exception
{
    protected $message = 'Invalid authorization credentials.';

    protected $code = Response::STATUS_UNAUTHORISED;
}
