<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\HistoryTrait;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\BankTransfer\ToBankAccount;
use XeroPHP\Models\Accounting\BankTransfer\FromBankAccount;

class BankTransfer extends Remote\Model
{
    use AttachmentTrait;
    use HistoryTrait;

    /**
     * See FromBankAccount.
     *
     * @property FromBankAccount FromBankAccount
     */

    /**
     * See ToBankAccount.
     *
     * @property ToBankAccount ToBankAccount
     */

    /**
     * @property string Amount
     */

    /**
     * The date of the Transfer YYYY-MM-DD.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * The identifier of the Bank Transfer.
     *
     * @property string BankTransferID
     */

    /**
     * The currency rate.
     *
     * @property float CurrencyRate
     */

    /**
     * The Bank Transaction ID for the source account.
     *
     * @property string FromBankTransactionID
     */

    /**
     * The Bank Transaction ID for the destination account.
     *
     * @property string ToBankTransactionID
     */

    /**
     * Boolean to indicate if a Bank Transfer has an attachment.
     *
     * @property bool HasAttachments
     */

    /**
     * UTC timestamp of creation date of bank transfer.
     *
     * @property \DateTimeInterface CreatedDateUTC
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BankTransfers';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BankTransfer';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'BankTransferID';
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
            'FromBankAccount' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\BankTransfer\\FromBankAccount', false, false],
            'ToBankAccount' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\BankTransfer\\ToBankAccount', false, false],
            'Amount' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'BankTransferID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CurrencyRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'FromBankTransactionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ToBankTransactionID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CreatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return FromBankAccount
     */
    public function getFromBankAccount()
    {
        return $this->_data['FromBankAccount'];
    }

    /**
     * @param FromBankAccount $value
     *
     * @return BankTransfer
     */
    public function setFromBankAccount(FromBankAccount $value)
    {
        $this->propertyUpdated('FromBankAccount', $value);
        $this->_data['FromBankAccount'] = $value;

        return $this;
    }

    /**
     * @return ToBankAccount
     */
    public function getToBankAccount()
    {
        return $this->_data['ToBankAccount'];
    }

    /**
     * @param ToBankAccount $value
     *
     * @return BankTransfer
     */
    public function setToBankAccount(ToBankAccount $value)
    {
        $this->propertyUpdated('ToBankAccount', $value);
        $this->_data['ToBankAccount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param string $value
     *
     * @return BankTransfer
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

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
     *
     * @return BankTransfer
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransferID()
    {
        return $this->_data['BankTransferID'];
    }

    /**
     * @param string $value
     *
     * @return BankTransfer
     */
    public function setBankTransferID($value)
    {
        $this->propertyUpdated('BankTransferID', $value);
        $this->_data['BankTransferID'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate()
    {
        return $this->_data['CurrencyRate'];
    }

    /**
     * @return string
     */
    public function getFromBankTransactionID()
    {
        return $this->_data['FromBankTransactionID'];
    }

    /**
     * @return string
     */
    public function getToBankTransactionID()
    {
        return $this->_data['ToBankTransactionID'];
    }

    /**
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data['CreatedDateUTC'];
    }
}
