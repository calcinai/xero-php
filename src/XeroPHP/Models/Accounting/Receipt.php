<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Receipt extends RemoteObject {

    /**
     * Date of receipt – YYYY-MM-DD 
     *
     * @property date Date
     */

    /**
     * See Contacts 
     *
     * @property string Contact
     */

    /**
     * See LineItems 
     *
     * @property object[] Lineitems
     */

    /**
     * The user in the organisation that the expense claim receipt is for. See Users 
     *
     * @property string User
     */

    /**
     * Additional reference number 
     *
     * @property string Reference
     */

    /**
     * See Line Amount Types 
     *
     * @property enum[] LineAmountTypes
     */

    /**
     * Total of receipt excluding taxes 
     *
     * @property string SubTotal
     */

    /**
     * Total tax on receipt 
     *
     * @property string TotalTax
     */

    /**
     * Total of receipt tax inclusive (i.e. SubTotal + TotalTax) 
     *
     * @property string Total
     */

    /**
     * Xero generated unique identifier for receipt 
     *
     * @property string ReceiptID
     */

    /**
     * Current status of receipt – see status types 
     *
     * @property string[] Status
     */

    /**
     * Xero generated sequence number for receipt in current claim for a given user 
     *
     * @property int ReceiptNumber
     */

    /**
     * Last modified date UTC format 
     *
     * @property date UpdatedDateUTC
     */

    /**
     * boolean to indicate if a receipt has an attachment 
     *
     * @property bool[] HasAttachments
     */

    /**
     * URL link to a source document – shown as “Go to [appName]” in the Xero app 
     *
     * @property string Url
     */


    /**
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return Receipt
     */
    public function setDate($value){
        $this->_data['Date'] = $value;
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
     * @return Receipt
     */
    public function setContact($value){
        $this->_data['Contact'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getLineitems(){
        return $this->_data['Lineitems'];
    }

    /**
     * @param object[] $value
     * @return Receipt
     */
    public function addLineitem($value){
        $this->_data['Lineitems'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUser(){
        return $this->_data['User'];
    }

    /**
     * @param string $value
     * @return Receipt
     */
    public function setUser($value){
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
     * @return enum
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param enum[] $value
     * @return Receipt
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
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
     * @return Receipt
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
     * @return Receipt
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
     * @param string[] $value
     * @return Receipt
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getReceiptNumber(){
        return $this->_data['ReceiptNumber'];
    }

    /**
     * @param int $value
     * @return Receipt
     */
    public function setReceiptNumber($value){
        $this->_data['ReceiptNumber'] = $value;
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
     * @return Receipt
     */
    public function setUpdatedDateUTC($value){
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
     * @param bool[] $value
     * @return Receipt
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
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