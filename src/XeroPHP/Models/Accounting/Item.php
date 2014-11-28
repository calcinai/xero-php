<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote\Object as RemoteObject;

class Item extends RemoteObject {

    /**
     * User defined item code (max length = 30) 
     *
     * @property string Code
     */

    /**
     * Description of item 
     *
     * @property string Description
     */

    /**
     * See Purchases & Sales 
     *
     * @property string[] PurchaseDetails
     */

    /**
     * See Purchases & Sales 
     *
     * @property string[] SalesDetails
     */


    /**
     * @return string
     */
    public function getCode(){
        return $this->_data['Code'];
    }

    /**
     * @param string $value
     * @return Item
     */
    public function setCode($value){
        $this->_data['Code'] = $value;
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
     * @return Item
     */
    public function setDescription($value){
        $this->_data['Description'] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPurchaseDetails(){
        return $this->_data['PurchaseDetails'];
    }

    /**
     * @param string[] $value
     * @return Item
     */
    public function addPurchaseDetail($value){
        $this->_data['PurchaseDetails'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSalesDetails(){
        return $this->_data['SalesDetails'];
    }

    /**
     * @param string[] $value
     * @return Item
     */
    public function addSalesDetail($value){
        $this->_data['SalesDetails'][] = $value;
        return $this;
    }



}