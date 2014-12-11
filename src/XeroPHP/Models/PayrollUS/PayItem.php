<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;

use XeroPHP\Models\PayrollUS\PayItem\EarningsType;
use XeroPHP\Models\PayrollUS\PayItem\BenefitType;
use XeroPHP\Models\PayrollUS\PayItem\DeductionType;
use XeroPHP\Models\PayrollUS\PayItem\ReimbursementType;
use XeroPHP\Models\PayrollUS\PayItem\TimeOffType;

class PayItem extends Remote\Object {

    /**
     * See EarningsTypes
     *
     * @property EarningsType[] EarningsTypes
     */

    /**
     * See BenefitTypes
     *
     * @property BenefitType[] BenefitTypes
     */

    /**
     * See DeductionTypes
     *
     * @property DeductionType[] DeductionTypes
     */

    /**
     * See ReimbursementTypes
     *
     * @property ReimbursementType[] ReimbursementTypes
     */

    /**
     * See TimeOffTypes
     *
     * @property TimeOffType[] TimeOffTypes
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'PayItems';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'PayItem';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
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
            'EarningsTypes' => array (false, 'PayrollUS\PayItem\EarningsType'),
            'BenefitTypes' => array (false, 'PayrollUS\PayItem\BenefitType'),
            'DeductionTypes' => array (false, 'PayrollUS\PayItem\DeductionType'),
            'ReimbursementTypes' => array (false, 'PayrollUS\PayItem\ReimbursementType'),
            'TimeOffTypes' => array (false, 'PayrollUS\PayItem\TimeOffType')
        );
    }


    /**
     * @return EarningsType
     */
    public function getEarningsTypes(){
        return $this->_data['EarningsTypes'];
    }

    /**
     * @param EarningsType[] $value
     * @return PayItem
     */
    public function addEarningsType(EarningsType $value){
        $this->_data['EarningsTypes'][] = $value;
        return $this;
    }

    /**
     * @return BenefitType
     */
    public function getBenefitTypes(){
        return $this->_data['BenefitTypes'];
    }

    /**
     * @param BenefitType[] $value
     * @return PayItem
     */
    public function addBenefitType(BenefitType $value){
        $this->_data['BenefitTypes'][] = $value;
        return $this;
    }

    /**
     * @return DeductionType
     */
    public function getDeductionTypes(){
        return $this->_data['DeductionTypes'];
    }

    /**
     * @param DeductionType[] $value
     * @return PayItem
     */
    public function addDeductionType(DeductionType $value){
        $this->_data['DeductionTypes'][] = $value;
        return $this;
    }

    /**
     * @return ReimbursementType
     */
    public function getReimbursementTypes(){
        return $this->_data['ReimbursementTypes'];
    }

    /**
     * @param ReimbursementType[] $value
     * @return PayItem
     */
    public function addReimbursementType(ReimbursementType $value){
        $this->_data['ReimbursementTypes'][] = $value;
        return $this;
    }

    /**
     * @return TimeOffType
     */
    public function getTimeOffTypes(){
        return $this->_data['TimeOffTypes'];
    }

    /**
     * @param TimeOffType[] $value
     * @return PayItem
     */
    public function addTimeOffType(TimeOffType $value){
        $this->_data['TimeOffTypes'][] = $value;
        return $this;
    }


}