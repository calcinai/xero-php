<?php

namespace XeroPHP\Models\PayrollUS\Employee;

use XeroPHP\Remote;


class SalaryAndWage extends Remote\Object {

    /**
     * Xero unique identifier for SalaryAndWage item. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string SalaryAndWageID
     */

    /**
     * Xero unique identifier for EarningsType item. e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string EarningsTypeID
     */

    /**
     * See Salary and Wages Types
     *
     * @property string SalaryWagesType
     */

    /**
     * The Hourly rate of the Salary and Wages Type. Applies only when SalaryWagesType is HOURLY
     *
     * @property float HourlyRate
     */

    /**
     * The annual salary for the Salary and wages. Applies only when SalaryWagesType is SALARY
     *
     * @property string AnnualSalary
     */

    /**
     * Number of hours per week
     *
     * @property string StandardHoursPerWeek
     */

    /**
     * The effective date of the Salary and Wages
     *
     * @property \DateTime EffectiveDate
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
        return 'SalaryAndWage';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'SalaryAndWageID';
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
            'SalaryAndWageID' => array (false, null),
            'EarningsTypeID' => array (false, null),
            'SalaryWagesType' => array (false, null),
            'HourlyRate' => array (false, null),
            'AnnualSalary' => array (false, null),
            'StandardHoursPerWeek' => array (false, null),
            'EffectiveDate' => array (false, '\DateTime')
        );
    }


    /**
     * @return string
     */
    public function getSalaryAndWageID(){
        return $this->_data['SalaryAndWageID'];
    }

    /**
     * @param string $value
     * @return SalaryAndWage
     */
    public function setSalaryAndWageID($value){
        $this->_data['SalaryAndWageID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEarningsTypeID(){
        return $this->_data['EarningsTypeID'];
    }

    /**
     * @param string $value
     * @return SalaryAndWage
     */
    public function setEarningsTypeID($value){
        $this->_data['EarningsTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalaryWagesType(){
        return $this->_data['SalaryWagesType'];
    }

    /**
     * @param string $value
     * @return SalaryAndWage
     */
    public function setSalaryWagesType($value){
        $this->_data['SalaryWagesType'] = $value;
        return $this;
    }

    /**
     * @return float
     */
    public function getHourlyRate(){
        return $this->_data['HourlyRate'];
    }

    /**
     * @param float $value
     * @return SalaryAndWage
     */
    public function setHourlyRate($value){
        $this->_data['HourlyRate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAnnualSalary(){
        return $this->_data['AnnualSalary'];
    }

    /**
     * @param string $value
     * @return SalaryAndWage
     */
    public function setAnnualSalary($value){
        $this->_data['AnnualSalary'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStandardHoursPerWeek(){
        return $this->_data['StandardHoursPerWeek'];
    }

    /**
     * @param string $value
     * @return SalaryAndWage
     */
    public function setStandardHoursPerWeek($value){
        $this->_data['StandardHoursPerWeek'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEffectiveDate(){
        return $this->_data['EffectiveDate'];
    }

    /**
     * @param \DateTime $value
     * @return SalaryAndWage
     */
    public function setEffectiveDate(\DateTime $value){
        $this->_data['EffectiveDate'] = $value;
        return $this;
    }


}