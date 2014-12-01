<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact;
use XeroPHP\Models\Accounting\User;

class Receipt extends Remote\Object {

    /**
     * Date of receipt – YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * See Contacts
     *
     * @property Contact Contact
     */

    /**
     * See LineItems
     *
     * @property string[] Lineitems
     */

    /**
     * The user in the organisation that the expense claim receipt is for. See Users
     *
     * @property User User
     */

    /**
     * Additional reference number
     *
     * @property string Reference
     */

    /**
     * See Line Amount Types
     *
     * @property string LineAmountTypes
     */

    /**
     * Total of receipt excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on receipt
     *
     * @property float TotalTax
     */

    /**
     * Total of receipt tax inclusive (i.e. SubTotal + TotalTax)
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for receipt
     *
     * @property string ReceiptID
     */

    /**
     * Current status of receipt – see status types
     *
     * @property string Status
     */

    /**
     * Xero generated sequence number for receipt in current claim for a given user
     *
     * @property string ReceiptNumber
     */

    /**
     * Last modified date UTC format
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * boolean to indicate if a receipt has an attachment
     *
     * @property bool HasAttachments
     */

    /**
     * URL link to a source document – shown as “Go to [appName]” in the Xero app
     *
     * @property string Url
     */

    /**
     * Description needs to be at least 1 char long. A line item with just a description (i.e no unit
     * amount or quantity) can be created by specifying just a <Description> element that contains at least
     * 1 character
     *
     * @property float Description
     */

    /**
     * Lineitem unit amount. By default, unit amount will be rounded to two decimal places. You can opt in
     * to use four decimal places by adding the querystring parameter unitdp=4 to your query. See the
     * Rounding in Xero guide for more information.
     *
     * @property float UnitAmount
     */

    /**
     * AccountCode must be active for the organisation. AccountCodes can only be applied to a receipt when
     * the ShowInExpenseClaims value is true. Bank Accounts can not be applied to receipts.
     *
     * @property string AccountCode
     */

    /**
     * LineItem Quantity
     *
     * @property string Quantity
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * If you wish to omit either of the <Quantity> or <UnitAmount> you can provide a LineAmount and Xero
     * will calculate the missing amount for you
     *
     * @property float LineAmount
     */

    /**
     * Optional Tracking Category – see Tracking.  Any LineItem can have a maximum of 2
     * <TrackingCategory> elements.
     *
     * @property string Tracking
     */

    /**
     * Percentage discount being applied to a line item. Vote here to be able to create discounts via the
     * API.
     *
     * @property string DiscountRate
     */


    const RECEIPT_STATUS_CODES_REFER_TO_RECEIPTS_FOR_DETAILS_OF_USAGE__DRAFT      = 'DRAFT'; 
    const RECEIPT_STATUS_CODES_REFER_TO_RECEIPTS_FOR_DETAILS_OF_USAGE__SUBMITTED  = 'SUBMITTED'; 
    const RECEIPT_STATUS_CODES_REFER_TO_RECEIPTS_FOR_DETAILS_OF_USAGE__AUTHORISED = 'AUTHORISED'; 
    const RECEIPT_STATUS_CODES_REFER_TO_RECEIPTS_FOR_DETAILS_OF_USAGE__DECLINED   = 'DECLINED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Receipts';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    public static function getProperties(){
            return array(
                'Date',
                'Contact',
                'Lineitems',
                'User',
                'Reference',
                'LineAmountTypes',
                'SubTotal',
                'TotalTax',
                'Total',
                'ReceiptID',
                'Status',
                'ReceiptNumber',
                'UpdatedDateUTC',
                'HasAttachments',
                'Url',
                'Description',
                'UnitAmount',
                'AccountCode',
                'Quantity',
                'TaxType',
                'LineAmount',
                'Tracking',
                'DiscountRate'
        );
    }


    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return Receipt
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
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
     * @return Receipt
     */
    public function setContact(Contact $value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineitems(){
        return $this->_data['Lineitems'];
    }

    /**
     * @param string[] $value
     * @return Receipt
     */
    public function addLineitem($value){
        $this->_data['Lineitems'][] = $value;
        return $this;
    }

    /**
     * @return User
     */
    public function getUser(){
        return $this->_data['User'];
    }

    /**
     * @param User $value
     * @return Receipt
     */
    public function setUser(User $value){
        $this->_data['User'] = $value;
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
     * @return Receipt
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
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
     * @return Receipt
     */
    public function setLineAmountType($value){
        $this->_data['LineAmountTypes'] = $value;
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
     * @return Receipt
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
     * @return Receipt
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
     * @return Receipt
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptID(){
        return $this->_data['ReceiptID'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setReceiptID($value){
        $this->_data['ReceiptID'] = $value;
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
     * @return Receipt
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceiptNumber(){
        return $this->_data['ReceiptNumber'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setReceiptNumber($value){
        $this->_data['ReceiptNumber'] = $value;
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
     * @return Receipt
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->_data['UpdatedDateUTC'] = $value;
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
     * @return Receipt
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setUrl($value){
        $this->_data['Url'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param float $value
     * @return Receipt
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getUnitAmount(){
        return $this->_data['UnitAmount'];
    }

    /**
     * @param float $value
     * @return Receipt
     */
    public function setUnitAmount($value){
        $this->_data['UnitAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setAccountCode($value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getQuantity(){
        return $this->_data['Quantity'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setQuantity($value){
        $this->_data['Quantity'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType(){
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getLineAmount(){
        return $this->_data['LineAmount'];
    }

    /**
     * @param float $value
     * @return Receipt
     */
    public function setLineAmount($value){
        $this->_data['LineAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTracking(){
        return $this->_data['Tracking'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setTracking($value){
        $this->_data['Tracking'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDiscountRate(){
        return $this->_data['DiscountRate'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setDiscountRate($value){
        $this->_data['DiscountRate'] = $value;
        return $this;
    }


}