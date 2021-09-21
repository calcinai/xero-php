<?php

namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\Employee\BankAccount;
use XeroPHP\Models\PayrollAU\Employee\HomeAddress;
use XeroPHP\Models\PayrollAU\Employee\PayTemplate;
use XeroPHP\Models\PayrollAU\Employee\LeaveBalance;
use XeroPHP\Models\PayrollAU\Employee\OpeningBalance;
use XeroPHP\Models\PayrollAU\Employee\TaxDeclaration;
use XeroPHP\Models\PayrollAU\Employee\SuperMembership;

class Employee extends Remote\Model
{
    /**
     * First name of employee (max length = 35).
     *
     * @property string FirstName
     */

    /**
     * Last name of employee (max length = 35).
     *
     * @property string LastName
     */

    /**
     * Date of birth of the employee (YYYY-MM-DD).
     *
     * @property \DateTimeInterface DateOfBirth
     */

    /**
     * Employee home address. See HomeAddress.
     *
     * @property HomeAddress HomeAddress
     */

    /**
     * If you aren’t sure of the exact start date for an employee, you can just enter the start of the
     * current financial year (YYYY-MM-DD).
     *
     * @property \DateTimeInterface StartDate
     */

    /**
     * Title of the employee (max length = 10).
     *
     * @property string Title
     */

    /**
     * Middle name(s) of the employee (max length = 35).
     *
     * @property string MiddleNames
     */

    /**
     * The email address for the employee (max length = 100).
     *
     * @property string Email
     */

    /**
     * The employee’s gender (M or F).
     *
     * @property string Gender
     */

    /**
     * Employee mobile number (max length = 50).
     *
     * @property string Mobile
     */

    /**
     * Employee’s twitter name, entered as @twittername (max length = 50).
     *
     * @property string TwitterUserName
     */

    /**
     * Boolean (true / false) – set this to true if the employee is authorised to approve other
     * employees’ leave requests.
     *
     * @property bool IsAuthorisedToApproveLeave
     */

    /**
     * Booelan – set this to true if the employee is authorised to approve timesheets.
     *
     * @property bool IsAuthorisedToApproveTimesheets
     */

    /**
     * This property has been removed from the Xero API.
     *
     * @property string Occupation
     *
     * @deprecated
     */

    /**
     * JobTitle of the employee (max length = 50).
     *
     * @property string JobTitle
     */

    /**
     * Employees under an award scheme will be covered by a modern award classification. If you record a
     * classification, it will be included on your payslips (max length = 100).
     *
     * @property string Classification
     */

    /**
     * Xero unique identifier for earnings rate.
     *
     * @property string OrdinaryEarningsRateID
     */

    /**
     * Xero unique identifier for payroll calendar for the employee.
     *
     * @property string PayrollCalendarID
     */

    /**
     * The Employee Group allows you to report on payroll expenses and liabilities for each group of
     * employees.
     *
     * @property string EmployeeGroupName
     */

    /**
     * See BankAccount.
     *
     * @property BankAccount[] BankAccounts
     */

    /**
     * See PayTemplate.
     *
     * @property PayTemplate PayTemplate
     */

    /**
     * See OpeningBalances.
     *
     * @property OpeningBalance[] OpeningBalances
     */

    /**
     * See LeaveBalances.
     *
     * @property LeaveBalance[] LeaveBalances
     */

    /**
     * See SuperMemberships.
     *
     * @property SuperMembership[] SuperMemberships
     */

    /**
     * Employee Termination Date (YYYY-MM-DD).
     *
     * @property \DateTimeInterface TerminationDate
     */

    /**
     * Employee Termination Reason
     *
     * @property string TerminationReason
     */

    /**
     * Xero unique identifier for an Employee.
     *
     * @property string EmployeeID
     */

    /**
     * See Employee Status Types.
     *
     * @property string Status
     */

    /**
     * Last modified timestamp.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */
    const STATEABBREVIATION_ACT = 'ACT';

    const STATEABBREVIATION_NSW = 'NSW';

    const STATEABBREVIATION_NT = 'NT';

    const STATEABBREVIATION_QLD = 'QLD';

    const STATEABBREVIATION_SA = 'SA';

    const STATEABBREVIATION_TAS = 'TAS';

    const STATEABBREVIATION_VIC = 'VIC';

    const STATEABBREVIATION_WA = 'WA';

    const STATUS_ACTIVE = 'ACTIVE';

    const STATUS_TERMINATED = 'TERMINATED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Employees';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Employee';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'EmployeeID';
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
            'FirstName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'LastName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'DateOfBirth' => [true, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'HomeAddress' => [true, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\HomeAddress', false, false],
            'StartDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Title' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'MiddleNames' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Email' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Gender' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Mobile' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Phone' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'TwitterUserName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'IsAuthorisedToApproveLeave' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'IsAuthorisedToApproveTimesheets' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'Occupation' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'JobTitle' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Classification' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'OrdinaryEarningsRateID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'PayrollCalendarID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeGroupName' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'BankAccounts' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\BankAccount', true, false],
            'PayTemplate' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\PayTemplate', false, false],
            'OpeningBalances' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\OpeningBalance', true, false],
            'LeaveBalances' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\LeaveBalance', true, false],
            'SuperMemberships' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\SuperMembership', true, false],
            'TerminationDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'TerminationReason' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EmployeeID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'TaxDeclaration' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Employee\\TaxDeclaration', false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data['FirstName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setFirstName($value)
    {
        $this->propertyUpdated('FirstName', $value);
        $this->_data['FirstName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data['LastName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setLastName($value)
    {
        $this->propertyUpdated('LastName', $value);
        $this->_data['LastName'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDateOfBirth()
    {
        return $this->_data['DateOfBirth'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Employee
     */
    public function setDateOfBirth(\DateTimeInterface $value)
    {
        $this->propertyUpdated('DateOfBirth', $value);
        $this->_data['DateOfBirth'] = $value;

        return $this;
    }

    /**
     * @return HomeAddress
     */
    public function getHomeAddress()
    {
        return $this->_data['HomeAddress'];
    }

    /**
     * @param HomeAddress $value
     *
     * @return Employee
     */
    public function setHomeAddress(HomeAddress $value)
    {
        $this->propertyUpdated('HomeAddress', $value);
        $this->_data['HomeAddress'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate()
    {
        return $this->_data['StartDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Employee
     */
    public function setStartDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('StartDate', $value);
        $this->_data['StartDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_data['Title'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setTitle($value)
    {
        $this->propertyUpdated('Title', $value);
        $this->_data['Title'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getMiddleNames()
    {
        return $this->_data['MiddleNames'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setMiddleName($value)
    {
        $this->propertyUpdated('MiddleNames', $value);
        $this->_data['MiddleNames'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->_data['Email'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setEmail($value)
    {
        $this->propertyUpdated('Email', $value);
        $this->_data['Email'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->_data['Gender'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setGender($value)
    {
        $this->propertyUpdated('Gender', $value);
        $this->_data['Gender'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobile()
    {
        return $this->_data['Mobile'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setMobile($value)
    {
        $this->propertyUpdated('Mobile', $value);
        $this->_data['Mobile'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTwitterUserName()
    {
        return $this->_data['TwitterUserName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setTwitterUserName($value)
    {
        $this->propertyUpdated('TwitterUserName', $value);
        $this->_data['TwitterUserName'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAuthorisedToApproveLeave()
    {
        return $this->_data['IsAuthorisedToApproveLeave'];
    }

    /**
     * @param bool $value
     *
     * @return Employee
     */
    public function setIsAuthorisedToApproveLeave($value)
    {
        $this->propertyUpdated('IsAuthorisedToApproveLeave', $value);
        $this->_data['IsAuthorisedToApproveLeave'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getIsAuthorisedToApproveTimesheets()
    {
        return $this->_data['IsAuthorisedToApproveTimesheets'];
    }

    /**
     * @param bool $value
     *
     * @return Employee
     */
    public function setIsAuthorisedToApproveTimesheet($value)
    {
        $this->propertyUpdated('IsAuthorisedToApproveTimesheets', $value);
        $this->_data['IsAuthorisedToApproveTimesheets'] = $value;

        return $this;
    }

    /**
     * @return string
     *
     * @deprecated
     */
    public function getOccupation()
    {
        return $this->_data['Occupation'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     *
     * @deprecated
     */
    public function setOccupation($value)
    {
        $this->propertyUpdated('Occupation', $value);
        $this->_data['Occupation'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getJobTitle()
    {
        return $this->_data['JobTitle'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setJobTitle($value)
    {
        $this->propertyUpdated('JobTitle', $value);
        $this->_data['JobTitle'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getClassification()
    {
        return $this->_data['Classification'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setClassification($value)
    {
        $this->propertyUpdated('Classification', $value);
        $this->_data['Classification'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrdinaryEarningsRateID()
    {
        return $this->_data['OrdinaryEarningsRateID'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setOrdinaryEarningsRateID($value)
    {
        $this->propertyUpdated('OrdinaryEarningsRateID', $value);
        $this->_data['OrdinaryEarningsRateID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPayrollCalendarID()
    {
        return $this->_data['PayrollCalendarID'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setPayrollCalendarID($value)
    {
        $this->propertyUpdated('PayrollCalendarID', $value);
        $this->_data['PayrollCalendarID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeGroupName()
    {
        return $this->_data['EmployeeGroupName'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setEmployeeGroupName($value)
    {
        $this->propertyUpdated('EmployeeGroupName', $value);
        $this->_data['EmployeeGroupName'] = $value;

        return $this;
    }

    /**
     * @return BankAccount[]|Remote\Collection
     */
    public function getBankAccounts()
    {
        return $this->_data['BankAccounts'];
    }

    /**
     * @param BankAccount $value
     *
     * @return Employee
     */
    public function addBankAccount(BankAccount $value)
    {
        $this->propertyUpdated('BankAccounts', $value);
        if (! isset($this->_data['BankAccounts'])) {
            $this->_data['BankAccounts'] = new Remote\Collection();
        }
        $this->_data['BankAccounts'][] = $value;

        return $this;
    }

    /**
     * @return PayTemplate
     */
    public function getPayTemplate()
    {
        return $this->_data['PayTemplate'];
    }

    /**
     * @param PayTemplate $value
     *
     * @return Employee
     */
    public function setPayTemplate(PayTemplate $value)
    {
        $this->propertyUpdated('PayTemplate', $value);
        $this->_data['PayTemplate'] = $value;

        return $this;
    }

    /**
     * @return OpeningBalance[]|Remote\Collection
     */
    public function getOpeningBalances()
    {
        return $this->_data['OpeningBalances'];
    }

    /**
     * @param OpeningBalance $value
     *
     * @return Employee
     */
    public function addOpeningBalance(OpeningBalance $value)
    {
        $this->propertyUpdated('OpeningBalances', $value);
        if (! isset($this->_data['OpeningBalances'])) {
            $this->_data['OpeningBalances'] = new Remote\Collection();
        }
        $this->_data['OpeningBalances'][] = $value;

        return $this;
    }

    /**
     * @return LeaveBalance[]|Remote\Collection
     */
    public function getLeaveBalances()
    {
        return $this->_data['LeaveBalances'];
    }

    /**
     * @param LeaveBalance $value
     *
     * @return Employee
     */
    public function addLeaveBalance(LeaveBalance $value)
    {
        $this->propertyUpdated('LeaveBalances', $value);
        if (! isset($this->_data['LeaveBalances'])) {
            $this->_data['LeaveBalances'] = new Remote\Collection();
        }
        $this->_data['LeaveBalances'][] = $value;

        return $this;
    }

    /**
     * @return Remote\Collection|SuperMembership[]
     */
    public function getSuperMemberships()
    {
        return $this->_data['SuperMemberships'];
    }

    /**
     * @param SuperMembership $value
     *
     * @return Employee
     */
    public function addSuperMembership(SuperMembership $value)
    {
        $this->propertyUpdated('SuperMemberships', $value);
        if (! isset($this->_data['SuperMemberships'])) {
            $this->_data['SuperMemberships'] = new Remote\Collection();
        }
        $this->_data['SuperMemberships'][] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getTerminationDate()
    {
        return $this->_data['TerminationDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Employee
     */
    public function setTerminationDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('TerminationDate', $value);
        $this->_data['TerminationDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getTerminationReason()
    {
        return $this->_data['TerminationReason'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setTerminationReason($value)
    {
        $this->propertyUpdated('TerminationReason', $value);
        $this->_data['TerminationReason'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmployeeID()
    {
        return $this->_data['EmployeeID'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setEmployeeID($value)
    {
        $this->propertyUpdated('EmployeeID', $value);
        $this->_data['EmployeeID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Employee
     */
    public function setUpdatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return TaxDeclaration
     */
    public function getTaxDeclaration()
    {
        return $this->_data['TaxDeclaration'];
    }

    /**
     * @param TaxDeclaration $value
     *
     * @return Employee
     */
    public function setTaxDeclaration(TaxDeclaration $value)
    {
        $this->propertyUpdated('TaxDeclaration', $value);
        $this->_data['TaxDeclaration'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->_data['Phone'];
    }

    /**
     * @param string $value
     *
     * @return Employee
     */
    public function setPhone($value)
    {
        $this->propertyUpdated('Phone', $value);
        $this->_data['Phone'] = $value;

        return $this;
    }
}
