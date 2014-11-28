<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Journal extends RemoteObject {

    /**
     * Xero identifier 
     *
     * @property guid JournalID
     */

    /**
     * Date the journal was posted 
     *
     * @property date JournalDate
     */

    /**
     * Xero generated journal number 
     *
     * @property int JournalNumber
     */

    /**
     * Created date UTC format 
     *
     * @property date CreatedDateUTC
     */

    /**
     *   
     *
     * @property string Reference
     */

    /**
     * See JournalLines 
     *
     * @property object[] JournalLines
     */


    /**
     * @return guid
     */
    public function getJournalID(){
        return $this->_data['JournalID'];
    }

    /**
     * @param guid $value
     * @return Journal
     */
    public function setJournalID($value){
        $this->_data['JournalID'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getJournalDate(){
        return $this->_data['JournalDate'];
    }

    /**
     * @param date $value
     * @return Journal
     */
    public function setJournalDate($value){
        $this->_data['JournalDate'] = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getJournalNumber(){
        return $this->_data['JournalNumber'];
    }

    /**
     * @param int $value
     * @return Journal
     */
    public function setJournalNumber($value){
        $this->_data['JournalNumber'] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getCreatedDateUTC(){
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param date $value
     * @return Journal
     */
    public function setCreatedDateUTC($value){
        $this->_data['CreatedDateUTC'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getReference(){
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     * @return Journal
     */
    public function setReference($value){
        $this->_data['Reference'] = $value;
        return $this;
    }

    /**
     * @return object
     */
    public function getJournalLines(){
        return $this->_data['JournalLines'];
    }

    /**
     * @param object[] $value
     * @return Journal
     */
    public function addJournalLine($value){
        $this->_data['JournalLines'][] = $value;
        return $this;
    }



}