<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;


class LeaveApplication extends Remote\Object {

    /**
     * The Xero identifier for Payroll Employee
     *
     * @property string EmployeeID
     */

    /**
     * The Xero identifier for Leave Type
     *
     * @property string LeaveTypeID
     */

    /**
     * The title of the leave (max length = 50)
     *
     * @property string Title
     */

    /**
     * Start date of the leave (YYYY-MM-DD)
     *
     * @property \DateTime StartDate
     */

    /**
     * End date of the leave (YYYY-MM-DD)
     *
     * @property \DateTime EndDate
     */

    /**
     * The Description of the Leave (max length = 200)
     *
     * @property string Description
     */

    /**
     * The leave period information
     *
     * @property string[] LeavePeriods
     */


    const LEAVE_PERIOD_STATUS_CODE_SCHEDULED = 'SCHEDULED'; 
    const LEAVE_PERIOD_STATUS_CODE_PROCESSED = 'PROCESSED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'LeaveApplications';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'LeaveApplication';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'EmployeeID';
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
            'EmployeeID',
            'LeaveTypeID',
            'Title',
            'StartDate',
            'EndDate',
            'Description',
            'LeavePeriods'
        );
    }


    /**
     * @return string
     */
    public function getEmployeeID(){
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     * @return LeaveApplication
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeaveTypeID(){
        return $this->_data['LeaveTypeID'];
    }

    /**
     * @param string $value
     * @return LeaveApplication
     */
    public function setLeaveTypeID($value){
        $this->_data['LeaveTypeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(){
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     * @return LeaveApplication
     */
    public function setTitle($value){
        $this->_data['Title'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate(){
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTime $value
     * @return LeaveApplication
     */
    public function setStartDate(\DateTime $value){
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(){
        return $this->_data['EndDate'];
    }

    /**
     * @param \DateTime $value
     * @return LeaveApplication
     */
    public function setEndDate(\DateTime $value){
        $this->_data['EndDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return LeaveApplication
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLeavePeriods(){
        return $this->_data['LeavePeriods'];
    }

    /**
     * @param string[] $value
     * @return LeaveApplication
     */
    public function addLeavePeriod($value){
        $this->_data['LeavePeriods'][] = $value;
        return $this;
    }


}