<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Response;
use XeroPHP\Remote\Exception;

class OrganisationOfflineException extends Exception
{
    protected $message = 'The organisation temporarily cannot be connected to.';

    protected $code = Response::STATUS_ORGANISATION_OFFLINE;
}
