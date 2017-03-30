<?php

namespace XeroPHP\Traits;

use XeroPHP\Models\Accounting\Attachment;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;
use XeroPHP\Exception;

trait AttachmentTrait
{
    public function addAttachment(Attachment $attachment, $include_online = false)
    {
        /**
         * @var Object $this
         */
        $uri = sprintf('%s/%s/Attachments/%s', $this::getResourceURI(), $this->getGUID(), rawurlencode($attachment->getFileName()));

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_POST);

        if($include_online){
            $request->setParameter('IncludeOnline', 'true');
        }

        $request->setBody($attachment->getContent(), $attachment->getMimeType());
        $request->send();

        $response = $request->getResponse();

        if (false !== $element = current($response->getElements())) {
            $attachment->fromStringArray($element);
        }

        return $this;
    }

    public function getAttachments()
    {
        /**
         * @var Object $this
         */
        if ($this->hasGUID() === false) {
            throw new Exception(
                'Attachments are only available to objects that exist remotely.'
            );
        }

        $uri = sprintf(
            '%s/%s/Attachments',
            $this::getResourceURI(),
            $this->getGUID()
        );

        $url = new URL($this->_application, $uri);
        $request = new Request($this->_application, $url, Request::METHOD_GET);
        $request->send();

        $attachments = [];
        foreach ($request->getResponse()->getElements() as $element) {
            $attachment = new Attachment($this->_application);
            $attachment->fromStringArray($element);
            $attachments[] = $attachment;
        }

        return $attachments;
    }
}
