<?php

namespace XeroPHP\Models\Accounting\Journal;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TaxRate;
use XeroPHP\Models\Accounting\TrackingCategory;

class JournalLine extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string JournalLineID
     */

    /**
     * See Accounts.
     *
     * @property string AccountID
     */

    /**
     * See Accounts.
     *
     * @property string AccountCode
     */

    /**
     * See Account Types.
     *
     * @property string AccountType
     */

    /**
     * See AccountCodes.
     *
     * @property string AccountName
     */

    /**
     * The description from the source transaction line item. Only returned if populated.
     *
     * @property string Description
     */

    /**
     * Net amount of journal line. This will be a positive value for a debit and negative for a credit.
     *
     * @property float NetAmount
     */

    /**
     * Gross amount of journal line (NetAmount + TaxAmount).
     *
     * @property float GrossAmount
     */

    /**
     * Total tax on a journal line.
     *
     * @property float TaxAmount
     */

    /**
     * see TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * see TaxRates.
     *
     * @property TaxRate TaxName
     */

    /**
     * see Tracking.
     *
     * @property TrackingCategory[] TrackingCategories
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'JournalLines';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'JournalLine';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'JournalLineID';
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
            'JournalLineID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountCode' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'AccountName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'NetAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'GrossAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TaxAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TaxName' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TaxRate', false, false],
            'TrackingCategories' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getJournalLineID()
    {
        return $this->_data['JournalLineID'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setJournalLineID($value)
    {
        $this->propertyUpdated('JournalLineID', $value);
        $this->_data['JournalLineID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountID()
    {
        return $this->_data['AccountID'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setAccountID($value)
    {
        $this->propertyUpdated('AccountID', $value);
        $this->_data['AccountID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode()
    {
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setAccountCode($value)
    {
        $this->propertyUpdated('AccountCode', $value);
        $this->_data['AccountCode'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountType()
    {
        return $this->_data['AccountType'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setAccountType($value)
    {
        $this->propertyUpdated('AccountType', $value);
        $this->_data['AccountType'] = $value;

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
     * @return JournalLine
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
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getNetAmount()
    {
        return $this->_data['NetAmount'];
    }

    /**
     * @param float $value
     *
     * @return JournalLine
     */
    public function setNetAmount($value)
    {
        $this->propertyUpdated('NetAmount', $value);
        $this->_data['NetAmount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getGrossAmount()
    {
        return $this->_data['GrossAmount'];
    }

    /**
     * @param float $value
     *
     * @return JournalLine
     */
    public function setGrossAmount($value)
    {
        $this->propertyUpdated('GrossAmount', $value);
        $this->_data['GrossAmount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->_data['TaxAmount'];
    }

    /**
     * @param float $value
     *
     * @return JournalLine
     */
    public function setTaxAmount($value)
    {
        $this->propertyUpdated('TaxAmount', $value);
        $this->_data['TaxAmount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType()
    {
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setTaxType($value)
    {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;

        return $this;
    }

    /**
     * @return TaxRate
     */
    public function getTaxName()
    {
        return $this->_data['TaxName'];
    }

    /**
     * @param TaxRate $value
     *
     * @return JournalLine
     */
    public function setTaxName(TaxRate $value)
    {
        $this->propertyUpdated('TaxName', $value);
        $this->_data['TaxName'] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TrackingCategory[]
     */
    public function getTrackingCategories()
    {
        return $this->_data['TrackingCategories'];
    }

    /**
     * @param TrackingCategory $value
     *
     * @return JournalLine
     */
    public function addTrackingCategory(TrackingCategory $value)
    {
        $this->propertyUpdated('TrackingCategories', $value);
        if (! isset($this->_data['TrackingCategories'])) {
            $this->_data['TrackingCategories'] = new Remote\Collection();
        }
        $this->_data['TrackingCategories'][] = $value;

        return $this;
    }
}
