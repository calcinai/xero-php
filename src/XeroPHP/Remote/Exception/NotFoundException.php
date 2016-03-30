<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\RemoteException;
use XeroPHP\Remote\Response;

class NotFoundException extends RemoteException {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'Resource Not Found';

        if($code === null)
            $code = Response::STATUS_NOT_FOUND;

        parent::__construct($message, $code, $previous);
    }

}