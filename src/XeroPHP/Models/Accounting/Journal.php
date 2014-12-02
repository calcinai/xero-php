<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\Journal\JournalLine;

class Journal extends Remote\Object {

    /**
     * Xero identifier
     *
     * @property string JournalID
     */

    /**
     * Date the journal was posted
     *
     * @property \DateTime JournalDate
     */

    /**
     * Xero generated journal number
     *
     * @property string JournalNumber
     */

    /**
     * Created date UTC format
     *
     * @property \DateTime CreatedDateUTC
     */

    /**
     *  
     *
     * @property string Reference
     */

    /**
     * See JournalLines
     *
     * @property JournalLine[] JournalLines
     */



    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'Journals';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'Journal';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return 'JournalID';
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
            'JournalID',
            'JournalDate',
            'JournalNumber',
            'CreatedDateUTC',
            'Reference',
            'JournalLines'
        );
    }


    /**
     * @return string
     */
    public function getJournalID(){
        return $this->_data['JournalID'];
    }

    /**
     * @param string $value
     * @return Journal
     */
    public function setJournalID($value){
        $this->_data['JournalID'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getJournalDate(){
        return $this->_data['JournalDate'];
    }

    /**
     * @param \DateTime $value
     * @return Journal
     */
    public function setJournalDate(\DateTime $value){
        $this->_data['JournalDate'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getJournalNumber(){
        return $this->_data['JournalNumber'];
    }

    /**
     * @param string $value
     * @return Journal
     */
    public function setJournalNumber($value){
        $this->_data['JournalNumber'] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedDateUTC(){
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param \DateTime $value
     * @return Journal
     */
    public function setCreatedDateUTC(\DateTime $value){
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
     * @return JournalLine
     */
    public function getJournalLines(){
        return $this->_data['JournalLines'];
    }

    /**
     * @param JournalLine[] $value
     * @return Journal
     */
    public function addJournalLine(JournalLine $value){
        $this->_data['JournalLines'][] = $value;
        return $this;
    }


}