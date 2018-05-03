<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class BadRequestException extends Exception
{
    protected $message = 'Bad Request';

    protected $code = Response::STATUS_BAD_REQUEST;
}
