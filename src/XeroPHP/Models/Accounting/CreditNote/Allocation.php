<?php

namespace XeroPHP\Models\Accounting\CreditNote;

use XeroPHP\Remote;


class Allocation extends Remote\Object {

    /**
     * the invoice the credit note is being allocated against
     *
     * @property string Invoice
     */

    /**
     * the amount being applied to the invoice
     *
     * @property float AppliedAmount
     */

    /**
     * the date the credit note is created YYYY-MM-DD
     *
     * @property \DateTime Date
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
                'Invoice',
                'AppliedAmount',
                'Date'
        );
    }


    /**
     * @return string
     */
    public function getInvoice(){
        return $this->_data['Invoice'];
    }

    /**
     * @param string $value
     * @return Allocation
     */
    public function setInvoice($value){
        $this->_data['Invoice'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getAppliedAmount(){
        return $this->_data['AppliedAmount'];
    }

    /**
     * @param float $value
     * @return Allocation
     */
    public function setAppliedAmount($value){
        $this->_data['AppliedAmount'] = $value;
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
     * @return Allocation
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
        return $this;
    }


}