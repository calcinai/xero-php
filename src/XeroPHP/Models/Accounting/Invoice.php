<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact;
use XeroPHP\Models\Accounting\Invoice\Schedule;
use XeroPHP\Models\Accounting\BrandingTheme;
use XeroPHP\Models\Accounting\Currency;

class Invoice extends Remote\Object {

    /**
     * See Invoice Types
     *
     * @property string Type
     */

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * See Schedule
     *
     * @property Schedule Schedule
     */

    /**
     * See LineItems
     *
     * @property string[] LineItems
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types
     *
     * @property string LineAmountTypes
     */

    /**
     * ACCREC only – additional reference number
     *
     * @property string Reference
     */

    /**
     * See BrandingThemes
     *
     * @property BrandingTheme BrandingThemeID
     */

    /**
     * The currency that invoice has been raised in (see Currencies)
     *
     * @property Currency CurrencyCode
     */

    /**
     * One of the following : DRAFT or AUTHORISED – See Invoice Status Codes
     *
     * @property string Status
     */

    /**
     * Total of invoice excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on invoice
     *
     * @property float TotalTax
     */

    /**
     * Total of Invoice tax inclusive (i.e. SubTotal + TotalTax)
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for repeating invoice template
     *
     * @property string RepeatingInvoiceID
     */

    /**
     * boolean to indicate if an invoice has an attachment
     *
     * @property bool HasAttachments
     */


    const INVOICE_TYPE_ACCPAY = 'ACCPAY'; 
    const INVOICE_TYPE_ACCREC = 'ACCREC'; 

    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__DRAFT      = 'DRAFT'; 
    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__SUBMITTED  = 'SUBMITTED'; 
    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__DELETED    = 'DELETED'; 
    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__AUTHORISED = 'AUTHORISED'; 
    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__PAID       = 'PAID'; 
    const INVOICE_STATUS_CODES_REFER_TO_INVOICES_FOR_DETAILS_OF_USAGE__VOIDED     = 'VOIDED'; 

    const LINEAMOUNT_TYPE_EXCLUSIVE = 'Exclusive'; 
    const LINEAMOUNT_TYPE_INCLUSIVE = 'Inclusive'; 
    const LINEAMOUNT_TYPE_NOTAX     = 'NoTax'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'RepeatingInvoices';
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
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
            return array(
                'Type',
                'Contact',
                'Schedule',
                'LineItems',
                'LineAmountTypes',
                'Reference',
                'BrandingThemeID',
                'CurrencyCode',
                'Status',
                'SubTotal',
                'TotalTax',
                'Total',
                'RepeatingInvoiceID',
                'HasAttachments'
        );
    }


    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return Invoice
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
     * @return Invoice
     */
    public function setContact(Contact $value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return Schedule
     */
    public function getSchedule(){
        return $this->_data['Schedule'];
    }

    /**
     * @param Schedule $value
     * @return Invoice
     */
    public function setSchedule(Schedule $value){
        $this->_data['Schedule'] = $value;
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
     * @return Invoice
     */
    public function addLineItem($value){
        $this->_data['LineItems'][] = $value;
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
     * @return Invoice
     */
    public function setLineAmountType($value){
        $this->_data['LineAmountTypes'] = $value;
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
     * @return BrandingTheme
     */
    public function getBrandingThemeID(){
        return $this->_data['BrandingThemeID'];
    }

    /**
     * @param BrandingTheme $value
     * @return Invoice
     */
    public function setBrandingThemeID(BrandingTheme $value){
        $this->_data['BrandingThemeID'] = $value;
        return $this;
    }

    /**
     * @return Currency
     */
    public function getCurrencyCode(){
        return $this->_data['CurrencyCode'];
    }

    /**
     * @param Currency $value
     * @return Invoice
     */
    public function setCurrencyCode(Currency $value){
        $this->_data['CurrencyCode'] = $value;
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
     * @return Invoice
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
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
     * @return Invoice
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
     * @return Invoice
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
     * @param bool $value
     * @return Invoice
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}