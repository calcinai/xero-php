<?php

namespace XeroPHP\Models\Assets\AssetType;

use XeroPHP\Remote;

class BookDepreciationSetting extends Remote\Model
{
    /**
     * The method of depreciation applied to this asset. See Depreciation Methods.
     *
     * @property string depreciationMethod
     */

    /**
     * The method of averaging applied to this asset. See Averaging Methods.
     *
     * @property string averagingMethod
     */

    /**
     * The rate of depreciation (e.g. 0.05).
     *
     * @property float depreciationRate
     */

    /**
     * The effective life of the assets of this type in years. Not required if using depreciationRate.
     *
     * @property float[] effectiveLifeYears
     */

    /**
     * See Depreciation Calculation Methods.
     *
     * @property string depreciationCalculationMethod
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'BookDepreciationSetting';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'BookDepreciationSetting';
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
            'depreciationMethod' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'averagingMethod' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'depreciationRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'effectiveLifeYears' => [false, self::PROPERTY_TYPE_FLOAT, null, true, false],
            'depreciationCalculationMethod' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getdepreciationMethod()
    {
        return $this->_data['depreciationMethod'];
    }

    /**
     * @param string $value
     *
     * @return BookDepreciationSetting
     */
    public function setdepreciationMethod($value)
    {
        $this->propertyUpdated('depreciationMethod', $value);
        $this->_data['depreciationMethod'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getaveragingMethod()
    {
        return $this->_data['averagingMethod'];
    }

    /**
     * @param string $value
     *
     * @return BookDepreciationSetting
     */
    public function setaveragingMethod($value)
    {
        $this->propertyUpdated('averagingMethod', $value);
        $this->_data['averagingMethod'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getdepreciationRate()
    {
        return $this->_data['depreciationRate'];
    }

    /**
     * @param float $value
     *
     * @return BookDepreciationSetting
     */
    public function setdepreciationRate($value)
    {
        $this->propertyUpdated('depreciationRate', $value);
        $this->_data['depreciationRate'] = $value;

        return $this;
    }

    /**
     * @return float[]|Remote\Collection
     */
    public function geteffectiveLifeYears()
    {
        return $this->_data['effectiveLifeYears'];
    }

    /**
     * @param float $value
     *
     * @return BookDepreciationSetting
     */
    public function addeffectiveLifeYear($value)
    {
        $this->propertyUpdated('effectiveLifeYears', $value);
        if (! isset($this->_data['effectiveLifeYears'])) {
            $this->_data['effectiveLifeYears'] = new Remote\Collection();
        }
        $this->_data['effectiveLifeYears'][] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getdepreciationCalculationMethod()
    {
        return $this->_data['depreciationCalculationMethod'];
    }

    /**
     * @param string $value
     *
     * @return BookDepreciationSetting
     */
    public function setdepreciationCalculationMethod($value)
    {
        $this->propertyUpdated('depreciationCalculationMethod', $value);
        $this->_data['depreciationCalculationMethod'] = $value;

        return $this;
    }
}
