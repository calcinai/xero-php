<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class PaymentTerm extends RemoteObject {

    /**
     * Default payment terms for bills (accounts payable) – see Payment Terms 
     *
     * @property object[] Bills
     */

    /**
     * Default payment terms for sales invoices(accounts receivable) – see Payment Terms 
     *
     * @property object[] Sales
     */


    /**
     * @return object
     */
    public function getBills(){
        return $this->_data['Bills'];
    }

    /**
     * @param object[] $value
     * @return PaymentTerm
     */
    public function addBill($value){
        $this->_data['Bills'][] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getSales(){
        return $this->_data['Sales'];
    }

    /**
     * @param object[] $value
     * @return PaymentTerm
     */
    public function addSale($value){
        $this->_data['Sales'][] = $value;
        return $this;
    }



}