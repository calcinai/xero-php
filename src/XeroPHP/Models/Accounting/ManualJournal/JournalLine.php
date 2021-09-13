<?php

namespace XeroPHP\Models\Accounting\ManualJournal;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TrackingCategory;

class JournalLine extends Remote\Model
{
    /**
     * total for line. Debits are positive, credits are negative value.
     *
     * @property string LineAmount
     */

    /**
     * See Accounts.
     *
     * @property string AccountCode
     */

    /**
     * Description for journal line.
     *
     * @property string Description
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * Optional Tracking Category – see Tracking. Any JournalLine can have a maximum of 2
     * <TrackingCategory> elements.
     *
     * @property TrackingCategory[] Tracking
     */

    /**
     * The calculated tax amount based on the TaxType and LineAmount.
     *
     * @property float TaxAmount
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
        return '';
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
            'LineAmount' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountCode' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Tracking' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TrackingCategory', true, false],
            'TaxAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getLineAmount()
    {
        return $this->_data['LineAmount'];
    }

    /**
     * @param string $value
     *
     * @return JournalLine
     */
    public function setLineAmount($value)
    {
        $this->propertyUpdated('LineAmount', $value);
        $this->_data['LineAmount'] = $value;

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
     * @return Remote\Collection|TrackingCategory[]
     */
    public function getTracking()
    {
        return $this->_data['Tracking'];
    }

    /**
     * @param TrackingCategory $value
     *
     * @return JournalLine
     */
    public function addTracking(TrackingCategory $value)
    {
        $this->propertyUpdated('Tracking', $value);
        if (! isset($this->_data['Tracking'])) {
            $this->_data['Tracking'] = new Remote\Collection();
        }
        $this->_data['Tracking'][] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount()
    {
        return $this->_data['TaxAmount'];
    }
}
