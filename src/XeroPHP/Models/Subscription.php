<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

/**
 * Property ref: https://developer.xero.com/documentation/api/xero-app-store/subscriptions/#get-subscription
 * @property int $id The unique identifier for the subscription
 * @property string $currentPeriodEnd Date when the current subscription period ends
 * @property string $endDate If the subscription has been canceled, this is the date when the subscription ends. If null, the subscription is active and has not been cancelled
 * @property bool $testMode Boolean used to indicate if the subscription is in test mode
 * @property string $organisationId The Xero generated unique identifier for the organisation
 * @property Plan[] $plans THe plan which has been subscribed to. See Plan
 * @property string $startDate Date when the subscription was first created
 * @property string $status Status of the subscription. ACTIVE, CANCELLED, PAST_DUE
 */
class Subscription extends Model {
    const SUBSCRIPTION_STATUS_ACTIVE = 'ACTIVE';

    const SUBSCRIPTION_STATUS_CANCELLED = 'CANCELLED';

    const SUBSCRIPTION_STATUS_PAST_DUE = 'PAST_DUE';

    public static function getProperties()
    {
        return [
            'id' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'currentPeriodEnd' => [true, self::PROPERTY_TYPE_DATE, null, false, false],
            'endDate' => [false, self::PROPERTY_TYPE_DATE, null, false, false],
            'testMode' => [true, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'organizationId' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'plans' => [true, self::PROPERTY_TYPE_OBJECT, '\\Plan', true, false],
            'startDate' => [true, self::PROPERTY_TYPE_DATE, null, false, false],
            'status' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
        ];
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_data['id'];
    }

    /**
     * @return string
     */
    public function getCurrentPeriodEnd()
    {
        return $this->_data['currentPeriodEnd'];
    }

    /**
     * @return string
     */
    public function getEndDate()
    {
        return $this->_data['endDate'];
    }

    /**
     * @return bool
     */
    public function getTestMode()
    {
        return $this->_data['testMode'];
    }

    /**
     * @return string
     */
    public function getOrganisationId()
    {
        return $this->_data['organisationId'];
    }

    public static function getGUIDProperty()
    {
        return 'id';
    }

    public static function getResourceURI()
    {
        return 'Subscriptions';
    }

    public static function isPageable()
    {
        return true;
    }

    public static function getSupportedMethods()
    {
        return [
            Request::METHOD_GET,
        ];
    }

    public static function getRootNodeName()
    {
        return 'Subscription';
    }

    public static function getAPIStem()
    {
        return URL::API_CORE;
    }
}
