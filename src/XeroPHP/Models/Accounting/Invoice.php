<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Invoice extends RemoteObject {

    /**
     * See Invoice Types 
     *
     * @property enum Type
     */

    /**
     * See Contacts 
     *
     * @property string Contact
     */

    /**
     * See Schedule 
     *
     * @property object Schedule
     */

    /**
     * See LineItems 
     *
     * @property object[] LineItems
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount Types 
     *
     * @property enum[] LineAmountTypes
     */

    /**
     * ACCREC only – additional reference number 
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes 
     *
     * @property string BrandingThemeID
     */

    /**
     * The currency that invoice has been raised in (see Currencies) 
     *
     * @property string CurrencyCode
     */

    /**
     * One of the following : DRAFT or AUTHORISED – See Invoice Status Codes 
     *
     * @property enum[] Status
     */

    /**
     * Total of invoice excluding taxes 
     *
     * @property string SubTotal
     */

    /**
     * Total tax on invoice 
     *
     * @property string TotalTax
     */

    /**
     * Total of Invoice tax inclusive (i.e. SubTotal + TotalTax) 
     *
     * @property string Total
     */

    /**
     * Xero generated unique identifier for repeating invoice template 
     *
     * @property string RepeatingInvoiceID
     */

    /**
     * boolean to indicate if an invoice has an attachment 
     *
     * @property bool[] HasAttachments
     */


    /**
     * @return enum
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param enum $value
     * @return Invoice
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
     * @return Invoice
     */
    public function setContact($value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getSchedule(){
        return $this->_data['Schedule'];
    }

    /**
     * @param object $value
     * @return Invoice
     */
    public function setSchedule($value){
        $this->_data['Schedule'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getLineItems(){
        return $this->_data['LineItems'];
    }

    /**
     * @param object[] $value
     * @return Invoice
     */
    public function addLineItem($value){
        $this->_data['LineItems'][] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param enum[] $value
     * @return Invoice
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
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
     * @return Invoice
     */
    public function setBrandingThemeID($value){
        $this->_data['BrandingThemeID'] = $value;
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
     * @return Invoice
     */
    public function setCurrencyCode($value){
        $this->_data['CurrencyCode'] = $value;
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
     * @return Invoice
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
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
     * @return Invoice
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
     * @return Invoice
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
     * @return Invoice
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRepeatingInvoiceID(){
        return $this->_data['RepeatingInvoiceID'];
    }

    /**
     * @param string $value
     * @return Invoice
     */
    public function setRepeatingInvoiceID($value){
        $this->_data['RepeatingInvoiceID'] = $value;
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
     * @return Invoice
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}