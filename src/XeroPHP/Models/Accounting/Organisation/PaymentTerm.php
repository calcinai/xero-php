<?php

namespace XeroPHP\Models\Accounting\Organisation;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Organisation\PaymentTerm;

class PaymentTerm extends Remote\Object {

    /**
     * Default payment terms for bills (accounts payable) – see Payment Terms
     *
     * @property PaymentTerm[] Bills
     */

    /**
     * Default payment terms for sales invoices(accounts receivable) – see Payment Terms
     *
     * @property PaymentTerm[] Sales
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'PaymentTerm';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
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
            'Bills',
            'Sales'
        );
    }


    /**
     * @return PaymentTerm
     */
    public function getBills(){
        return $this->_data['Bills'];
    }

    /**
     * @param PaymentTerm[] $value
     * @return PaymentTerm
     */
    public function addBill(PaymentTerm $value){
        $this->_data['Bills'][] = $value;
        return $this;
    }

    /**
     * @return PaymentTerm
     */
    public function getSales(){
        return $this->_data['Sales'];
    }

    /**
     * @param PaymentTerm[] $value
     * @return PaymentTerm
     */
    public function addSale(PaymentTerm $value){
        $this->_data['Sales'][] = $value;
        return $this;
    }


}