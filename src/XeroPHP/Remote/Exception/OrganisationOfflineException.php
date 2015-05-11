<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\Exception;
use XeroPHP\Remote\Response;

class OrganisationOfflineException extends Exception {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'The organisation temporarily cannot be connected to.';

        if($code === null)
            $code = Response::STATUS_ORGANISATION_OFFLINE;

        parent::__construct($message, $code, $previous);
    }

}