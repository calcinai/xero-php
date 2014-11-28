<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Allocation extends RemoteObject {

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
     * @property date Date
     */


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
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return Allocation
     */
    public function setDate($value){
        $this->_data['Date'] = $value;
        return $this;
    }



}