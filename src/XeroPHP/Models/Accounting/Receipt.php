<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Receipt\LineItem;

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
     * @property LineItem[] Lineitems
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
     * @property float[] LineAmountTypes
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


    const RECEIPT_STATUS_DRAFT      = 'DRAFT'; 
    const RECEIPT_STATUS_SUBMITTED  = 'SUBMITTED'; 
    const RECEIPT_STATUS_AUTHORISED = 'AUTHORISED'; 
    const RECEIPT_STATUS_DECLINED   = 'DECLINED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'Receipts';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'Receipt';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'ReceiptID';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
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

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Hintable type
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'Date' => array (true, '\DateTime'),
            'Contact' => array (true, 'Accounting\Contact'),
            'Lineitems' => array (true, 'Accounting\Receipt\LineItem'),
            'User' => array (true, 'Accounting\User'),
            'Reference' => array (false, null),
            'LineAmountTypes' => array (false, null),
            'SubTotal' => array (false, null),
            'TotalTax' => array (false, null),
            'Total' => array (false, null),
            'ReceiptID' => array (false, null),
            'Status' => array (false, null),
            'ReceiptNumber' => array (false, null),
            'UpdatedDateUTC' => array (false, '\DateTime'),
            'HasAttachments' => array (false, null),
            'Url' => array (false, null)
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
     * @return LineItem
     */
    public function getLineitems(){
        return $this->_data['Lineitems'];
    }

    /**
     * @param LineItem[] $value
     * @return Receipt
     */
    public function addLineitem(LineItem $value){
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
     * @return float
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param float[] $value
     * @return Receipt
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
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


}