<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Payment extends Remote\Object {

    /**
     * 
     *
     * @property string CreditNote
     */

    /**
     * 
     *
     * @property string Invoice
     */

    /**
     * 
     *
     * @property string Account
     */

    /**
     * Date the payment is being made (YYYY-MM-DD) e.g. 2009-09-06
     *
     * @property \DateTime Date
     */

    /**
     * Exchange rate when payment is received. Only used for non base currency invoices and credit notes
     * e.g. 0.7500
     *
     * @property float CurrencyRate
     */

    /**
     * The amount of the payment. Must be less than or equal to the outstanding amount owing on the invoice
     * e.g. 200.00
     *
     * @property float Amount
     */

    /**
     * An optional description for the payment e.g. Direct Debit
     *
     * @property string Reference
     */

    /**
     * An optional parameter for the payment. A boolean indicating whether you would like the payment to be
     * created as reconciled when using PUT, or whether a payment has been reconciled when using GET
     *
     * @property string IsReconciled
     */

    /**
     * The status of the payment. This will always be AUTHORISED
     *
     * @property string Status
     */

    /**
     * See Payment Types.
     *
     * @property string PaymentType
     */

    /**
     * UTC timestamp of last update to the payment
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * You must specify an individual record by appending the value to the endpoint, i.e.POST
     * https://…/Payments/{identifier}
     *
     * @property string Resourceidentifier
     */


    const PAYMENT_STATUS_CODE_AUTHORISED = 'AUTHORISED'; 
    const PAYMENT_STATUS_CODE_DELETED    = 'DELETED'; 

    const PAYMENT_TERM_DAYSAFTERBILLDATE  = 'DAYSAFTERBILLDATE'; 
    const PAYMENT_TERM_DAYSAFTERBILLMONTH = 'DAYSAFTERBILLMONTH'; 
    const PAYMENT_TERM_OFCURRENTMONTH     = 'OFCURRENTMONTH'; 
    const PAYMENT_TERM_OFFOLLOWINGMONTH   = 'OFFOLLOWINGMONTH'; 

    const PAYMENT_TYPE_ACCRECPAYMENT   = 'ACCRECPAYMENT'; 
    const PAYMENT_TYPE_ACCPAYPAYMENT   = 'ACCPAYPAYMENT'; 
    const PAYMENT_TYPE_ARCREDITPAYMENT = 'ARCREDITPAYMENT'; 
    const PAYMENT_TYPE_APCREDITPAYMENT = 'APCREDITPAYMENT'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Payments';
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
                'CreditNote',
                'Invoice',
                'Account',
                'Date',
                'CurrencyRate',
                'Amount',
                'Reference',
                'IsReconciled',
                'Status',
                'PaymentType',
                'UpdatedDateUTC',
                'Resourceidentifier'
        );
    }


    /**
     * @return string
     */
    public function getCreditNote(){
        return $this->_data['CreditNote'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setCreditNote($value){
        $this->_data['CreditNote'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getInvoice(){
        return $this->_data['Invoice'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setInvoice($value){
        $this->_data['Invoice'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccount(){
        return $this->_data['Account'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setAccount($value){
        $this->_data['Account'] = $value;
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
     * @return Payment
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
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
     * @return Payment
     */
    public function setCurrencyRate($value){
        $this->_data['CurrencyRate'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAmount(){
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     * @return Payment
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
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
     * @return Payment
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsReconciled(){
        return $this->_data['IsReconciled'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setIsReconciled($value){
        $this->_data['IsReconciled'] = $value;
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
     * @return Payment
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentType(){
        return $this->_data['PaymentType'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setPaymentType($value){
        $this->_data['PaymentType'] = $value;
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
     * @return Payment
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getResourceidentifier(){
        return $this->_data['Resourceidentifier'];
    }

    /**
     * @param string $value
     * @return Payment
     */
    public function setResourceidentifier($value){
        $this->_data['Resourceidentifier'] = $value;
        return $this;
    }


}