<?php

namespace XeroPHP\Traits;

use XeroPHP\Exception;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

trait PDFTrait {

    public function getPDF(){

        /** @var Object $this */

        if($this->hasGUID() === false){
            throw new Exception('PDF files are only available to objects that exist remotely.');
        }

        $uri = sprintf('%s/%s', $this::getResourceURI(), $this->getGUID());

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_GET);
        $request->setHeader(Request::HEADER_ACCEPT, Request::CONTENT_TYPE_PDF);

        $request->send();

        return $request->getResponse()->getResponseBody();

    }

}