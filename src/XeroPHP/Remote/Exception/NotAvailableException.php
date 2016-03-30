<?php

namespace XeroPHP\Remote\Exception;

use XeroPHP\Remote\RemoteException;
use XeroPHP\Remote\Response;

class NotAvailableException extends RemoteException {

    public function __construct($message = null, $code = null, $previous = null) {

        if($message === null)
            $message = 'API is currently unavailable.';

        if($code === null)
            $code = Response::STATUS_NOT_AVAILABLE;

        parent::__construct($message, $code, $previous);
    }

}