<?php
namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;

class SuperFund extends Remote\Object
{

    /**
     * Xero identifier
     *
     * @property string SuperFundID
     */

    /**
     * REGULATED see Super Fund Types
     *
     * @property string Type
     */

    /**
     * The ABN of the Regulated SuperFund
     *
     * @property string ABN
     */

    /**
     * The USI of the Regulated SuperFund
     *
     * @property string USI
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'SuperFunds';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'SuperFund';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'SuperFundID';
    }


    /**
     * Get the stem of the API (core.xro) etc
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PAYROLL;
    }


    /**
     * Get the supported methods
     */
    public static function getSupportedMethods()
    {
        return array(
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_GET
        );
    }

    /**
     *
     * Get the properties of the object.  Indexed by constants
     *  [0] - Mandatory
     *  [1] - Type
     *  [2] - PHP type
     *  [3] - Is an Array
     *  [4] - Saves directly
     *
     * @return array
     */
    public static function getProperties()
    {
        return array(
            'SuperFundID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Type' => array (false, self::PROPERTY_TYPE_ENUM, null, false, false),
            'ABN' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'USI' => array (false, self::PROPERTY_TYPE_STRING, null, false, false)
        );
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
     * @return SuperFund
     */
    public function setUSI($value)
    {
        $this->propertyUpdated('USI', $value);
        $this->_data['USI'] = $value;
        return $this;
    }


}
