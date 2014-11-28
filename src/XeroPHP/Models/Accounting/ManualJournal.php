<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class ManualJournal extends RemoteObject {

    /**
     * Description of journal being posted 
     *
     * @property string Narration
     */

    /**
     * See JournalLines 
     *
     * @property object[] JournalLines
     */

    /**
     * Date journal was posted – YYYY-MM-DD 
     *
     * @property date Date
     */

    /**
     * NoTax by default if you don’t specify this element. See Line Amount Types 
     *
     * @property enum[] LineAmountTypes
     */

    /**
     * See Manual Journal Status Codes 
     *
     * @property enum[] Status
     */

    /**
     * Url link to a source document – shown as “Go to [appName]” in the Xero app 
     *
     * @property string Url
     */

    /**
     * Boolean – default is true if not specified 
     *
     * @property bool[] ShowOnCashBasisReports
     */

    /**
     * Boolean to indicate if a manual journal has an attachment 
     *
     * @property bool[] HasAttachments
     */


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
     * @return object
     */
    public function getJournalLines(){
        return $this->_data['JournalLines'];
    }

    /**
     * @param object[] $value
     * @return ManualJournal
     */
    public function addJournalLine($value){
        $this->_data['JournalLines'][] = $value;
        return $this;
    }

    /**
     * @return date
     */
    public function getDate(){
        return $this->_data['Date'];
    }

    /**
     * @param date $value
     * @return ManualJournal
     */
    public function setDate($value){
        $this->_data['Date'] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getLineAmountTypes(){
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param enum[] $value
     * @return ManualJournal
     */
    public function addLineAmountType($value){
        $this->_data['LineAmountTypes'][] = $value;
        return $this;
    }

    /**
     * @return enum
     */
    public function getStatus(){
        return $this->_data['Status'];
    }

    /**
     * @param enum[] $value
     * @return ManualJournal
     */
    public function addStatu($value){
        $this->_data['Status'][] = $value;
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
     * @param bool[] $value
     * @return ManualJournal
     */
    public function addShowOnCashBasisReport($value){
        $this->_data['ShowOnCashBasisReports'][] = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments(){
        return $this->_data['HasAttachments'];
    }

    /**
     * @param bool[] $value
     * @return ManualJournal
     */
    public function addHasAttachment($value){
        $this->_data['HasAttachments'][] = $value;
        return $this;
    }



}