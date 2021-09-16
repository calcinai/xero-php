<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

class LinkedTransaction extends Remote\Model
{
    /**
     * Filter by the SourceTransactionID. Get all the linked transactions created from a particular ACCPAY
     * invoice.
     *
     * @property string SourceTransactionID
     */

    /**
     * The line item identifier from the source transaction.
     *
     * @property string SourceLineItemID
     */

    /**
     * Filter by the combination of ContactID and Status. Get all the linked transactions that have been
     * assigned to a particular customer and have a particular status e.g. GET
     * /LinkedTransactions?ContactID=4bb34b03-3378-4bb2-a0ed-6345abf3224e&Status=APPROVED.
     *
     * @property string ContactID
     */

    /**
     * Filter by the TargetTransactionID. Get all the linked transactions allocated to a particular ACCREC
     * invoice.
     *
     * @property string TargetTransactionID
     */

    /**
     * The line item identifier from the target transaction. It is possible to link multiple billable
     * expenses to the same TargetLineItemID.
     *
     * @property string TargetLineItemID
     */

    /**
     * The Xero identifier for an Linked Transaction e.g.
     * /LinkedTransactions/297c2dc5-cc47-4afd-8ec8-74990b8761e9.
     *
     * @property string LinkedTransactionID
     */

    /**
     * Filter by the combination of ContactID and Status. Get all the linked transactions that have been
     * assigned to a particular customer and have a particular status e.g. GET
     * /LinkedTransactions?ContactID=4bb34b03-3378-4bb2-a0ed-6345abf3224e&Status=APPROVED.
     *
     * @property string Status
     */

    /**
     * This will always be BILLABLEEXPENSE. More types may be added in future.
     *
     * @property string Type
     */

    /**
     * The last modified date in UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * The Type of the source tranasction. This will be ACCPAY if the linked transaction was created from
     * an invoice and SPEND if it was created from a bank transaction.
     *
     * @property string SourceTransactionTypeCode
     */
    const LINKED_TRANSACTION_STATUS_DRAFT = 'DRAFT';

    const LINKED_TRANSACTION_STATUS_APPROVED = 'APPROVED';

    const LINKED_TRANSACTION_STATUS_ONDRAFT = 'ONDRAFT';

    const LINKED_TRANSACTION_STATUS_BILLED = 'BILLED';

    const LINKED_TRANSACTION_STATUS_VOIDED = 'VOIDED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'LinkedTransactions';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'LinkedTransaction';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'LinkedTransactionID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_DELETE,
        ];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'SourceTransactionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SourceLineItemID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ContactID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TargetTransactionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TargetLineItemID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'LinkedTransactionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'SourceTransactionTypeCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getSourceTransactionID()
    {
        return $this->_data['SourceTransactionID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setSourceTransactionID($value)
    {
        $this->propertyUpdated('SourceTransactionID', $value);
        $this->_data['SourceTransactionID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceLineItemID()
    {
        return $this->_data['SourceLineItemID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setSourceLineItemID($value)
    {
        $this->propertyUpdated('SourceLineItemID', $value);
        $this->_data['SourceLineItemID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getContactID()
    {
        return $this->_data['ContactID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setContactID($value)
    {
        $this->propertyUpdated('ContactID', $value);
        $this->_data['ContactID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetTransactionID()
    {
        return $this->_data['TargetTransactionID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setTargetTransactionID($value)
    {
        $this->propertyUpdated('TargetTransactionID', $value);
        $this->_data['TargetTransactionID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetLineItemID()
    {
        return $this->_data['TargetLineItemID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setTargetLineItemID($value)
    {
        $this->propertyUpdated('TargetLineItemID', $value);
        $this->_data['TargetLineItemID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLinkedTransactionID()
    {
        return $this->_data['LinkedTransactionID'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setLinkedTransactionID($value)
    {
        $this->propertyUpdated('LinkedTransactionID', $value);
        $this->_data['LinkedTransactionID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return LinkedTransaction
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceTransactionTypeCode()
    {
        return $this->_data['SourceTransactionTypeCode'];
    }

    /**
     * @param string $value
     *
     * @return LinkedTransaction
     */
    public function setSourceTransactionTypeCode($value)
    {
        $this->propertyUpdated('SourceTransactionTypeCode', $value);
        $this->_data['SourceTransactionTypeCode'] = $value;

        return $this;
    }
}
