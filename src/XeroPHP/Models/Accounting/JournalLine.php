<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class JournalLine extends RemoteObject {

    /**
     * total for line. Debits are positive, credits are negative value 
     *
     * @property string LineAmount
     */

    /**
     * See Accounts 
     *
     * @property string AccountCode
     */

    /**
     * Description for journal line 
     *
     * @property string Description
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see TaxTypes. 
     *
     * @property string TaxType
     */

    /**
     * Optional Tracking Category – see Tracking.  Any JournalLine can have a maximum of 2 <TrackingCategory> 
     * elements. 
     *
     * @property string Tracking
     */


    /**
     * @return string
     */
    public function getLineAmount(){
        return $this->_data['LineAmount'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setLineAmount($value){
        $this->_data['LineAmount'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getAccountCode(){
        return $this->_data['AccountCode'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setAccountCode($value){
        $this->_data['AccountCode'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(){
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTaxType(){
        return $this->_data['TaxType'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTracking(){
        return $this->_data['Tracking'];
    }

    /**
     * @param string $value
     * @return JournalLine
     */
    public function setTracking($value){
        $this->_data['Tracking'] = $value;
        return $this;
    }



}