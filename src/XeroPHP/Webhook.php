<?php

namespace XeroPHP;

/**
 * Represents a webhook and it's associated event list
 */
class Webhook
{
    /**
     * @var \XeroPHP\Application
     */
    private $application;
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $rawPayload;
    /**
     * @var array
     */
    private $payload;
    /**
     * @var string
     */
    private $webhookEvent;

    /**
     * Parse a webhook payload from Xero
     *
     * @param \XeroPHP\Application $application the application the webhook was delivered to
     * @param string $payload raw json payload
     * @param mixed $event class name used for dependency injection
     * @throws \XeroPHP\Application\Exception
     */
    public function __construct($application, $payload, $event = null)
    {
        $this->application = $application;
        $this->rawPayload = $payload;
        $this->key = $application->getConfigOption('webhook', 'signing_key');
        $this->payload = json_decode($this->rawPayload, true);
        if ($event === null) {
            $event = Webhook\Event::class;
        }
        $this->webhookEvent = $event;

        // bail if json_decode fails
        if ($this->payload === null) {
            throw new Application\Exception("The webhook payload could not be decoded: ".json_last_error_msg());
        }

        // bail if we don't have all the fields we are expecting
        if (!isset($this->payload['events']) or
            !isset($this->payload['firstEventSequence']) or
            !isset($this->payload['lastEventSequence'])) {
                throw new Application\Exception("The webhook payload was malformed");
        }
    }

    /**
     * @return \XeroPHP\Application
     */
    public function getApplication()
    {
        return $this->application;
    }

    /**
     * Returns the calculated signature of the payload and your signing key
     *
     * @return string hashed payload
     */
    public function getSignature()
    {
        return base64_encode(hash_hmac('sha256', $this->rawPayload, $this->key, true));
    }

    /**
     * Validates the calculated signature against the given x-xero-signature header
     *
     * @param  string $signature value from
     * @return [type]            [description]
     */
    public function validate($signature)
    {
        return $this->getSignature() === $signature;
    }

    /**
     * @return int first event sequence ID
     */
    public function getFirstEventSequence()
    {
        return $this->payload['firstEventSequence'];
    }

    /**
     * @return int last event sequence ID
     */
    public function getLastEventSequence()
    {
        return $this->payload['lastEventSequence'];
    }

    /**
     * Parses and returns a list of events for this webhook
     *
     * @return \XeroPHP\Webhook\Event[] list of events
     */
    public function getEvents()
    {
        $result = [];
        foreach ($this->payload['events'] as $event) {
            $result[] = new $this->webhookEvent($this, $event);
        }

        return $result;
    }
}
