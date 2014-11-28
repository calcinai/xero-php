<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Organisation extends RemoteObject {

    /**
     * Display a unique key used for Xero-to-Xero transactions 
     *
     * @property string APIKey
     */

    /**
     * Display name of organisation shown in Xero 
     *
     * @property string Name
     */

    /**
     * Organisation name shown on Reports 
     *
     * @property string LegalName
     */

    /**
     * Boolean to describe if organisation is registered with a local tax authority i.e. true, false 
     *
     * @property bool PaysTax
     */

    /**
     * See Version Types 
     *
     * @property enum Version
     */

    /**
     * Default currency for organisation. See ISO 4217 Currency Codes 
     *
     * @property string BaseCurrency
     */

    /**
     * Country code for organisation. See ISO 3166-2 Country Codes 
     *
     * @property string CountryCode
     */

    /**
     * Boolean to describe if organisation is a demo company. 
     *
     * @property bool IsDemoCompany
     */

    /**
     * Will be set to ACTIVE if you can connect to organisation via the Xero API 
     *
     * @property string[] OrganisationStatus
     */

    /**
     * Shows for New Zealand, Australian and UK organisations 
     *
     * @property int RegistrationNumber
     */

    /**
     * Shown if set 
     *
     * @property int TaxNumber
     */

    /**
     * Calendar day e.g. 0-31 
     *
     * @property string FinancialYearEndDay
     */

    /**
     * Calendar Month e.g. 1-12 
     *
     * @property string FinancialYearEndMonth
     */

    /**
     * The accounting basis used for tax returns. See Sales Tax Basis 
     *
     * @property string[] SalesTaxBasis
     */

    /**
     * The frequency with which tax returns are processed. See Sales Tax Period 
     *
     * @property string SalesTaxPeriod
     */

    /**
     * Shown if set. See lock dates 
     *
     * @property date PeriodLockDate
     */

    /**
     * Shown if set. See lock dates 
     *
     * @property date EndOfYearLockDate
     */

    /**
     * Timestamp when the organisation was created in Xero 
     *
     * @property date CreatedDateUTC
     */

    /**
     * Organisation Type 
     *
     * @property string OrganisationEntityType
     */

    /**
     * Timezone specifications 
     *
     * @property string Timezone
     */

    /**
     * A unique identifier for the organisation. Potential uses. 
     *
     * @property string ShortCode
     */

    /**
     * Description of business type as defined in Organisation settings 
     *
     * @property string LineOfBusiness
     */

    /**
     * Address details for organisation – see Addresses 
     *
     * @property enum[] Addresses
     */

    /**
     * Phones details for organisation – see Phones 
     *
     * @property enum[] Phones
     */

    /**
     * Organisation profile links for popular services such as Facebook, Twitter, GooglePlus and LinkedIn. You 
     * can also add link to your website here. Shown if Organisation settings  is updated in Xero. See ExternalLinks 
     * below 
     *
     * @property date[] ExternalLinks
     */

    /**
     * Default payment terms for the organisation if set – See Payment Terms below 
     *
     * @property string[] PaymentTerms
     */


    /**
     * @return string
     */
    public function getAPIKey(){
        return $this->_data['APIKey'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setAPIKey($value){
        $this->_data['APIKey'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLegalName(){
        return $this->_data['LegalName'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setLegalName($value){
        $this->_data['LegalName'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getPaysTax(){
        return $this->_data['PaysTax'];
    }

    /**
     * @param bool $value
     * @return Organisation
     */
    public function setPaysTax($value){
        $this->_data['PaysTax'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getVersion(){
        return $this->_data['Version'];
    }

    /**
     * @param enum $value
     * @return Organisation
     */
    public function setVersion($value){
        $this->_data['Version'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseCurrency(){
        return $this->_data['BaseCurrency'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setBaseCurrency($value){
        $this->_data['BaseCurrency'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode(){
        return $this->_data['CountryCode'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setCountryCode($value){
        $this->_data['CountryCode'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsDemoCompany(){
        return $this->_data['IsDemoCompany'];
    }

    /**
     * @param bool $value
     * @return Organisation
     */
    public function setIsDemoCompany($value){
        $this->_data['IsDemoCompany'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationStatus(){
        return $this->_data['OrganisationStatus'];
    }

    /**
     * @param string[] $value
     * @return Organisation
     */
    public function addOrganisationStatu($value){
        $this->_data['OrganisationStatus'][] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getRegistrationNumber(){
        return $this->_data['RegistrationNumber'];
    }

    /**
     * @param int $value
     * @return Organisation
     */
    public function setRegistrationNumber($value){
        $this->_data['RegistrationNumber'] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getTaxNumber(){
        return $this->_data['TaxNumber'];
    }

    /**
     * @param int $value
     * @return Organisation
     */
    public function setTaxNumber($value){
        $this->_data['TaxNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFinancialYearEndDay(){
        return $this->_data['FinancialYearEndDay'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setFinancialYearEndDay($value){
        $this->_data['FinancialYearEndDay'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFinancialYearEndMonth(){
        return $this->_data['FinancialYearEndMonth'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setFinancialYearEndMonth($value){
        $this->_data['FinancialYearEndMonth'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalesTaxBasis(){
        return $this->_data['SalesTaxBasis'];
    }

    /**
     * @param string[] $value
     * @return Organisation
     */
    public function addSalesTaxBasi($value){
        $this->_data['SalesTaxBasis'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalesTaxPeriod(){
        return $this->_data['SalesTaxPeriod'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setSalesTaxPeriod($value){
        $this->_data['SalesTaxPeriod'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getPeriodLockDate(){
        return $this->_data['PeriodLockDate'];
    }

    /**
     * @param date $value
     * @return Organisation
     */
    public function setPeriodLockDate($value){
        $this->_data['PeriodLockDate'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getEndOfYearLockDate(){
        return $this->_data['EndOfYearLockDate'];
    }

    /**
     * @param date $value
     * @return Organisation
     */
    public function setEndOfYearLockDate($value){
        $this->_data['EndOfYearLockDate'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getCreatedDateUTC(){
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param date $value
     * @return Organisation
     */
    public function setCreatedDateUTC($value){
        $this->_data['CreatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationEntityType(){
        return $this->_data['OrganisationEntityType'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setOrganisationEntityType($value){
        $this->_data['OrganisationEntityType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTimezone(){
        return $this->_data['Timezone'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setTimezone($value){
        $this->_data['Timezone'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getShortCode(){
        return $this->_data['ShortCode'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setShortCode($value){
        $this->_data['ShortCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineOfBusiness(){
        return $this->_data['LineOfBusiness'];
    }

    /**
     * @param string $value
     * @return Organisation
     */
    public function setLineOfBusiness($value){
        $this->_data['LineOfBusiness'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getAddresses(){
        return $this->_data['Addresses'];
    }

    /**
     * @param enum[] $value
     * @return Organisation
     */
    public function addAddresse($value){
        $this->_data['Addresses'][] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getPhones(){
        return $this->_data['Phones'];
    }

    /**
     * @param enum[] $value
     * @return Organisation
     */
    public function addPhone($value){
        $this->_data['Phones'][] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getExternalLinks(){
        return $this->_data['ExternalLinks'];
    }

    /**
     * @param date[] $value
     * @return Organisation
     */
    public function addExternalLink($value){
        $this->_data['ExternalLinks'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentTerms(){
        return $this->_data['PaymentTerms'];
    }

    /**
     * @param string[] $value
     * @return Organisation
     */
    public function addPaymentTerm($value){
        $this->_data['PaymentTerms'][] = $value;
        return $this;
    }



}