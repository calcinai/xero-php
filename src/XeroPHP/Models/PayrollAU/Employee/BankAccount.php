<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;

class BankAccount extends Remote\Model
{
    /**
     * The text that will appear on your employee’s bank statement when they receive payment (max length
     * = 18).
     *
     * @property string StatementText
     */

    /**
     * The name of the account (max length = 32).
     *
     * @property string AccountName
     */

    /**
     * The BSB number of the account (length = 6).
     *
     * @property string BSB
     */

    /**
     * The account number (max length = 9).
     *
     * @property string AccountNumber
     */

    /**
     * If this account is the Remaining bank account.
     *
     * @property string Remainder
     */

    /**
     * Fixed amounts (for example, if an employee wants to have $100 of their salary transferred to one
     * account, and the remaining amount to another).
     *
     * @property float Amount
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BankAccount';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BankAccount';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
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
            'StatementText' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BSB' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Remainder' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Amount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getStatementText()
    {
        return $this->_data['StatementText'];
    }

    /**
     * @param string $value
     *
     * @return BankAccount
     */
    public function setStatementText($value)
    {
        $this->propertyUpdated('StatementText', $value);
        $this->_data['StatementText'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->_data['AccountName'];
    }

    /**
     * @param string $value
     *
     * @return BankAccount
     */
    public function setAccountName($value)
    {
        $this->propertyUpdated('AccountName', $value);
        $this->_data['AccountName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getBSB()
    {
        return $this->_data['BSB'];
    }

    /**
     * @param string $value
     *
     * @return BankAccount
     */
    public function setBSB($value)
    {
        $this->propertyUpdated('BSB', $value);
        $this->_data['BSB'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->_data['AccountNumber'];
    }

    /**
     * @param string $value
     *
     * @return BankAccount
     */
    public function setAccountNumber($value)
    {
        $this->propertyUpdated('AccountNumber', $value);
        $this->_data['AccountNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemainder()
    {
        return $this->_data['Remainder'];
    }

    /**
     * @param string $value
     *
     * @return BankAccount
     */
    public function setRemainder($value)
    {
        $this->propertyUpdated('Remainder', $value);
        $this->_data['Remainder'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return BankAccount
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }
}
