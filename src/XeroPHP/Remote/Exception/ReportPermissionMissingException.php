<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class ReportPermissionMissingException extends Exception
{
    protected $message = 'You are not permitted to access this resource without the reporting role or higher privileges';

    protected $code = Response::STATUS_FORBIDDEN;
}
