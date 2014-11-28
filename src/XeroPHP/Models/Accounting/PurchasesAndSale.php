<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class PurchasesAndSale extends RemoteObject {

    /**
     * Unit Price of item 
     *
     * @property string UnitPrice
     */

    /**
     * Account code to be used for purchased item 
     *
     * @property string AccountCode
     */

    /**
     * Used as an override if the default Tax Code for the selected <AccountCode> is not correct – see TaxTypes. 
     *
     * @property string TaxType
     */


    /**
     * @return string
     */
    public function getUnitPrice(){
        return $this->_data['UnitPrice'];
    }

    /**
     * @param string $value
     * @return PurchasesAndSale
     */
    public function setUnitPrice($value){
        $this->_data['UnitPrice'] = $value;
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
     * @return PurchasesAndSale
     */
    public function setAccountCode($value){
        $this->_data['AccountCode'] = $value;
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
     * @return PurchasesAndSale
     */
    public function setTaxType($value){
        $this->_data['TaxType'] = $value;
        return $this;
    }



}