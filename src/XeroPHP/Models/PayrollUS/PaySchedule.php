<?php

namespace XeroPHP\Models\PayrollUS;

use XeroPHP\Remote;


class PaySchedule extends Remote\Object {

    /**
     * Name of the Pay Schedule
     *
     * @property string PayScheduleName
     */

    /**
     * The Payment Date of the Pay Schedule
     *
     * @property \DateTime PaymentDate
     */

    /**
     * The Start Date of the Pay Schedule
     *
     * @property \DateTime StartDate
     */

    /**
     * The ScheduleType defines the frequency in which an employee gets paid
     *
     * @property string ScheduleType
     */

    /**
     * Xero Identifier
     *
     * @property string PayScheduleId
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    *
    * @return string
    */
    public static function getResourceURI(){
        return 'PaySchedules';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    *
    * @return string
    */
    public static function getRootNodeName(){
        return 'PaySchedule';
    }


    /*
    * Get the guid property
    *
    * @return string
    */
    public static function getGUIDProperty(){
        return 'PayScheduleId';
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
            'PayScheduleName' => array (true, null),
            'PaymentDate' => array (true, '\DateTime'),
            'StartDate' => array (true, '\DateTime'),
            'ScheduleType' => array (true, null),
            'PayScheduleId' => array (false, null)
        );
    }


    /**
     * @return string
     */
    public function getPayScheduleName(){
        return $this->_data['PayScheduleName'];
    }

    /**
     * @param string $value
     * @return PaySchedule
     */
    public function setPayScheduleName($value){
        $this->_data['PayScheduleName'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPaymentDate(){
        return $this->_data['PaymentDate'];
    }

    /**
     * @param \DateTime $value
     * @return PaySchedule
     */
    public function setPaymentDate(\DateTime $value){
        $this->_data['PaymentDate'] = $value;
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
     * @return PaySchedule
     */
    public function setStartDate(\DateTime $value){
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getScheduleType(){
        return $this->_data['ScheduleType'];
    }

    /**
     * @param string $value
     * @return PaySchedule
     */
    public function setScheduleType($value){
        $this->_data['ScheduleType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPayScheduleId(){
        return $this->_data['PayScheduleId'];
    }

    /**
     * @param string $value
     * @return PaySchedule
     */
    public function setPayScheduleId($value){
        $this->_data['PayScheduleId'] = $value;
        return $this;
    }


}