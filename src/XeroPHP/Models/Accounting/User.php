<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class User extends RemoteObject {

    /**
     * Xero identifier 
     *
     * @property guid UserID
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
     * @property date UpdatedDateUTC
     */

    /**
     * Boolean to indicate if user is the subscriber 
     *
     * @property bool IsSubscriber
     */

    /**
     * User role (see Types) 
     *
     * @property enum OrganisationRole
     */


    /**
     * @return guid
     */
    public function getUserID(){
        return $this->_data['UserID'];
    }

    /**
     * @param guid $value
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
     * @return date
     */
    public function getUpdatedDateUTC(){
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param date $value
     * @return User
     */
    public function setUpdatedDateUTC($value){
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
     * @return enum
     */
    public function getOrganisationRole(){
        return $this->_data['OrganisationRole'];
    }

    /**
     * @param enum $value
     * @return User
     */
    public function setOrganisationRole($value){
        $this->_data['OrganisationRole'] = $value;
        return $this;
    }



}