<?php

namespace XeroPHP\Webhook;

use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

class Event
{
    private $webhook;
    private $resourceUrl;
    private $resourceId;
    private $eventDateUtc;
    private $eventType;
    private $eventCategory;
    private $tenantId;
    private $tenantType;

    public function __construct($webhook, $event)
    {
        $this->webhook = $webhook;
        $fields = [
            'resourceUrl',
            'resourceId',
            'eventDateUtc',
            'eventType',
            'eventCategory',
            'tenantId',
            'tenantType'
        ];

        foreach ($fields as $required) {
            if (!isset($event[$required])) {
                throw new \XeroPHP\Application\Exception("The event payload was malformed; missing required field $required");
            }

            $this->{$required} = $event[$required];
        }
    }

    public function getWebhook()
    {
        return $this->webhook;
    }

    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    public function getResourceId()
    {
        return $this->resourceId;
    }

    public function getEventDateUtc()
    {
        return $this->eventDateUtc;
    }

    public function getEventDate()
    {
        return new \DateTime($this->eventDateUtc);
    }

    public function getEventType()
    {
        return $this->eventType;
    }

    public function getEventCategory()
    {
        return $this->eventCategory;
    }

    public function getEventClass()
    {
        if ($this->getEventCategory() == 'INVOICE') {
            return \XeroPHP\Models\Accounting\Invoice::class;
        }
        if ($this->getEventCategory() == 'CONTACT') {
            return \XeroPHP\Models\Accounting\Contact::class;
        }

        return null;
    }

    public function getTenantId()
    {
        return $this->tenantId;
    }

    public function getTenantType()
    {
        return $this->tenantType;
    }

    public function getResource($application = null)
    {
        if ($application == null) {
            $application = $this->getWebhook()->getApplication();
        }

        $url = new URL($application, $this->getResourceUrl());
        $request = new Request($application, $url, Request::METHOD_GET);
        $request->send();

        foreach ($request->getResponse()->getElements() as $element) {
            $class = $this->getEventClass();
            if ($class == null) {
                return $element;
            } else {
                $model = new $class($application);
                $model->fromStringArray($element);
                return $model;
            }
        }
    }
}
