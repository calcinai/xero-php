<?php
namespace XeroPHP\Models\PayrollAU;

use XeroPHP\Remote;
use XeroPHP\Models\PayrollAU\Payslip\EarningsLine;
use XeroPHP\Models\PayrollAU\Payslip\TimesheetEarningsLine;
use XeroPHP\Models\PayrollAU\Payslip\DeductionLine;
use XeroPHP\Models\PayrollAU\Payslip\LeaveAccrualLine;
use XeroPHP\Models\PayrollAU\Payslip\ReimbursementLine;
use XeroPHP\Models\PayrollAU\Payslip\SuperannuationLine;
use XeroPHP\Models\PayrollAU\Payslip\TaxLine;
use XeroPHP\Models\PayrollAU\Payslip\LeaveEarningsLine;

class Payslip extends Remote\Object
{

    /**
     * Xero identifier for payroll employee
     *
     * @property string EmployeeID
     */

    /**
     * Xero identifier for payroll payslip
     *
     * @property string PayslipID
     */

    /**
     * See EarningsLine
     *
     * @property EarningsLine[] EarningsLines
     */

    /**
     * See TimesheetEarningsLine
     *
     * @property TimesheetEarningsLine[] TimesheetEarningsLines
     */

    /**
     * See DeductionLine
     *
     * @property DeductionLine[] DeductionLines
     */

    /**
     * See LeaveAccrualLine
     *
     * @property LeaveAccrualLine[] LeaveAccrualLines
     */

    /**
     * See ReimbursementLine – see PayItems
     *
     * @property ReimbursementLine[] ReimbursementLines
     */

    /**
     * See SuperannuationLine
     *
     * @property SuperannuationLine[] SuperannuationLines
     */

    /**
     * See TaxLine
     *
     * @property TaxLine[] TaxLines
     */

    /**
     * Employee first name
     *
     * @property string FirstName
     */

    /**
     * Employee last name
     *
     * @property string LastName
     */

    /**
     * Employee Group name
     *
     * @property string EmployeeGroup
     */

    /**
     * Last edited
     *
     * @property string LastEdited
     */

    /**
     * The Total Wages for the PayRun
     *
     * @property float[] Wages
     */

    /**
     * The Total Deductions for the PayRun
     *
     * @property float[] Deductions
     */

    /**
     * The Total NetPay for the PayRun
     *
     * @property float NetPay
     */

    /**
     * The Total Tax for the PayRun
     *
     * @property float Tax
     */

    /**
     * The Total Super for the PayRun
     *
     * @property float Super
     */

    /**
     * The Total Reimbursement for the PayRun
     *
     * @property float[] Reimbursements
     */

    /**
     * See LeaveEarningsLine
     *
     * @property LeaveEarningsLine[] LeaveEarningsLines
     */



    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Payslip';
    }


    /**
     * Get the root node name.  Just the unqualified classname
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Payslip';
    }


    /**
     * Get the guid property
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'PayslipID';
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
            'EmployeeID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'PayslipID' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'EarningsLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\EarningsLine', true, false),
            'TimesheetEarningsLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\TimesheetEarningsLine', true, false),
            'DeductionLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\DeductionLine', true, false),
            'LeaveAccrualLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\LeaveAccrualLine', true, false),
            'ReimbursementLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\ReimbursementLine', true, false),
            'SuperannuationLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\SuperannuationLine', true, false),
            'TaxLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\TaxLine', true, false),
            'FirstName' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'LastName' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'EmployeeGroup' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'LastEdited' => array (false, self::PROPERTY_TYPE_STRING, null, false, false),
            'Wages' => array (false, self::PROPERTY_TYPE_FLOAT, null, true, false),
            'Deductions' => array (false, self::PROPERTY_TYPE_FLOAT, null, true, false),
            'NetPay' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Tax' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Super' => array (false, self::PROPERTY_TYPE_FLOAT, null, false, false),
            'Reimbursements' => array (false, self::PROPERTY_TYPE_FLOAT, null, true, false),
            'LeaveEarningsLines' => array (false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\LeaveEarningsLine', true, false)
        );
    }

    public static function isPageable()
    {
        return false;
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
     * @return Payslip
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
    public function getPayslipID()
    {
        return $this->_data['PayslipID'];
    }

    /**
     * @param string $value
     * @return Payslip
     */
    public function setPayslipID($value)
    {
        $this->propertyUpdated('PayslipID', $value);
        $this->_data['PayslipID'] = $value;
        return $this;
    }

    /**
     * @return EarningsLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getEarningsLines()
    {
        return $this->_data['EarningsLines'];
    }

    /**
     * @param EarningsLine $value
     * @return Payslip
     */
    public function addEarningsLine(EarningsLine $value)
    {
        $this->propertyUpdated('EarningsLines', $value);
        if(!isset($this->_data['EarningsLines'])){
            $this->_data['EarningsLines'] = new Remote\Collection();
        }
        $this->_data['EarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return TimesheetEarningsLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getTimesheetEarningsLines()
    {
        return $this->_data['TimesheetEarningsLines'];
    }

    /**
     * @param TimesheetEarningsLine $value
     * @return Payslip
     */
    public function addTimesheetEarningsLine(TimesheetEarningsLine $value)
    {
        $this->propertyUpdated('TimesheetEarningsLines', $value);
        if(!isset($this->_data['TimesheetEarningsLines'])){
            $this->_data['TimesheetEarningsLines'] = new Remote\Collection();
        }
        $this->_data['TimesheetEarningsLines'][] = $value;
        return $this;
    }

    /**
     * @return DeductionLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getDeductionLines()
    {
        return $this->_data['DeductionLines'];
    }

    /**
     * @param DeductionLine $value
     * @return Payslip
     */
    public function addDeductionLine(DeductionLine $value)
    {
        $this->propertyUpdated('DeductionLines', $value);
        if(!isset($this->_data['DeductionLines'])){
            $this->_data['DeductionLines'] = new Remote\Collection();
        }
        $this->_data['DeductionLines'][] = $value;
        return $this;
    }

    /**
     * @return LeaveAccrualLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getLeaveAccrualLines()
    {
        return $this->_data['LeaveAccrualLines'];
    }

    /**
     * @param LeaveAccrualLine $value
     * @return Payslip
     */
    public function addLeaveAccrualLine(LeaveAccrualLine $value)
    {
        $this->propertyUpdated('LeaveAccrualLines', $value);
        if(!isset($this->_data['LeaveAccrualLines'])){
            $this->_data['LeaveAccrualLines'] = new Remote\Collection();
        }
        $this->_data['LeaveAccrualLines'][] = $value;
        return $this;
    }

    /**
     * @return ReimbursementLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getReimbursementLines()
    {
        return $this->_data['ReimbursementLines'];
    }

    /**
     * @param ReimbursementLine $value
     * @return Payslip
     */
    public function addReimbursementLine(ReimbursementLine $value)
    {
        $this->propertyUpdated('ReimbursementLines', $value);
        if(!isset($this->_data['ReimbursementLines'])){
            $this->_data['ReimbursementLines'] = new Remote\Collection();
        }
        $this->_data['ReimbursementLines'][] = $value;
        return $this;
    }

    /**
     * @return SuperannuationLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getSuperannuationLines()
    {
        return $this->_data['SuperannuationLines'];
    }

    /**
     * @param SuperannuationLine $value
     * @return Payslip
     */
    public function addSuperannuationLine(SuperannuationLine $value)
    {
        $this->propertyUpdated('SuperannuationLines', $value);
        if(!isset($this->_data['SuperannuationLines'])){
            $this->_data['SuperannuationLines'] = new Remote\Collection();
        }
        $this->_data['SuperannuationLines'][] = $value;
        return $this;
    }

    /**
     * @return TaxLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getTaxLines()
    {
        return $this->_data['TaxLines'];
    }

    /**
     * @param TaxLine $value
     * @return Payslip
     */
    public function addTaxLine(TaxLine $value)
    {
        $this->propertyUpdated('TaxLines', $value);
        if(!isset($this->_data['TaxLines'])){
            $this->_data['TaxLines'] = new Remote\Collection();
        }
        $this->_data['TaxLines'][] = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->_data['FirstName'];
    }


    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->_data['LastName'];
    }


    /**
     * @return string
     */
    public function getEmployeeGroup()
    {
        return $this->_data['EmployeeGroup'];
    }


    /**
     * @return string
     */
    public function getLastEdited()
    {
        return $this->_data['LastEdited'];
    }


    /**
     * @return float[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getWages()
    {
        return $this->_data['Wages'];
    }


    /**
     * @return float[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getDeductions()
    {
        return $this->_data['Deductions'];
    }


    /**
     * @return float
     */
    public function getNetPay()
    {
        return $this->_data['NetPay'];
    }


    /**
     * @return float
     */
    public function getTax()
    {
        return $this->_data['Tax'];
    }


    /**
     * @return float
     */
    public function getSuper()
    {
        return $this->_data['Super'];
    }


    /**
     * @return float[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getReimbursements()
    {
        return $this->_data['Reimbursements'];
    }


    /**
     * @return LeaveEarningsLine[]|Remote\Collection
     * Always returns a collection, switch is for type hinting
     */
    public function getLeaveEarningsLines()
    {
        return $this->_data['LeaveEarningsLines'];
    }



}
