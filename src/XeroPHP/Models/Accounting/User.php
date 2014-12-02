<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;


class User extends Remote\Object {

    /**
     * Xero identifier
     *
     * @property string UserID
     */

    /**
     * Email address of user
     *
     * @property string EmailAddress
     */

    /**
     * First name of user
     *
     * @property string FirstName
     */

    /**
     * Last name of user
     *
     * @property string LastName
     */

    /**
     * Timestamp of last change to user
     *
     * @property \DateTime UpdatedDateUTC
     */

    /**
     * Boolean to indicate if user is the subscriber
     *
     * @property bool IsSubscriber
     */

    /**
     * User role (see Types)
     *
     * @property string OrganisationRole
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Users';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'User';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'UserID';
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
            Remote\Request::METHOD_GET
        );
    }

    public static function getProperties(){
        return array(
            'UserID',
            'EmailAddress',
            'FirstName',
            'LastName',
            'UpdatedDateUTC',
            'IsSubscriber',
            'OrganisationRole'
        );
    }


    /**
     * @return string
     */
    public function getUserID(){
        return $this->_data['UserID'];
    }

    /**
     * @param string $value
     * @return User
     */
    public function setUserID($value){
        $this->_data['UserID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAddress(){
        return $this->_data['EmailAddress'];
    }

    /**
     * @param string $value
     * @return User
     */
    public function setEmailAddress($value){
        $this->_data['EmailAddress'] = $value;
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
     * @return User
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
     * @return User
     */
    public function setLastName($value){
        $this->_data['LastName'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return User
     */
    public function setUpdatedDateUTC(\DateTime $value){
        $this->_data['UpdatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsSubscriber(){
        return $this->_data['IsSubscriber'];
    }

    /**
     * @param bool $value
     * @return User
     */
    public function setIsSubscriber($value){
        $this->_data['IsSubscriber'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrganisationRole(){
        return $this->_data['OrganisationRole'];
    }

    /**
     * @param string $value
     * @return User
     */
    public function setOrganisationRole($value){
        $this->_data['OrganisationRole'] = $value;
        return $this;
    }


}