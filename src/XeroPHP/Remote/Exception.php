<?php

namespace XeroPHP\Remote;

class Exception extends \XeroPHP\Exception
{
    protected ?Response $response = null;

    public function setResponse(Response $response): self
    {
        $this->response = $response;
        return $this;
    }

    public function getResponse(): ?Response {
        return $this->response;
    }
}
