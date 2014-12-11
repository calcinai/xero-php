<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;


class PaymentMethod extends Remote\Object {

    /**
     * See PaymentMethodTypes
     *
     * @property string PaymentMethodType
     */

    /**
     * The Bank accounts for the employee. Only Applies when PaymentMethodType is DIRECTDEPOSIT
     *
     * @property string[] BankAccounts
     */


    const PAYMENT_METHOD_TYPE_CHECK         = 'CHECK'; 
    const PAYMENT_METHOD_TYPE_MANUAL        = 'MANUAL'; 
    const PAYMENT_METHOD_TYPE_DIRECTDEPOSIT = 'DIRECTDEPOSIT'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return null;
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'PaymentMethod';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return '';
    }


    /**
    * Get the stem of the API (core.xro) etc
    *
    * @return string|null
    */
    public static function getAPIStem(){
        return Remote\URL::API_PAYROLL;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Hintable type
     *
     * @return array
     */
    public static function getProperties(){
        return array(
            'PaymentMethodType' => array (false, null),
            'BankAccounts' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getPaymentMethodType(){
        return $this->_data['PaymentMethodType'];
    }

    /**
     * @param string $value
     * @return PaymentMethod
     */
    public function setPaymentMethodType($value){
        $this->_data['PaymentMethodType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccounts(){
        return $this->_data['BankAccounts'];
    }

    /**
     * @param string[] $value
     * @return PaymentMethod
     */
    public function addBankAccount($value){
        $this->_data['BankAccounts'][] = $value;
        return $this;
    }


}