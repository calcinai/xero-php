<?php

namespace XeroPHP\Webhook;

use XeroPHP\Exception;
use XeroPHP\Remote\Exception\RequiredFieldException;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;
use XeroPHP\Webhook;

/**
 * Represents a single event within a webhook.
 */
class Event
{
    private \XeroPHP\Webhook $webhook;

    private string $resourceUrl;

    private string $resourceId;

    private string $eventDateUtc;

    private string $eventType;

    private string $eventCategory;

    private string $tenantId;

    private string $tenantType;

    /**
     * Validates the event payload is correctly formatted.
     *
     * @throws \XeroPHP\Exception if the provided payload is malformed
     */
    public function __construct(Webhook $webhook, array $event)
    {
        $this->webhook = $webhook;
        $fields        = [
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
                throw new RequiredFieldException(
                    get_class($this),
                    $required,
                    "The event payload was malformed; missing required field $required"
                );
            }

            $this->{$required} = $event[$required];
        }
    }

    public function getWebhook(): \XeroPHP\Webhook
    {
        return $this->webhook;
    }

    /**
     * Direct Xero URL to fetch the resource
     */
    public function getResourceUrl(): string
    {
        return $this->resourceUrl;
    }

    /**
     * The GUID of the resource
     */
    public function getResourceId(): string
    {
        return $this->resourceId;
    }

    /**
     * date and time of the event in UTC format
     */
    public function getEventDateUtc(): string
    {
        return $this->eventDateUtc;
    }

    /**
     * Returns the event date.
     */
    public function getEventDate(): \DateTime
    {
        return new \DateTime($this->eventDateUtc);
    }

    public function getEventType(): string
    {
        return $this->eventType;
    }

    public function getEventCategory(): string
    {
        return $this->eventCategory;
    }

    /**
     * return the library class to use when fetching the referenced resource
     */
    public function getEventClass(): string
    {
        if ($this->getEventCategory() === 'INVOICE') {
            return \XeroPHP\Models\Accounting\Invoice::class;
        }
        if ($this->getEventCategory() === 'CONTACT') {
            return \XeroPHP\Models\Accounting\Contact::class;
        }
        if ($this->getEventCategory() === 'SUBSCRIPTION') {
            return \XeroPHP\Models\Subscription::class;
        }

        throw new Exception('Webhook Event Category Not Recognized: ' . $this->getEventCategory());
    }

    public function getTenantId(): string
    {
        return $this->tenantId;
    }

    public function getTenantType(): string
    {
        return $this->tenantType;
    }

    /**
     * Fetches the resource and, if possible, loads it into it's respective model class.
     *
     * @param  \XeroPHP\Application  $application  an optional application instance to use to retrieve the remote resource.
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

        $url     = new URL($application, $this->getResourceUrl());
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
