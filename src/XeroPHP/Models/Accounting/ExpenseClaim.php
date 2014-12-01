<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\User;
use XeroPHP\Models\Accounting\Receipt;

class ExpenseClaim extends Remote\Object {

    /**
     * See Users
     *
     * @property User User
     */

    /**
     * See Receipts
     *
     * @property Receipt[] Receipts
     */

    /**
     * Xero generated unique identifier for an expense claim
     *
     * @property string ExpenseClaimID
     */

    /**
     * Current status of an expense claim – see status types
     *
     * @property string Status
     */

    /**
     * Last modified date UTC format
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * The total of an expense claim being paid
     *
     * @property float Total
     */

    /**
     * The amount due to be paid for an expense claim
     *
     * @property float AmountDue
     */

    /**
     * The amount still to pay for an expense claim
     *
     * @property float AmountPaid
     */

    /**
     * The date when the expense claim is due to be paid YYYY-MM-DD
     *
     * @property \DateTime PaymentDueDate
     */

    /**
     * The date the expense claim will be reported in Xero YYYY-MM-DD
     *
     * @property \DateTime ReportingDate
     */

    /**
     * The Xero identifier for the Receipt e.g. e59a2c7f-1306-4078-a0f3-73537afcbba9
     *
     * @property string ReceiptID
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'ExpenseClaims';
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
                'User',
                'Receipts',
                'ExpenseClaimID',
                'Status',
                'UpdatedDateUTC',
                'Total',
                'AmountDue',
                'AmountPaid',
                'PaymentDueDate',
                'ReportingDate',
                'ReceiptID'
        );
    }


    /**
     * @return User
     */
    public function getUser(){
        return $this->_data['User'];
    }

    /**
     * @param User $value
     * @return ExpenseClaim
     */
    public function setUser(User $value){
        $this->_data['User'] = $value;
        return $this;
    }

    /**
     * @return Receipt
     */
    public function getReceipts(){
        return $this->_data['Receipts'];
    }

    /**
     * @param Receipt[] $value
     * @return ExpenseClaim
     */
    public function addReceipt(Receipt $value){
        $this->_data['Receipts'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpenseClaimID(){
        return $this->_data['ExpenseClaimID'];
    }

    /**
     * @param string $value
     * @return ExpenseClaim
     */
    public function setExpenseClaimID($value){
        $this->_data['ExpenseClaimID'] = $value;
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
     * @return ExpenseClaim
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
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
     * @return ExpenseClaim
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->_data['UpdatedDateUTC'] = $value;
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
     * @return ExpenseClaim
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountDue(){
        return $this->_data['AmountDue'];
    }

    /**
     * @param float $value
     * @return ExpenseClaim
     */
    public function setAmountDue($value){
        $this->_data['AmountDue'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmountPaid(){
        return $this->_data['AmountPaid'];
    }

    /**
     * @param float $value
     * @return ExpenseClaim
     */
    public function setAmountPaid($value){
        $this->_data['AmountPaid'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDueDate(){
        return $this->_data['PaymentDueDate'];
    }

    /**
     * @param \DateTime $value
     * @return ExpenseClaim
     */
    public function setPaymentDueDate(\DateTime $value){
        $this->_data['PaymentDueDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReportingDate(){
        return $this->_data['ReportingDate'];
    }

    /**
     * @param \DateTime $value
     * @return ExpenseClaim
     */
    public function setReportingDate(\DateTime $value){
        $this->_data['ReportingDate'] = $value;
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
     * @return ExpenseClaim
     */
    public function setReceiptID($value){
        $this->_data['ReceiptID'] = $value;
        return $this;
    }


}