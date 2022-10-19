<?php

namespace XeroPHP\Models;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\Request;
use XeroPHP\Remote\URL;

/**
 * Property ref: https://developer.xero.com/documentation/api/xero-app-store/subscriptions/#get-subscription
 */
class Subscription extends Model {

    /**
     * The unique identifier for the subscription
     * 
     * @property int $id
     */

    /**
     * Date when the current subscription period ends
     *
     * @property string $currentPeriodEnd
     */

    /** 
     * If the subscription has been canceled, this is the date when the subscription ends. If null, the subscription is active and has not been cancelled
     *
     * @property string $endDate
     */    

    /**
     * Boolean used to indicate if the subscription is in test mode
     * 
     * @property bool $testMode
     */

    /**
     * The Xero generated unique identifier for the organisation
     * 
     * @property string $organisationId
     */

    /**
     * THe plan which has been subscribed to. See Plan
     * 
     * @property Plan[] $plans
     */

    /**
     * Date when the subscription was first created
     * 
     * @property string $startDate
     */

    /**
     * Status of the subscription. ACTIVE, CANCELLED, PAST_DUE
     * 
     * @property string $status
     */

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
