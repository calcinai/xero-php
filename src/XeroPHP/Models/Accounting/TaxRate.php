<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\TaxRate\TaxComponent;

class TaxRate extends Remote\Model
{
    /**
     * Name of tax rate.
     *
     * @property string Name
     */

    /**
     * See Tax Types – can only be used on update calls.
     *
     * @property string TaxType
     */

    /**
     * See TaxComponents.
     *
     * @property TaxComponent[] TaxComponents
     */

    /**
     * See Status Codes.
     *
     * @property string Status
     */

    /**
     * See ReportTaxTypes.
     *
     * @property string ReportTaxType
     */

    /**
     * Boolean to describe if tax rate can be used for asset accounts i.e. true,false.
     *
     * @property bool CanApplyToAssets
     */

    /**
     * Boolean to describe if tax rate can be used for equity accounts i.e. true,false.
     *
     * @property bool CanApplyToEquity
     */

    /**
     * Boolean to describe if tax rate can be used for expense accounts i.e. true,false.
     *
     * @property bool CanApplyToExpenses
     */

    /**
     * Boolean to describe if tax rate can be used for liability accounts i.e. true,false.
     *
     * @property bool CanApplyToLiabilities
     */

    /**
     * Boolean to describe if tax rate can be used for revenue accounts i.e. true,false.
     *
     * @property bool CanApplyToRevenue
     */

    /**
     * Tax Rate (decimal to 4dp) e.g 12.5000.
     *
     * @property float DisplayTaxRate
     */

    /**
     * Effective Tax Rate (decimal to 4dp) e.g 12.5000.
     *
     * @property float EffectiveRate
     */
    const TAX_STATUS_ACTIVE = 'ACTIVE';

    const TAX_STATUS_DELETED = 'DELETED';

    const TAX_STATUS_ARCHIVED = 'ARCHIVED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TaxRates';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TaxRate';
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
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TaxComponents' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\TaxRate\\TaxComponent', true, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ReportTaxType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'CanApplyToAssets' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CanApplyToEquity' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CanApplyToExpenses' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CanApplyToLiabilities' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'CanApplyToRevenue' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'DisplayTaxRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'EffectiveRate' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return TaxRate
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

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
     * @return TaxRate
     */
    public function setTaxType($value)
    {
        $this->propertyUpdated('TaxType', $value);
        $this->_data['TaxType'] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|TaxComponent[]
     */
    public function getTaxComponents()
    {
        return $this->_data['TaxComponents'];
    }

    /**
     * @param TaxComponent $value
     *
     * @return TaxRate
     */
    public function addTaxComponent(TaxComponent $value)
    {
        $this->propertyUpdated('TaxComponents', $value);
        if (! isset($this->_data['TaxComponents'])) {
            $this->_data['TaxComponents'] = new Remote\Collection();
        }
        $this->_data['TaxComponents'][] = $value;

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
     * @return TaxRate
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
    public function getReportTaxType()
    {
        return $this->_data['ReportTaxType'];
    }

    /**
     * @param string $value
     *
     * @return TaxRate
     */
    public function setReportTaxType($value)
    {
        $this->propertyUpdated('ReportTaxType', $value);
        $this->_data['ReportTaxType'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getCanApplyToAssets()
    {
        return $this->_data['CanApplyToAssets'];
    }

    /**
     * @return bool
     */
    public function getCanApplyToEquity()
    {
        return $this->_data['CanApplyToEquity'];
    }

    /**
     * @return bool
     */
    public function getCanApplyToExpenses()
    {
        return $this->_data['CanApplyToExpenses'];
    }

    /**
     * @return bool
     */
    public function getCanApplyToLiabilities()
    {
        return $this->_data['CanApplyToLiabilities'];
    }

    /**
     * @return bool
     */
    public function getCanApplyToRevenue()
    {
        return $this->_data['CanApplyToRevenue'];
    }

    /**
     * @return float
     */
    public function getDisplayTaxRate()
    {
        return $this->_data['DisplayTaxRate'];
    }

    /**
     * @return float
     */
    public function getEffectiveRate()
    {
        return $this->_data['EffectiveRate'];
    }
}
