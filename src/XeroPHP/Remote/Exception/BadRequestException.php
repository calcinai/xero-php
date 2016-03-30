<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\RemoteException;
use XeroPHP\Remote\Response;

class BadRequestException extends RemoteException {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'Bad Request';

        if($code === null)
            $code = Response::STATUS_BAD_REQUEST;

        parent::__construct($message, $code, $previous);
    }

}