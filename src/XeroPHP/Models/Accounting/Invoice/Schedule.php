<?php

namespace XeroPHP\Models\Accounting\Invoice;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Organisation\PaymentTerm;
use XeroPHP\Models\Accounting\Item;
use XeroPHP\Models\Accounting\Account;

class Schedule extends Remote\Object {

    /**
     * Integer used with the unit e.g. 1 (every 1 week), 2 (every 2 months)
     *
     * @property int Period
     */

    /**
     * One of the following : WEEKLY or MONTHLY
     *
     * @property string Unit
     */

    /**
     * Integer used with due date type e.g 20 (of following month), 31 (of current month)
     *
     * @property \DateTime DueDate
     */

    /**
     * See Payment Terms
     *
     * @property PaymentTerm DueDateType
     */

    /**
     * Invoice date the first invoice in the repeating schedule
     *
     * @property \DateTime StartDate
     */

    /**
     * The calendar date of the next invoice in the schedule to be generated
     *
     * @property \DateTime NextScheduledDate
     */

    /**
     * Invoice end date – only returned if the template has an end date set
     *
     * @property \DateTime EndDate
     */

    /**
     * Description needs to be at least 1 char long. A line item with just a description (i.e no unit
     * amount or quantity) can be created by specifying just a <Description> element that contains at least
     * 1 character
     *
     * @property float Description
     */

    /**
     * LineItem Quantity
     *
     * @property string Quantity
     */

    /**
     * LineItem Unit Amount
     *
     * @property float UnitAmount
     */

    /**
     * See Items
     *
     * @property Item ItemCode
     */

    /**
     * See Accounts
     *
     * @property Account AccountCode
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see
     * TaxTypes.
     *
     * @property string TaxType
     */

    /**
     * The tax amount is auto calculated as a percentage of the line amount (see below) based on the tax
     * rate. This value can be overriden if the calculated <TaxAmount> is not correct.
     *
     * @property float TaxAmount
     */

    /**
     * If you wish to omit either of the <Quantity> or <UnitAmount> you can provide a LineAmount and Xero
     * will calculate the missing amount for you. The line amount reflects the discounted price if a
     * DiscountRate has been used . i.e LineAmount = Quantity * Unit Amount * ((100 – DiscountRate)/100)
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
     * Percentage discount being applied to a line item (only supported on ACCREC invoices – ACC PAY
     * invoices and credit notes in Xero do not support discounts
     *
     * @property string DiscountRate
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
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
        );
    }

    public static function getProperties(){
            return array(
                'Period',
                'Unit',
                'DueDate',
                'DueDateType',
                'StartDate',
                'NextScheduledDate',
                'EndDate',
                'Description',
                'Quantity',
                'UnitAmount',
                'ItemCode',
                'AccountCode',
                'TaxType',
                'TaxAmount',
                'LineAmount',
                'Tracking',
                'DiscountRate'
        );
    }


    /**
     * @return int
     */
    public function getPeriod(){
        return $this->_data['Period'];
    }

    /**
     * @param int $value
     * @return Schedule
     */
    public function setPeriod($value){
        $this->_data['Period'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(){
        return $this->_data['Unit'];
    }

    /**
     * @param string $value
     * @return Schedule
     */
    public function setUnit($value){
        $this->_data['Unit'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate(){
        return $this->_data['DueDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setDueDate(\DateTime $value){
        $this->_data['DueDate'] = $value;
        return $this;
    }

    /**
     * @return PaymentTerm
     */
    public function getDueDateType(){
        return $this->_data['DueDateType'];
    }

    /**
     * @param PaymentTerm $value
     * @return Schedule
     */
    public function setDueDateType(PaymentTerm $value){
        $this->_data['DueDateType'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(){
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setStartDate(\DateTime $value){
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getNextScheduledDate(){
        return $this->_data['NextScheduledDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setNextScheduledDate(\DateTime $value){
        $this->_data['NextScheduledDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(){
        return $this->_data['EndDate'];
    }

    /**
     * @param \DateTime $value
     * @return Schedule
     */
    public function setEndDate(\DateTime $value){
        $this->_data['EndDate'] = $value;
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
     * @return Schedule
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
     * @return Schedule
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
     * @return Schedule
     */
    public function setUnitAmount($value){
        $this->_data['UnitAmount'] = $value;
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
     * @return Schedule
     */
    public function setItemCode(Item $value){
        $this->_data['ItemCode'] = $value;
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
     * @return Schedule
     */
    public function setAccountCode(Account $value){
        $this->_data['AccountCode'] = $value;
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
     * @return Schedule
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getTaxAmount(){
        return $this->_data['TaxAmount'];
    }

    /**
     * @param float $value
     * @return Schedule
     */
    public function setTaxAmount($value){
        $this->_data['TaxAmount'] = $value;
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
     * @return Schedule
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
     * @return Schedule
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
     * @return Schedule
     */
    public function setDiscountRate($value){
        $this->_data['DiscountRate'] = $value;
        return $this;
    }


}