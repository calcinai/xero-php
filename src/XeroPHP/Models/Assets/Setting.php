<?php

namespace XeroPHP\Models\Assets;

use XeroPHP\Remote;

class Setting extends Remote\Model
{
    /**
     * The prefix used for fixed asset numbers (“FA-” by default).
     *
     * @property string assetNumberPrefix
     */

    /**
     * The next available sequence number.
     *
     * @property string assetNumberSequence
     */

    /**
     * The date depreciation calculations started on registered fixed assets in Xero.
     *
     * @property \DateTimeInterface assetStartDate
     */

    /**
     * The last depreciation date.
     *
     * @property \DateTimeInterface lastDepreciationDate
     */

    /**
     * Default account that gains are posted to.
     *
     * @property string defaultGainOnDisposalAccountId
     */

    /**
     * Default account that losses are posted to.
     *
     * @property string defaultLossOnDisposalAccountId
     */

    /**
     * Default account that capital gains are posted to.
     *
     * @property string defaultCapitalGainOnDisposalAccount
     */

    /**
     * @property string optInForTax
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Settings';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Setting';
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
        return Remote\URL::API_ASSET;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_GET,
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
            'assetNumberPrefix' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'assetNumberSequence' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'assetStartDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'lastDepreciationDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'defaultGainOnDisposalAccountId' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'defaultLossOnDisposalAccountId' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'defaultCapitalGainOnDisposalAccount' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'optInForTax' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getassetNumberPrefix()
    {
        return $this->_data['assetNumberPrefix'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setassetNumberPrefix($value)
    {
        $this->propertyUpdated('assetNumberPrefix', $value);
        $this->_data['assetNumberPrefix'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getassetNumberSequence()
    {
        return $this->_data['assetNumberSequence'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setassetNumberSequence($value)
    {
        $this->propertyUpdated('assetNumberSequence', $value);
        $this->_data['assetNumberSequence'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getassetStartDate()
    {
        return $this->_data['assetStartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Setting
     */
    public function setassetStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('assetStartDate', $value);
        $this->_data['assetStartDate'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getlastDepreciationDate()
    {
        return $this->_data['lastDepreciationDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Setting
     */
    public function setlastDepreciationDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('lastDepreciationDate', $value);
        $this->_data['lastDepreciationDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getdefaultGainOnDisposalAccountId()
    {
        return $this->_data['defaultGainOnDisposalAccountId'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setdefaultGainOnDisposalAccountId($value)
    {
        $this->propertyUpdated('defaultGainOnDisposalAccountId', $value);
        $this->_data['defaultGainOnDisposalAccountId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getdefaultLossOnDisposalAccountId()
    {
        return $this->_data['defaultLossOnDisposalAccountId'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setdefaultLossOnDisposalAccountId($value)
    {
        $this->propertyUpdated('defaultLossOnDisposalAccountId', $value);
        $this->_data['defaultLossOnDisposalAccountId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getdefaultCapitalGainOnDisposalAccount()
    {
        return $this->_data['defaultCapitalGainOnDisposalAccount'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setdefaultCapitalGainOnDisposalAccount($value)
    {
        $this->propertyUpdated('defaultCapitalGainOnDisposalAccount', $value);
        $this->_data['defaultCapitalGainOnDisposalAccount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getoptInForTax()
    {
        return $this->_data['optInForTax'];
    }

    /**
     * @param string $value
     *
     * @return Setting
     */
    public function setoptInForTax($value)
    {
        $this->propertyUpdated('optInForTax', $value);
        $this->_data['optInForTax'] = $value;

        return $this;
    }
}
