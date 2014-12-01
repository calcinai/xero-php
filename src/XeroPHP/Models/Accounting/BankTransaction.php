<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Contact;
use XeroPHP\Models\Accounting\BankTransaction\BankAccount;
use XeroPHP\Models\Accounting\Currency;
use XeroPHP\Models\Accounting\Account;
use XeroPHP\Models\Accounting\Item;

class BankTransaction extends Remote\Object {

    /**
     * See Bank Transaction Types
     *
     * @property string Type
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
     * Bank account for transaction. See BankAccount
     *
     * @property BankAccount BankAccount
     */

    /**
     * Boolean to show if transaction is reconciled
     *
     * @property bool IsReconciled
     */

    /**
     * Date of transaction – YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * reference for the transaction
     *
     * @property string Reference
     */

    /**
     * The currency that invoice has been raised in (see Currencies)
     *
     * @property Currency CurrencyCode
     */

    /**
     * Exchange rate to base currency when money is spent or received. e.g. 0.7500 Only used for bank
     * transactions in non base currency. If this isn’t specified for non base currency accounts then
     * either the user-defined rate (preference) or the XE.com day rate will be used
     *
     * @property float CurrencyRate
     */

    /**
     * URL link to a source document – shown as "Go to App Name"
     *
     * @property string Url
     */

    /**
     * See Bank Transaction Status Codes
     *
     * @property string Status
     */

    /**
     * Line amounts are exclusive of tax by default if you don’t specify this element. See Line Amount
     * Types
     *
     * @property string LineAmountTypes
     */

    /**
     * Total of bank transaction excluding taxes
     *
     * @property float SubTotal
     */

    /**
     * Total tax on bank transaction
     *
     * @property float TotalTax
     */

    /**
     * Total of bank transaction tax inclusive
     *
     * @property float Total
     */

    /**
     * Xero generated unique identifier for invoice
     *
     * @property string BankTransactionID
     */

    /**
     * Last modified date UTC format
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * Boolean to indicate if a bank transaction has an attachment
     *
     * @property bool HasAttachments
     */

    /**
     * Description needs to be at least 1 char long.
     *
     * @property string Description
     */

    /**
     * Quantity must be >= 0
     *
     * @property string Quantity
     */

    /**
     * Lineitem unit amount must be > 0. By default, unit amount will be rounded to two decimal places. You
     * can opt in to use four decimal places by adding the querystring parameter unitdp=4 to your query.
     * See the Rounding in Xero guide for more information.
     *
     * @property float UnitAmount
     */

    /**
     * AccountCode must be active for the organisation. See Accounts
     *
     * @property Account AccountCode
     */

    /**
     * <ItemCode> can only be used when the Bank Transaction <Type> is SPEND or RECEIVE. If <Description>,
     * <UnitAmount> or <AccountCode> are not specified, then the defaults from the Item will be applied.
     *
     * @property Item ItemCode
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


    const TYPE_RECEIVE                                                                  = 'RECEIVE'; 
    const TYPE_RECEIVE_OVERPAYMENT                                                      = 'RECEIVE-OVERPAYMENT'; 
    const TYPE_RECEIVE_PREPAYMENT                                                       = 'RECEIVE-PREPAYMENT'; 
    const TYPE_SPEND                                                                    = 'SPEND'; 
    const TYPE_SPEND_OVERPAYMENT                                                        = 'SPEND-OVERPAYMENT'; 
    const TYPE_SPEND_PREPAYMENT                                                         = 'SPEND-PREPAYMENT'; 
    const TYPE_THE_FOLLOWING_VALUES_ARE_ONLY_SUPPORTED_VIA_THE_GET_METHOD_AT_THE_MOMENT = 'The following values are only supported via the GET method at the moment'; 
    const TYPE_RECEIVE_TRANSFER                                                         = 'RECEIVE-TRANSFER'; 
    const TYPE_SPEND_TRANSFER                                                           = 'SPEND-TRANSFER'; 

    const BANK_TRANSACTION_STATUS_CODE_AUTHORISED = 'AUTHORISED'; 
    const BANK_TRANSACTION_STATUS_CODE_DELETED    = 'DELETED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'BankTransactions';
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
                'Type',
                'Contact',
                'Lineitems',
                'BankAccount',
                'IsReconciled',
                'Date',
                'Reference',
                'CurrencyCode',
                'CurrencyRate',
                'Url',
                'Status',
                'LineAmountTypes',
                'SubTotal',
                'TotalTax',
                'Total',
                'BankTransactionID',
                'UpdatedDateUTC',
                'HasAttachments',
                'Description',
                'Quantity',
                'UnitAmount',
                'AccountCode',
                'ItemCode',
                'TaxType',
                'LineAmount',
                'Tracking'
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
     * @return BankTransaction
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
     * @return BankTransaction
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
     * @return BankTransaction
     */
    public function addLineitem($value){
        $this->_data['Lineitems'][] = $value;
        return $this;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount(){
        return $this->_data['BankAccount'];
    }

    /**
     * @param BankAccount $value
     * @return BankTransaction
     */
    public function setBankAccount(BankAccount $value){
        $this->_data['BankAccount'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsReconciled(){
        return $this->_data['IsReconciled'];
    }

    /**
     * @param bool $value
     * @return BankTransaction
     */
    public function setIsReconciled($value){
        $this->_data['IsReconciled'] = $value;
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
     * @return BankTransaction
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
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
     * @return BankTransaction
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
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
     * @return BankTransaction
     */
    public function setCurrencyCode(Currency $value){
        $this->_data['CurrencyCode'] = $value;
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
     * @return BankTransaction
     */
    public function setCurrencyRate($value){
        $this->_data['CurrencyRate'] = $value;
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
     * @return BankTransaction
     */
    public function setUrl($value){
        $this->_data['Url'] = $value;
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
     * @return BankTransaction
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
     * @return BankTransaction
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
     * @return BankTransaction
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
     * @return BankTransaction
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
     * @return BankTransaction
     */
    public function setTotal($value){
        $this->_data['Total'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankTransactionID(){
        return $this->_data['BankTransactionID'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setBankTransactionID($value){
        $this->_data['BankTransactionID'] = $value;
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
     * @return BankTransaction
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
     * @return BankTransaction
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return BankTransaction
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
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
     * @return BankTransaction
     */
    public function setQuantity($value){
        $this->_data['Quantity'] = $value;
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
     * @return BankTransaction
     */
    public function setUnitAmount($value){
        $this->_data['UnitAmount'] = $value;
        return $this;
    }

    /**
     * @return Account
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param Account $value
     * @return BankTransaction
     */
    public function setAccountCode(Account $value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return Item
     */
    public function getItemCode(){
        return $this->_data['ItemCode'];
    }

    /**
     * @param Item $value
     * @return BankTransaction
     */
    public function setItemCode(Item $value){
        $this->_data['ItemCode'] = $value;
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
     * @return BankTransaction
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
     * @return BankTransaction
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
     * @return BankTransaction
     */
    public function setTracking($value){
        $this->_data['Tracking'] = $value;
        return $this;
    }


}