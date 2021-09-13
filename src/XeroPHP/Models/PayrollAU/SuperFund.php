<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

class SuperFund extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string SuperFundID
     */

    /**
     * REGULATED see Super Fund Types.
     *
     * @property string Type
     */

    /**
     * The ABN of the Regulated SuperFund.
     *
     * @property string ABN
     */

    /**
     * The USI of the Regulated SuperFund.
     *
     * @property string USI
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'SuperFunds';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'SuperFund';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'SuperFundID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET,
        ];
    }

    /**
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly.
     *
     * @return array
     */
    public static function getProperties()
    {
        return [
            'SuperFundID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'ABN' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'USI' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Name' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BSB' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'AccountName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ElectronicServiceAddress' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployerNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SPIN' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getSuperFundID()
    {
        return $this->_data['SuperFundID'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setSuperFundID($value)
    {
        $this->propertyUpdated('SuperFundID', $value);
        $this->_data['SuperFundID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->_data['Type'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setType($value)
    {
        $this->propertyUpdated('Type', $value);
        $this->_data['Type'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getABN()
    {
        return $this->_data['ABN'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setABN($value)
    {
        $this->propertyUpdated('ABN', $value);
        $this->_data['ABN'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getUSI()
    {
        return $this->_data['USI'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setUSI($value)
    {
        $this->propertyUpdated('USI', $value);
        $this->_data['USI'] = $value;

        return $this;
    }

    // PUTTING IN METHODS FROM SUPERFUND/SUPERFUND

    /**
     * @return string
     */
    public function getBSB()
    {
        return $this->_data['BSB'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setBSB($value)
    {
        $this->propertyUpdated('BSB', $value);
        $this->_data['BSB'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->_data['AccountNumber'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setAccountNumber($value)
    {
        $this->propertyUpdated('AccountNumber', $value);
        $this->_data['AccountNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getAccountName()
    {
        return $this->_data['AccountName'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setAccountName($value)
    {
        $this->propertyUpdated('AccountName', $value);
        $this->_data['AccountName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getElectronicServiceAddress()
    {
        return $this->_data['ElectronicServiceAddress'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setElectronicServiceAddress($value)
    {
        $this->propertyUpdated('ElectronicServiceAddress', $value);
        $this->_data['ElectronicServiceAddress'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployerNumber()
    {
        return $this->_data['EmployerNumber'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setEmployerNumber($value)
    {
        $this->propertyUpdated('EmployerNumber', $value);
        $this->_data['EmployerNumber'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getSPIN()
    {
        return $this->_data['SPIN'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     *
     * @deprecated
     */
    public function setSPIN($value)
    {
        $this->propertyUpdated('SPIN', $value);
        $this->_data['SPIN'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->_data['Name'];
    }

    /**
     * @param string $value
     *
     * @return SuperFund
     */
    public function setName($value)
    {
        $this->propertyUpdated('Name', $value);
        $this->_data['Name'] = $value;

        return $this;
    }
}
