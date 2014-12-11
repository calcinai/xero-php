<?php

namespace XeroPHP\Models\PayrollUS\Paystub;

use XeroPHP\Remote;


class BenefitLine extends Remote\Object {

    /**
     * Xero identifier for payroll benefit type
     *
     * @property string BenefitTypeID
     */

    /**
     * Reimbursement amount
     *
     * @property float Amount
     */



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
        return 'BenefitLine';
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
            'BenefitTypeID' => array (false, null),
            'Amount' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getBenefitTypeID(){
        return $this->_data['BenefitTypeID'];
    }

    /**
     * @param string $value
     * @return BenefitLine
     */
    public function setBenefitTypeID($value){
        $this->_data['BenefitTypeID'] = $value;
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
     * @return BenefitLine
     */
    public function setAmount($value){
        $this->_data['Amount'] = $value;
        return $this;
    }


}