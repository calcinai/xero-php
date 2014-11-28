<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class ExpenseClaim extends RemoteObject {

    /**
     * See Users 
     *
     * @property string User
     */

    /**
     * See Receipts 
     *
     * @property string[] Receipts
     */

    /**
     * Xero generated unique identifier for an expense claim 
     *
     * @property string ExpenseClaimID
     */

    /**
     * Current status of an expense claim – see status types 
     *
     * @property string[] Status
     */

    /**
     * Last modified date UTC format 
     *
     * @property date UpdatedDateUTC
     */

    /**
     * The total of an expense claim being paid 
     *
     * @property string Total
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
     * @property date PaymentDueDate
     */

    /**
     * The date the expense claim will be reported in Xero YYYY-MM-DD 
     *
     * @property date ReportingDate
     */

    /**
     * The Xero identifier for the Receipt e.g. e59a2c7f-1306-4078-a0f3-73537afcbba9 
     *
     * @property guid ReceiptID
     */


    /**
     * @return string
     */
    public function getUser(){
        return $this->_data['User'];
    }

    /**
     * @param string $value
     * @return ExpenseClaim
     */
    public function setUser($value){
        $this->_data['User'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReceipts(){
        return $this->_data['Receipts'];
    }

    /**
     * @param string[] $value
     * @return ExpenseClaim
     */
    public function addReceipt($value){
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
     * @param string[] $value
     * @return ExpenseClaim
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
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
     * @return ExpenseClaim
     */
    public function setUpdatedDateUTC($value){
        $this->_data['UpdatedDateUTC'] = $value;
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
     * @return date
     */
    public function getPaymentDueDate(){
        return $this->_data['PaymentDueDate'];
    }

    /**
     * @param date $value
     * @return ExpenseClaim
     */
    public function setPaymentDueDate($value){
        $this->_data['PaymentDueDate'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getReportingDate(){
        return $this->_data['ReportingDate'];
    }

    /**
     * @param date $value
     * @return ExpenseClaim
     */
    public function setReportingDate($value){
        $this->_data['ReportingDate'] = $value;
        return $this;
    }

    /**
     * @return guid
     */
    public function getReceiptID(){
        return $this->_data['ReceiptID'];
    }

    /**
     * @param guid $value
     * @return ExpenseClaim
     */
    public function setReceiptID($value){
        $this->_data['ReceiptID'] = $value;
        return $this;
    }



}