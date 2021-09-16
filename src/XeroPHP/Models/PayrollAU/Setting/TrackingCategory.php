<?php

namespace XeroPHP\Models\PayrollAU\Setting;

use XeroPHP\Remote;

class TrackingCategory extends Remote\Model
{
    /**
     * Employee Groups tracking category
     *
     * @property EmployeeGroup employeeGroups
     */

    /**
     * Timesheet Categories tracking category
     *
     * @property TimesheetCategory timesheetCategories
     */

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'TrackingCategories';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'TrackingCategory';
    }

    /**
     * Get the guid property. This model doesn't have one.
     *
     * @return string
     */
    public static function getGUIDProperty() {
        return '';
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
            Remote\Request::METHOD_GET
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
            'EmployeeGroups' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Setting\\EmployeeGroup', false, false],
            'TimesheetCategories' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Setting\\TimesheetCategory', false, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getEmployeeGroups()
    {
        return $this->_data['EmployeeGroups'];
    }

    /**
     * @return string
     */
    public function getTimesheetCategories()
    {
        return $this->_data['TimesheetCategories'];
    }

}
