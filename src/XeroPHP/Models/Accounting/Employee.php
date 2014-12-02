<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class Employee extends Remote\Object {

    /**
     * Xero identifier
     *
     * @property string EmployeeID
     */

    /**
     * Current status of an employee – see contact status types
     *
     * @property string Status
     */

    /**
     * First name of an employee (max length = 255)
     *
     * @property string FirstName
     */

    /**
     * Last name of an employee (max length = 255)
     *
     * @property string LastName
     */

    /**
     * Link to an external resource, for example, an employee record in an external system. You can specify
     * the URL element.
The description of the link is auto-generated in the form “Go to <App name>”.
     * <App name> refers to the Xero application name that is making the API call.
     *
     * @property string ExternalLink
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Employees';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'Employee';
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
        return Remote\URL::API_CORE;
    }


    /*
    * Get the supported methods
    */
    public static function getSupportedMethods(){
        return array(
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
        return array(
            'EmployeeID',
            'Status',
            'FirstName',
            'LastName',
            'ExternalLink'
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
     * @return Employee
     */
    public function setEmployeeID($value){
        $this->_data['EmployeeID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     * @return Employee
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName(){
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     * @return Employee
     */
    public function setFirstName($value){
        $this->_data['FirstName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLastName(){
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     * @return Employee
     */
    public function setLastName($value){
        $this->_data['LastName'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExternalLink(){
        return $this->_data['ExternalLink'];
    }

    /**
     * @param string $value
     * @return Employee
     */
    public function setExternalLink($value){
        $this->_data['ExternalLink'] = $value;
        return $this;
    }


}