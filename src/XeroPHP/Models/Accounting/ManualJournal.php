<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;

use XeroPHP\Models\Accounting\ManualJournal\JournalLine;

class ManualJournal extends Remote\Object {

    /**
     * Description of journal being posted
     *
     * @property string Narration
     */

    /**
     * See JournalLines
     *
     * @property JournalLine[] JournalLines
     */

    /**
     * Date journal was posted – YYYY-MM-DD
     *
     * @property \DateTime Date
     */

    /**
     * NoTax by default if you don’t specify this element. See Line Amount Types
     *
     * @property string LineAmountTypes
     */

    /**
     * See Manual Journal Status Codes
     *
     * @property string Status
     */

    /**
     * Url link to a source document – shown as “Go to [appName]” in the Xero app
     *
     * @property string Url
     */

    /**
     * Boolean – default is true if not specified
     *
     * @property bool ShowOnCashBasisReports
     */

    /**
     * Boolean to indicate if a manual journal has an attachment
     *
     * @property bool HasAttachments
     */


    const MANUAL_JOURNAL_STATUS_CODE_DRAFT   = 'DRAFT'; 
    const MANUAL_JOURNAL_STATUS_CODE_POSTED  = 'POSTED'; 
    const MANUAL_JOURNAL_STATUS_CODE_DELETED = 'DELETED'; 
    const MANUAL_JOURNAL_STATUS_CODE_VOIDED  = 'VOIDED'; 


    /*
    * Get the resource uri of the class (Contacts) etc
    */
    public static function getResourceURI(){
        return 'ManualJournals';
    }


    /*
    * Get the root node name.  Just the unqualified classname
    */
    public static function getRootNodeName(){
        return 'ManualJournal';
    }


    /*
    * Get the guid property
    */
    public static function getGUIDProperty(){
        return '';
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
            Remote\Request::METHOD_GET,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST
        );
    }

    public static function getProperties(){
        return array(
            'Narration',
            'JournalLines',
            'Date',
            'LineAmountTypes',
            'Status',
            'Url',
            'ShowOnCashBasisReports',
            'HasAttachments'
        );
    }


    /**
     * @return string
     */
    public function getNarration(){
        return $this->_data['Narration'];
    }

    /**
     * @param string $value
     * @return ManualJournal
     */
    public function setNarration($value){
        $this->_data['Narration'] = $value;
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
     * @return ManualJournal
     */
    public function addJournalLine(JournalLine $value){
        $this->_data['JournalLines'][] = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param \DateTime $value
     * @return ManualJournal
     */
    public function setDate(\DateTime $value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     * @return ManualJournal
     */
    public function setLineAmountType($value){
        $this->_data['LineAmountTypes'] = $value;
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
     * @return ManualJournal
     */
    public function setStatu($value){
        $this->_data['Status'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl(){
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     * @return ManualJournal
     */
    public function setUrl($value){
        $this->_data['Url'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getShowOnCashBasisReports(){
        return $this->_data['ShowOnCashBasisReports'];
    }

    /**
     * @param bool $value
     * @return ManualJournal
     */
    public function setShowOnCashBasisReport($value){
        $this->_data['ShowOnCashBasisReports'] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool $value
     * @return ManualJournal
     */
    public function setHasAttachment($value){
        $this->_data['HasAttachments'] = $value;
        return $this;
    }


}