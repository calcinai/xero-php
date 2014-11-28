<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Schedule extends RemoteObject {

    /**
     * Integer used with the unit e.g. 1 (every 1 week), 2 (every 2 months) 
     *
     * @property string Period
     */

    /**
     * One of the following : WEEKLY or MONTHLY 
     *
     * @property string Unit
     */

    /**
     * Integer used with due date type e.g 20 (of following month), 31 (of current month) 
     *
     * @property date DueDate
     */

    /**
     * See Payment Terms 
     *
     * @property object DueDateType
     */

    /**
     * Invoice date the first invoice in the repeating schedule 
     *
     * @property date StartDate
     */

    /**
     * The calendar date of the next invoice in the schedule to be generated 
     *
     * @property date NextScheduledDate
     */

    /**
     * Invoice end date – only returned if the template has an end date set 
     *
     * @property date EndDate
     */


    /**
     * @return string
     */
    public function getPeriod(){
        return $this->_data['Period'];
    }

    /**
     * @param string $value
     * @return Schedule
     */
    public function setPeriod($value){
        $this->_data['Period'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUnit(){
        return $this->_data['Unit'];
    }

    /**
     * @param string $value
     * @return Schedule
     */
    public function setUnit($value){
        $this->_data['Unit'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getDueDate(){
        return $this->_data['DueDate'];
    }

    /**
     * @param date $value
     * @return Schedule
     */
    public function setDueDate($value){
        $this->_data['DueDate'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getDueDateType(){
        return $this->_data['DueDateType'];
    }

    /**
     * @param object $value
     * @return Schedule
     */
    public function setDueDateType($value){
        $this->_data['DueDateType'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getStartDate(){
        return $this->_data['StartDate'];
    }

    /**
     * @param date $value
     * @return Schedule
     */
    public function setStartDate($value){
        $this->_data['StartDate'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getNextScheduledDate(){
        return $this->_data['NextScheduledDate'];
    }

    /**
     * @param date $value
     * @return Schedule
     */
    public function setNextScheduledDate($value){
        $this->_data['NextScheduledDate'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getEndDate(){
        return $this->_data['EndDate'];
    }

    /**
     * @param date $value
     * @return Schedule
     */
    public function setEndDate($value){
        $this->_data['EndDate'] = $value;
        return $this;
    }



}