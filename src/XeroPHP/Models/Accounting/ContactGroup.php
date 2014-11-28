<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class ContactGroup extends RemoteObject {

    /**
     * The Name of the contact group. Required when creating a new contact group 
     *
     * @property string Name
     */

    /**
     * The Status of a contact group. To delete a contact group update the status to DELETED. Only contact groups 
     * with a status of ACTIVE are returned on GETs. 
     *
     * @property date[] Status
     */

    /**
     * The Xero generated unique identifier for contact groups 
     *
     * @property string ContactGroupID
     */

    /**
     * The ContactID and Name of Contacts in a contact group. Returned on GETs when the ContactGroupID is supplied 
     * in the URL. 
     *
     * @property string[] Contacts
     */


    /**
     * @return string
     */
    public function getName(){
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     * @return ContactGroup
     */
    public function setName($value){
        $this->_data['Name'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param date[] $value
     * @return ContactGroup
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContactGroupID(){
        return $this->_data['ContactGroupID'];
    }

    /**
     * @param string $value
     * @return ContactGroup
     */
    public function setContactGroupID($value){
        $this->_data['ContactGroupID'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getContacts(){
        return $this->_data['Contacts'];
    }

    /**
     * @param string[] $value
     * @return ContactGroup
     */
    public function addContact($value){
        $this->_data['Contacts'][] = $value;
        return $this;
    }



}