<?php

namespace XeroPHP\Webhook;

use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

/**
 * Represents a single event within a webhook.
 */
class Event
{
    /**
     * @var \XeroPHP\Webhook
     */
    private $webhook;

    /**
     * @var string
     */
    private $resourceUrl;

    /**
     * @var string
     */
    private $resourceId;

    /**
     * @var string
     */
    private $eventDateUtc;

    /**
     * @var string
     */
    private $eventType;

    /**
     * @var string
     */
    private $eventCategory;

    /**
     * @var string
     */
    private $tenantId;

    /**
     * @var string
     */
    private $tenantType;

    /**
     * Validates the event payload is correctly formatted.
     *
     * @param \XeroPHP\Webhook $webhook
     * @param array $event event details
     *
     * @throws \XeroPHP\Exception if the provided payload is malformed
     */
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
            'tenantType',
        ];

        foreach ($fields as $required) {
            if (!isset($event[$required])) {
                throw new \XeroPHP\Exception("The event payload was malformed; missing required field {$required}");
            }

            $this->{$required} = $event[$required];
        }
    }

    /**
     * @return \XeroPHP\Webhook
     */
    public function getWebhook()
    {
        return $this->webhook;
    }

    /**
     * @return string direct Xero URL to fetch the resource
     */
    public function getResourceUrl()
    {
        return $this->resourceUrl;
    }

    /**
     * @return string the GUID of the resource
     */
    public function getResourceId()
    {
        return $this->resourceId;
    }

    /**
     * @return string date and time of the event in UTC format
     */
    public function getEventDateUtc()
    {
        return $this->eventDateUtc;
    }

    /**
     * Returns the event date.
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return new \DateTime($this->eventDateUtc);
    }

    /**
     * @return string event type
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return string event category
     */
    public function getEventCategory()
    {
        return $this->eventCategory;
    }

    /**
     * @return string the library class to use when fetching the referenced resource
     */
    public function getEventClass()
    {
        if ($this->getEventCategory() === 'INVOICE') {
            return \XeroPHP\Models\Accounting\Invoice::class;
        }
        if ($this->getEventCategory() === 'CONTACT') {
            return \XeroPHP\Models\Accounting\Contact::class;
        }


    }

    /**
     * @return string
     */
    public function getTenantId()
    {
        return $this->tenantId;
    }

    /**
     * @return string
     */
    public function getTenantType()
    {
        return $this->tenantType;
    }

    /**
     * Fetches the resource and, if possible, loads it into it's respective model class.
     *
     * @param \XeroPHP\Application $application an optional application instance to use to retrieve the remote resource.
     *                                          Useful if you have separate instances with different oauth tokens based on the tenant
     *
     * @return array|\XeroPHP\Remote\Model If the event category is known, returns the model, otherwise, returns the resource as an array
     * @throws \XeroPHP\Remote\Exception
     */
    public function getResource($application = null)
    {
        if ($application === null) {
            $application = $this->getWebhook()->getApplication();
        }

        $url = new URL($application, $this->getResourceUrl());
        $request = new Request($application, $url, Request::METHOD_GET);
        $request->send();

        foreach ($request->getResponse()->getElements() as $element) {
            $class = $this->getEventClass();
            if ($class === null) {
                return $element;
            }
            $model = new $class($application);
            $model->fromStringArray($element);

            return $model;
        }
    }
}
