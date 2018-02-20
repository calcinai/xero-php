<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class NotFoundException extends Exception
{
    protected $message = 'Resource Not Found';

    protected $code = Response::STATUS_NOT_FOUND;
}
