<?php

namespace XeroPHP\Traits;

use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;
use XeroPHP\Exception;

trait SendEmailTrait
{
    public function sendEmail()
    {
        /**
         * Allows the document to be sent by email to the customer
         * currently only availbale for Invoices.
         * Invoice status should be SUBMITTED, AUTHORISED or PAID.
         * The email address for the Contact should also be set.
         *
         * Documentation here:
         * https://developer.xero.com/documentation/api/invoices#email
         *
         * @var \XeroPHP\Remote\Model $this
         */
        $uri = sprintf('%s/%s/Email', $this::getResourceURI(), $this->getGUID());
        
        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_POST);
        
        $request->send();
        
        return $this;
    }
}
