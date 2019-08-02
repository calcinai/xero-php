<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class BatchPayment extends Remote\Model
{

    /**
     * Date the payment is being made (YYYY-MM-DD) e.g. 2009-09-06
     *
     * @property \DateTimeInterface Date
     */

    /**
     * Narticulars, Code, Reference
     *
     * @property string Reference
     */

    /**
     *
     *
     * @property Account Account
     */

    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */

    /**
     * The Xero identifier for an Batch Payment e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string BatchPaymentID
     */

    /**
     * (UK Only) Only shows on the statement line in Xero. Max length =18
     *
     * @property string Narrative
     */ 

    /**
     * See Types.
     *
     * @property string PaymentType
     */        

    public static function getResourceURI()
    {
        return 'BatchPayments';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BatchPayment';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'BatchPaymentID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT
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
            'Account' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Account', false, false],
            'Narrative' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Details' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BatchPaymentID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Payments' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Payment', true, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TotalAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'IsReconciled' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->_data['Account'];
    }

    /**
     * @param Account $value
     * @return Payment
     */
    public function setAccount(Account $value)
    {
        $this->propertyUpdated('Account', $value);
        $this->_data['Account'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getNarrative()
    {
        return $this->_data['Narrative'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setNarrative($value)
    {
        $this->propertyUpdated('Narrative', $value);
        $this->_data['Narrative'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetails()
    {
        return $this->_data['Details'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setDetails($value)
    {
        $this->propertyUpdated('Details', $value);
        $this->_data['Details'] = $value;
        return $this;
    }    

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     * @return Payment
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return Payment
     */
    public function getPayment()
    {
        if (!isset($this->_data['Payments'])) {
            $this->_data['Payments'] = new Remote\Collection();
        }

        return $this->_data['Payments'];
    }

    /**
     * @param Payment $value
     * @return Payment
     */
    public function addPayments(Payment $value)
    {
        $this->propertyUpdated('Payments', $value);
        if (!isset($this->_data['Payments'])) {
            $this->_data['Payments'] = new Remote\Collection();
        }
        $this->_data['Payments'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBatchPaymentID()
    {
        return $this->_data['BatchPaymentID'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setBatchPaymentID($value)
    {
        $this->propertyUpdated('BatchPaymentID', $value);
        $this->_data['BatchPaymentID'] = $value;
        return $this;
    }    

}
