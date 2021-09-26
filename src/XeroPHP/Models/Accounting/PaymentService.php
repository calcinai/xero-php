<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class PaymentService extends Remote\Model
{

    /**
     * Xero identifier
     *
     * @property string PaymentServiceID
     */

    /**
     * Name of Payment Service
     *
     * @property string Name
     */


    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'PaymentServices';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'PaymentService';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PaymentServiceID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET
        ];
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'PaymentServiceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PaymentServiceName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PaymentServiceUrl' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PayNowText' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PaymentServiceType' => [false, self::PROPERTY_TYPE_STRING, null, false, false]
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getPaymentServiceID()
    {
        return $this->_data['PaymentServiceID'];
    }

    /**
     * @param string $value
     * @return PaymentService
     */
    public function setPaymentServiceID($value)
    {
        $this->propertyUpdated('PaymentServiceID', $value);
        $this->_data['PaymentServiceID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentServiceName()
    {
        return $this->_data['PaymentServiceName'];
    }

    /**
     * @param string $value
     * @return PaymentService
     */
    public function setPaymentServiceName($value)
    {
        $this->propertyUpdated('PaymentServiceName', $value);
        $this->_data['PaymentServiceName'] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getSortOrder()
    {
        return $this->_data['SortOrder'];
    }

    /**
     * @param int $value
     * @return PaymentService
     */
    public function setSortOrder($value)
    {
        $this->propertyUpdated('SortOrder', $value);
        $this->_data['SortOrder'] = $value;
        return $this;
    }

    /**
     * @param LineItem $value
     * @return PaymentService
     */
    public function addLineItem(LineItem $value)
    {
        $this->propertyUpdated('LineItems', $value);
        if (!isset($this->_data['LineItems'])) {
            $this->_data['LineItems'] = new Remote\Collection();
        }
        $this->_data['LineItems'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentServiceUrl()
    {
        return $this->_data['PaymentServiceUrl'];
    }

    /**
     * @param string $value
     * @return PaymentService
     */
    public function setPaymentServiceUrl($value)
    {
        $this->propertyUpdated('PaymentServiceUrl', $value);
        $this->_data['PaymentServiceUrl'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayNowText()
    {
        return $this->_data['PayNowText'];
    }

    /**
     * @param string $value
     * @return PaymentService
     */
    public function setPayNowText($value)
    {
        $this->propertyUpdated('PayNowText', $value);
        $this->_data['PayNowText'] = $value;
        return $this;
    }
}
