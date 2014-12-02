<?php

namespace XeroPHP\Models\PayrollAU\Employee;

use XeroPHP\Remote;


class SuperMembership extends Remote\Object {

    /**
     * Xero identifier for super fund
     *
     * @property string SuperFundID
     */

    /**
     * The memberhsip number assigned to the employee by the super fund.
     *
     * @property string EmployeeNumber
     */

    /**
     * Xero unique identifier for Super membership
     *
     * @property string SuperMembershipID
     */

    /**
     * You can specify an individual record by appending the value to the endpoint, i.e. GET
     * https://…/Employees/{identifier} This will return all employee information as well as employee’s
     * Bank Account, Opening Balance, Pay Template and super membership
     *
     * @property string Recordfilter
     */

    /**
     * The Xero identifier for an employee e.g. 297c2dc5-cc47-4afd-8ec8-74990b8761e9
     *
     * @property string EmployeeID
     */

    /**
     * The ModifiedAfter filter is actually an HTTP header: ‘If-Modified-Since‘. A UTC timestamp
     * (yyyy-mm-ddThh:mm:ss) . Only employees created or modified since this timestamp will be returned
     * e.g. 2009-11-12T00:00:00
     *
     * @property \DateTime ModifiedAfter
     */

    /**
     * By default the number of records returned per call is 100. You can add GET
     * https://…/Employees?page=2  to get the next set of records.
     *
     * @property string page
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
        return 'SuperMembership';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'SuperMembershipID';
    }


    /*
    * Get the stem of the API (core.xro) etc
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

    public static function getProperties(){
        return array(
            'SuperFundID',
            'EmployeeNumber',
            'SuperMembershipID',
            'Recordfilter',
            'EmployeeID',
            'ModifiedAfter',
            'page'
        );
    }


    /**
     * @return string
     */
    public function getSuperFundID(){
        return $this->_data['SuperFundID'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setSuperFundID($value){
        $this->_data['SuperFundID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeNumber(){
        return $this->_data['EmployeeNumber'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setEmployeeNumber($value){
        $this->_data['EmployeeNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuperMembershipID(){
        return $this->_data['SuperMembershipID'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setSuperMembershipID($value){
        $this->_data['SuperMembershipID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getRecordfilter(){
        return $this->_data['Recordfilter'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setRecordfilter($value){
        $this->_data['Recordfilter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeID(){
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAfter(){
        return $this->_data['ModifiedAfter'];
    }

    /**
     * @param \DateTime $value
     * @return SuperMembership
     */
    public function setModifiedAfter(\DateTime $value){
        $this->_data['ModifiedAfter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getpage(){
        return $this->_data['page'];
    }

    /**
     * @param string $value
     * @return SuperMembership
     */
    public function setpage($value){
        $this->_data['page'] = $value;
        return $this;
    }


}