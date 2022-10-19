<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;

class TaxDeclaration extends Remote\Model
{
    /**
     * Xero employee identifier. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7.
     *
     * @property string EmployeeID
     */

    /**
     * See Employment Basis Types.
     *
     * @property string EmploymentBasis
     */

    /**
     * See TFN Exemption Types.
     *
     * @property string TFNExemptionType
     */

    /**
     * The tax file number e.g 123123123.
     *
     * @property string TaxFileNumber
     */

    /**
     * If the employee is Australian resident for tax purposes. e.g true or false.
     *
     * @property string AustralianResidentForTaxPurposes
     */

    /**
     * If tax free threshold claimed. e.g true or false.
     *
     * @property string TaxFreeThresholdClaimed
     */

    /**
     * If has tax offset estimated then the tax offset estimated amount. e.g 100.
     *
     * @property float TaxOffsetEstimatedAmount
     */

    /**
     * If employee has HECS or HELP dept. e.g true or false.
     *
     * @property bool HasHELPDebt
     */

    /**
     * If employee has financial supplement dept. e.g true or false.
     *
     * @property bool HasSFSSDebt
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property bool HasTSLDebt
     *
     * @deprecated
     */

    /**
     * If employee has trade support loan. e.g true or false.
     *
     * @property bool HasTradeSupportLoanDebt
     */

    /**
     * If the employee has requested that additional tax be withheld each pay run. e.g 50.
     *
     * @property string UpwardVariationTaxWithholdingAmount
     */

    /**
     * If the employee is eligible to receive an additional percentage on top of ordinary earnings when
     * they take leave (typically 17.5%). e.g true or false.
     *
     * @property string EligibleToReceiveLeaveLoading
     */

    /**
     * If the employee has approved withholding variation. e.g (0 – 100).
     *
     * @property string ApprovedWithholdingVariationPercentage
     */
    const EMPLOYMENTBASIS_FULLTIME = 'FULLTIME';

    const EMPLOYMENTBASIS_PARTTIME = 'PARTTIME';

    const EMPLOYMENTBASIS_CASUAL = 'CASUAL';

    const EMPLOYMENTBASIS_LABOURHIRE = 'LABOURHIRE';

    const EMPLOYMENTBASIS_SUPERINCOMESTREAM = 'SUPERINCOMESTREAM';

    const TFNEXEMPTIONTYPE_NOTQUOTED = 'NOTQUOTED';

    const TFNEXEMPTIONTYPE_PENDING = 'PENDING';

    const TFNEXEMPTIONTYPE_PENSIONER = 'PENSIONER';

    const TFNEXEMPTIONTYPE_UNDER18 = 'UNDER18';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TaxDeclaration';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TaxDeclaration';
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
            'EmployeeID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmploymentBasis' => [true, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TFNExemptionType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'TaxFileNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AustralianResidentForTaxPurposes' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'ResidencyStatus' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TaxFreeThresholdClaimed' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'TaxOffsetEstimatedAmount' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'HasHELPDebt' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'HasSFSSDebt' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'HasTSLDebt' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'HasTradeSupportLoanDebt' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UpwardVariationTaxWithholdingAmount' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EligibleToReceiveLeaveLoading' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ApprovedWithholdingVariationPercentage' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmploymentBasis()
    {
        return $this->_data['EmploymentBasis'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setEmploymentBasis($value)
    {
        $this->propertyUpdated('EmploymentBasis', $value);
        $this->_data['EmploymentBasis'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTFNExemptionType()
    {
        return $this->_data['TFNExemptionType'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setTFNExemptionType($value)
    {
        $this->propertyUpdated('TFNExemptionType', $value);
        $this->_data['TFNExemptionType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxFileNumber()
    {
        return $this->_data['TaxFileNumber'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setTaxFileNumber($value)
    {
        $this->propertyUpdated('TaxFileNumber', $value);
        $this->_data['TaxFileNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAustralianResidentForTaxPurposes()
    {
        return $this->_data['AustralianResidentForTaxPurposes'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setAustralianResidentForTaxPurpose($value)
    {
        $this->propertyUpdated('AustralianResidentForTaxPurposes', $value);
        $this->_data['AustralianResidentForTaxPurposes'] = $value;

        return $this;
    }

    /** @param string $value
     * @return $this
     */
    public function setResidencyStatus($value)
    {
        $this->propertyUpdated('ResidencyStatus', $value);
        $this->_data['ResidencyStatus'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getResidencyStatus()
    {
        return $this->_data['ResidencyStatus'];
    }

    /**
     * @return string
     */
    public function getTaxFreeThresholdClaimed()
    {
        return $this->_data['TaxFreeThresholdClaimed'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setTaxFreeThresholdClaimed($value)
    {
        $this->propertyUpdated('TaxFreeThresholdClaimed', $value);
        $this->_data['TaxFreeThresholdClaimed'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getTaxOffsetEstimatedAmount()
    {
        return $this->_data['TaxOffsetEstimatedAmount'];
    }

    /**
     * @param float $value
     *
     * @return TaxDeclaration
     */
    public function setTaxOffsetEstimatedAmount($value)
    {
        $this->propertyUpdated('TaxOffsetEstimatedAmount', $value);
        $this->_data['TaxOffsetEstimatedAmount'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasHELPDebt()
    {
        return $this->_data['HasHELPDebt'];
    }

    /**
     * @param bool $value
     *
     * @return TaxDeclaration
     */
    public function setHasHELPDebt($value)
    {
        $this->propertyUpdated('HasHELPDebt', $value);
        $this->_data['HasHELPDebt'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasSFSSDebt()
    {
        return $this->_data['HasSFSSDebt'];
    }

    /**
     * @param bool $value
     *
     * @return TaxDeclaration
     */
    public function setHasSFSSDebt($value)
    {
        $this->propertyUpdated('HasSFSSDebt', $value);
        $this->_data['HasSFSSDebt'] = $value;

        return $this;
    }

    /**
     * @return bool
     *
     * @deprecated
     */
    public function getHasTSLDebt()
    {
        return $this->_data['HasTSLDebt'];
    }

    /**
     * @param bool $value
     *
     * @return TaxDeclaration
     *
     * @deprecated
     */
    public function setHasTSLDebt($value)
    {
        $this->propertyUpdated('HasTSLDebt', $value);
        $this->_data['HasTSLDebt'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasTradeSupportLoanDebt()
    {
        return $this->_data['HasTradeSupportLoanDebt'];
    }

    /**
     * @param bool $value
     *
     * @return TaxDeclaration
     */
    public function setHasTradeSupportLoanDebt($value)
    {
        $this->propertyUpdated('HasTradeSupportLoanDebt', $value);
        $this->_data['HasTradeSupportLoanDebt'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpwardVariationTaxWithholdingAmount()
    {
        return $this->_data['UpwardVariationTaxWithholdingAmount'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setUpwardVariationTaxWithholdingAmount($value)
    {
        $this->propertyUpdated('UpwardVariationTaxWithholdingAmount', $value);
        $this->_data['UpwardVariationTaxWithholdingAmount'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEligibleToReceiveLeaveLoading()
    {
        return $this->_data['EligibleToReceiveLeaveLoading'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setEligibleToReceiveLeaveLoading($value)
    {
        $this->propertyUpdated('EligibleToReceiveLeaveLoading', $value);
        $this->_data['EligibleToReceiveLeaveLoading'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getApprovedWithholdingVariationPercentage()
    {
        return $this->_data['ApprovedWithholdingVariationPercentage'];
    }

    /**
     * @param string $value
     *
     * @return TaxDeclaration
     */
    public function setApprovedWithholdingVariationPercentage($value)
    {
        $this->propertyUpdated('ApprovedWithholdingVariationPercentage', $value);
        $this->_data['ApprovedWithholdingVariationPercentage'] = $value;

        return $this;
    }
}
