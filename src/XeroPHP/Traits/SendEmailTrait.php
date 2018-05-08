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
         * @var Object $this
         */
        $uri = sprintf('%s/%s/Email', $this::getResourceURI(), $this->getGUID());
        
        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_POST);
        
        $request->send();
        
        $response = $request->getResponse();
        
        if (false !== $element = current($response->getElements())) {
            $attachment->fromStringArray($element);
        }
        
        return $this;
    }
}
