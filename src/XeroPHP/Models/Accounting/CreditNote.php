<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact;
use XeroPHP\Models\Accounting\CreditNote\Allocation;
use XeroPHP\Models\Accounting\BrandingTheme;

class CreditNote extends Remote\Object {

    /**
     * An optional field to store a reference
     *
     * @property string Reference
     */

    /**
     * See Credit Note Types
     *
     * @property string Type
     */

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * The date the credit note is created YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * See Invoice Status Codes
     *
     * @property string Status
     */

    /**
     * See Invoice Line Amount Types
     *
     * @property string LineAmountTypes
     */

    /**
     * See Invoice Line Items
     *
     * @property string[] LineItems
     */

    /**
     * The subtotal of the credit note excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * The total tax on the credit note
     *
     * @property float TotalTax
     */

    /**
     * The total of the Credit Note(subtotal + total tax)
     *
     * @property float Total
     */

    /**
     * UTC timestamp of last update to contact
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * Currency used for the Credit Note
     *
     * @property string CurrencyCode
     */

    /**
     * Date when credit note was fully paid(UTC format)
     *
     * @property \DateTime FullyPaidOnDate
     */

    /**
     * Xero generated unique identifier
     *
     * @property string CreditNoteID
     */

    /**
     * The user friendly unique identifier for a credit note e.g. CN 1001
     *
     * @property string CreditNoteNumber
     */

    /**
     * boolean to indicate if a credit note has been sent to a contact via the Xero app
     *
     * @property bool SentToContact
     */

    /**
     * The currency rate for a multicurrency invoice. If no rate is specified, the XE.com day rate is used
     *
     * @property float CurrencyRate
     */

    /**
     * The remaining credit balance on the Credit Note
     *
     * @property string RemainingCredit
     */

    /**
     * See Allocations
     *
     * @property Allocation[] Allocations
     */

    /**
     * See BrandingThemes
     *
     * @property BrandingTheme BrandingThemeID
     */

    /**
     * boolean to indicate if a credit note has an attachment
     *
     * @property bool HasAttachments
     */


    const CREDIT_NOTE_TYPE_ACCPAYCREDIT = 'ACCPAYCREDIT'; 
    const CREDIT_NOTE_TYPE_ACCRECCREDIT = 'ACCRECCREDIT'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'CreditNotes';
    }


    /*
    * Get the stem of the API (core.xro) etc
    */
    public static function getAPIStem(){
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
            return array(
                'Reference',
                'Type',
                'Contact',
                'Date',
                'Status',
                'LineAmountTypes',
                'LineItems',
                'SubTotal',
                'TotalTax',
                'Total',
                'UpdatedDateUTC',
                'CurrencyCode',
                'FullyPaidOnDate',
                'CreditNoteID',
                'CreditNoteNumber',
                'SentToContact',
                'CurrencyRate',
                'RemainingCredit',
                'Allocations',
                'BrandingThemeID',
                'HasAttachments'
        );
    }


    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact(){
        return $this->_data['Contact'];
    }

    /**
     * @param Contact $value
     * @return CreditNote
     */
    public function setContact(Contact $value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return CreditNote
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setLineAmountType($value){
        $this->_data['LineAmountTypes'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineItems(){
        return $this->_data['LineItems'];
    }

    /**
     * @param string[] $value
     * @return CreditNote
     */
    public function addLineItem($value){
        $this->_data['LineItems'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getSubTotal(){
        return $this->_data['SubTotal'];
    }

    /**
     * @param float $value
     * @return CreditNote
     */
    public function setSubTotal($value){
        $this->_data['SubTotal'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotalTax(){
        return $this->_data['TotalTax'];
    }

    /**
     * @param float $value
     * @return CreditNote
     */
    public function setTotalTax($value){
        $this->_data['TotalTax'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTotal(){
        return $this->_data['Total'];
    }

    /**
     * @param float $value
     * @return CreditNote
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return CreditNote
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCurrencyCode(){
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setCurrencyCode($value){
        $this->_data['CurrencyCode'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFullyPaidOnDate(){
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @param \DateTime $value
     * @return CreditNote
     */
    public function setFullyPaidOnDate(\DateTime $value){
        $this->_data['FullyPaidOnDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreditNoteID(){
        return $this->_data['CreditNoteID'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setCreditNoteID($value){
        $this->_data['CreditNoteID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreditNoteNumber(){
        return $this->_data['CreditNoteNumber'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setCreditNoteNumber($value){
        $this->_data['CreditNoteNumber'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSentToContact(){
        return $this->_data['SentToContact'];
    }

    /**
     * @param bool $value
     * @return CreditNote
     */
    public function setSentToContact($value){
        $this->_data['SentToContact'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param float $value
     * @return CreditNote
     */
    public function setCurrencyRate($value){
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRemainingCredit(){
        return $this->_data['RemainingCredit'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setRemainingCredit($value){
        $this->_data['RemainingCredit'] = $value;
        return $this;
    }

    /**
     * @return Allocation
     */
    public function getAllocations(){
        return $this->_data['Allocations'];
    }

    /**
     * @param Allocation[] $value
     * @return CreditNote
     */
    public function addAllocation(Allocation $value){
        $this->_data['Allocations'][] = $value;
        return $this;
    }

    /**
     * @return BrandingTheme
     */
    public function getBrandingThemeID(){
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param BrandingTheme $value
     * @return CreditNote
     */
    public function setBrandingThemeID(BrandingTheme $value){
        $this->_data['BrandingThemeID'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool $value
     * @return CreditNote
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}