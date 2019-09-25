<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class ForbiddenException extends Exception
{
    protected $message = 'You are not permitted to access this resource';

    protected $code = Response::STATUS_FORBIDDEN;
}
