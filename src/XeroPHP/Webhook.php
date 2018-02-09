<?php

namespace XeroPHP;

class Webhook
{
    private $application;
    private $key;
    private $rawPayload;
    private $payload;
    private $webhookEvent;

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

    public function getApplication()
    {
        return $this->application;
    }

    public function getSignature()
    {
        return base64_encode(hash_hmac('sha256', $this->rawPayload, $this->key, true));
    }

    public function validate($signature)
    {
        return $this->getSignature() === $signature;
    }

    public function getFirstEventSequence()
    {
        return $this->payload['firstEventSequence'];
    }

    public function getLastEventSequence()
    {
        return $this->payload['lastEventSequence'];
    }

    public function getEvents()
    {
        $result = [];
        foreach ($this->payload['events'] as $event) {
            $result[] = new $this->webhookEvent($this, $event);
        }

        return $result;
    }
}
