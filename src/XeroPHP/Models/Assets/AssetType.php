<?php

namespace XeroPHP\Models\Assets;

use XeroPHP\Remote;
use XeroPHP\Models\Assets\AssetType\BookDepreciationSetting;

class AssetType extends Remote\Model
{
    /**
     * The name of the asset type.
     *
     * @property string assetTypeName
     */

    /**
     * The asset account for fixed assets of this type.
     *
     * @property string fixedAssetAccountId
     */

    /**
     * The expense account for the depreciation of fixed assets of this type.
     *
     * @property string depreciationExpenseAccountId
     */

    /**
     * The account for accumulated depreciation of fixed assets of this type.
     *
     * @property string accumulatedDepreciationAccountId
     */

    /**
     * See bookDepreciationSetting.
     *
     * @property BookDepreciationSetting BookDepreciationSetting
     */

    /**
     * Xero generated unique identifier for asset types.
     *
     * @property string assetTypeId
     */

    /**
     * All asset types that have accumulated  depreciation for any assets that use them are deemed
     * ‘locked’ and cannot be removed.
     *
     * @property string Locks
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'AssetTypes';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'AssetType';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'assetTypeId';
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
            Remote\Request::METHOD_POST,
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
            'assetTypeName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'fixedAssetAccountId' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'depreciationExpenseAccountId' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'accumulatedDepreciationAccountId' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'BookDepreciationSetting' => [true, self::PROPERTY_TYPE_OBJECT, 'Assets\\AssetType\\BookDepreciationSetting', false, false],
            'assetTypeId' => [true, self::PROPERTY_TYPE_GUID, null, false, false],
            'Locks' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getassetTypeName()
    {
        return $this->_data['assetTypeName'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setassetTypeName($value)
    {
        $this->propertyUpdated('assetTypeName', $value);
        $this->_data['assetTypeName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getfixedAssetAccountId()
    {
        return $this->_data['fixedAssetAccountId'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setfixedAssetAccountId($value)
    {
        $this->propertyUpdated('fixedAssetAccountId', $value);
        $this->_data['fixedAssetAccountId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getdepreciationExpenseAccountId()
    {
        return $this->_data['depreciationExpenseAccountId'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setdepreciationExpenseAccountId($value)
    {
        $this->propertyUpdated('depreciationExpenseAccountId', $value);
        $this->_data['depreciationExpenseAccountId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getaccumulatedDepreciationAccountId()
    {
        return $this->_data['accumulatedDepreciationAccountId'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setaccumulatedDepreciationAccountId($value)
    {
        $this->propertyUpdated('accumulatedDepreciationAccountId', $value);
        $this->_data['accumulatedDepreciationAccountId'] = $value;

        return $this;
    }

    /**
     * @return BookDepreciationSetting
     */
    public function getBookDepreciationSetting()
    {
        return $this->_data['BookDepreciationSetting'];
    }

    /**
     * @param BookDepreciationSetting $value
     *
     * @return AssetType
     */
    public function setBookDepreciationSetting(BookDepreciationSetting $value)
    {
        $this->propertyUpdated('BookDepreciationSetting', $value);
        $this->_data['BookDepreciationSetting'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getassetTypeId()
    {
        return $this->_data['assetTypeId'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setassetTypeId($value)
    {
        $this->propertyUpdated('assetTypeId', $value);
        $this->_data['assetTypeId'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLocks()
    {
        return $this->_data['Locks'];
    }

    /**
     * @param string $value
     *
     * @return AssetType
     */
    public function setLock($value)
    {
        $this->propertyUpdated('Locks', $value);
        $this->_data['Locks'] = $value;

        return $this;
    }
}
