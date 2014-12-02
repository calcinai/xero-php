<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;


class SuperFund extends Remote\Object {

    /**
     * SMSF see Super Fund Types
     *
     * @property string Type
     */

    /**
     * ABN of the self managed super fund. (max length = 11) e.g 839182848805
     *
     * @property string ABN
     */

    /**
     * The USI of the Regulated SuperFund
     *
     * @property string USI
     */

    /**
     * Name of the super fund (max length = 76) e.g Clive Monk Superannuation Fund
     *
     * @property string Name
     */

    /**
     * BSB of the self managed super fund. (max length = 6) e.g 123123
     *
     * @property string BSB
     */

    /**
     * The account number for the self managed super fund. (max length = 9) e.g 234324324
     *
     * @property string AccountNumber
     */

    /**
     * The account name for the self managed super fund (max length = 32) e.g Clive Monk Superannuation
     * Fund
     *
     * @property string AccountName
     */

    /**
     * Xero identifier e.g c56b19ef-75bf-45e8-98a4-e699a96609f7
     *
     * @property string SuperFundID
     */

    /**
     * Some funds assign a unique number to each employer (max length = 20)
     *
     * @property string EmployeeNumber
     */

    /**
     * The SPIN of the Regulated SuperFund. This field has been deprecated.  It will only be present for
     * legacy superfunds.  New superfunds will not have a SPIN value.  The USI field should be used instead
     * of SPIN
     *
     * @property string SPIN
     * @deprecated
     */

    /**
     * You can specify an individual record by appending the value to the endpoint, i.e.GET
     * https://…/SuperFunds/{identifier}
     *
     * @property string Recordfilter
     */

    /**
     * You can get all super funds by not appending super fund Id. e.g. GET https://…/superFunds
     *
     * @property string 
     */

    /**
     * The ModifiedAfter filter is actually an HTTP header: ‘If-Modified-Since‘.
A UTC timestamp
     * (yyyy-mm-ddThh:mm:ss) . Only superfunds created or modified since this timestamp will be returned
     * e.g. 2009-11-12T00:00:00
     *
     * @property \DateTime ModifiedAfter
     */

    /**
     * By default the number of records returned per call is 100. You can add GET
     * https://…/Superfunds?page=2  to get the next set of records.
     *
     * @property string page
     */


    const TYPE_REGULATED = 'REGULATED'; 
    const TYPE_SMSF      = 'SMSF'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'SuperFunds';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'SuperFund';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'SuperFundID';
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
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
        return array(
            'Type',
            'ABN',
            'USI',
            'Name',
            'BSB',
            'AccountNumber',
            'AccountName',
            'SuperFundID',
            'EmployeeNumber',
            'SPIN',
            'Recordfilter',
            '',
            'ModifiedAfter',
            'page'
        );
    }


    /**
     * @return string
     */
    public function getType(){
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setType($value){
        $this->_data['Type'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getABN(){
        return $this->_data['ABN'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setABN($value){
        $this->_data['ABN'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUSI(){
        return $this->_data['USI'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setUSI($value){
        $this->_data['USI'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBSB(){
        return $this->_data['BSB'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setBSB($value){
        $this->_data['BSB'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber(){
        return $this->_data['AccountNumber'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setAccountNumber($value){
        $this->_data['AccountNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName(){
        return $this->_data['AccountName'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setAccountName($value){
        $this->_data['AccountName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSuperFundID(){
        return $this->_data['SuperFundID'];
    }

    /**
     * @param string $value
     * @return SuperFund
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
     * @return SuperFund
     */
    public function setEmployeeNumber($value){
        $this->_data['EmployeeNumber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSPIN(){
        return $this->_data['SPIN'];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function setSPIN($value){
        $this->_data['SPIN'] = $value;
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
     * @return SuperFund
     */
    public function setRecordfilter($value){
        $this->_data['Recordfilter'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function get(){
        return $this->_data[''];
    }

    /**
     * @param string $value
     * @return SuperFund
     */
    public function set($value){
        $this->_data[''] = $value;
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
     * @return SuperFund
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
     * @return SuperFund
     */
    public function setpage($value){
        $this->_data['page'] = $value;
        return $this;
    }


}