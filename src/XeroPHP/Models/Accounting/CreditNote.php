<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class CreditNote extends RemoteObject {

    /**
     * An optional field to store a reference 
     *
     * @property string Reference
     */

    /**
     * See Credit Note Types 
     *
     * @property enum Type
     */

    /**
     * See Contacts 
     *
     * @property string Contact
     */

    /**
     * The date the credit note is created YYYY-MM-DD 
     *
     * @property date Date
     */

    /**
     * See Invoice Status Codes 
     *
     * @property enum[] Status
     */

    /**
     * See Invoice Line Amount Types 
     *
     * @property float[] LineAmountTypes
     */

    /**
     * See Invoice Line Items 
     *
     * @property string[] LineItems
     */

    /**
     * The subtotal of the credit note excluding taxes 
     *
     * @property string SubTotal
     */

    /**
     * The total tax on the credit note 
     *
     * @property string TotalTax
     */

    /**
     * The total of the Credit Note(subtotal + total tax) 
     *
     * @property string Total
     */

    /**
     * UTC timestamp of last update to contact 
     *
     * @property date UpdatedDateUTC
     */

    /**
     * Currency used for the Credit Note 
     *
     * @property string CurrencyCode
     */

    /**
     * Date when credit note was fully paid(UTC format) 
     *
     * @property date FullyPaidOnDate
     */

    /**
     * Xero generated unique identifier 
     *
     * @property string CreditNoteID
     */

    /**
     * The user friendly unique identifier for a credit note e.g. CN 1001 
     *
     * @property int CreditNoteNumber
     */

    /**
     * boolean to indicate if a credit note has been sent to a contact via the Xero app 
     *
     * @property bool SentToContact
     */

    /**
     * The currency rate for a multicurrency invoice. If no rate is specified, the XE.com day rate is used 
     *
     * @property string CurrencyRate
     */

    /**
     * The remaining credit balance on the Credit Note 
     *
     * @property string RemainingCredit
     */

    /**
     * See Allocations 
     *
     * @property object[] Allocations
     */

    /**
     * See BrandingThemes 
     *
     * @property string BrandingThemeID
     */

    /**
     * boolean to indicate if a credit note has an attachment 
     *
     * @property bool[] HasAttachments
     */


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
     * @return enum
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param enum $value
     * @return CreditNote
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContact(){
        return $this->_data['Contact'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setContact($value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return CreditNote
     */
    public function setDate($value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param enum[] $value
     * @return CreditNote
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param float[] $value
     * @return CreditNote
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
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
     * @return string
     */
    public function getSubTotal(){
        return $this->_data['SubTotal'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setSubTotal($value){
        $this->_data['SubTotal'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotalTax(){
        return $this->_data['TotalTax'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setTotalTax($value){
        $this->_data['TotalTax'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTotal(){
        return $this->_data['Total'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param date $value
     * @return CreditNote
     */
    public function setUpdatedDateUTC($value){
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
     * @return date
     */
    public function getFullyPaidOnDate(){
        return $this->_data['FullyPaidOnDate'];
    }

    /**
     * @param date $value
     * @return CreditNote
     */
    public function setFullyPaidOnDate($value){
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
     * @return int
     */
    public function getCreditNoteNumber(){
        return $this->_data['CreditNoteNumber'];
    }

    /**
     * @param int $value
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
     * @return string
     */
    public function getCurrencyRate(){
        return $this->_data['CurrencyRate'];
    }

    /**
     * @param string $value
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
     * @return object
     */
    public function getAllocations(){
        return $this->_data['Allocations'];
    }

    /**
     * @param object[] $value
     * @return CreditNote
     */
    public function addAllocation($value){
        $this->_data['Allocations'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBrandingThemeID(){
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param string $value
     * @return CreditNote
     */
    public function setBrandingThemeID($value){
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
     * @param bool[] $value
     * @return CreditNote
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}