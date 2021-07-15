<?php

namespace XeroPHP\Models\PracticeManager;

use XeroPHP\Models\PracticeManager\Invoice\Contact;
use XeroPHP\Models\PracticeManager\Invoice\Cost;
use XeroPHP\Models\PracticeManager\Invoice\Job;
use XeroPHP\Models\PracticeManager\Invoice\Task;
use XeroPHP\Remote;

class Invoice extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string InternalID
     */

    /**
     * Invoice Number.
     *
     * @property string ID
     */

    /**
     * Type of Invoice
     *
     * @property string Type
     */

    /**
     * Status of Invoice - Approved, Paid, Draft, Cancelled
     *
     * @property string Status
     */

    /**
     * JobText of Invoice
     *
     * @property string JobText
     */

    /**
     * Date of Invoice
     *
     * @property \DateTimeInterface Date
     */

    /**
     * DueDate of Invoice
     *
     * @property \DateTimeInterface DueDate
     */

    /**
     * Amount of Invoice
     *
     * @property float Amount
     */

    /**
     * AmountTax of Invoice
     *
     * @property float AmountTax
     */

    /**
     * AmountIncludingTax of Invoice
     *
     * @property float AmountIncludingTax
     */

    /**
     * AmountPaid of Invoice
     *
     * @property float AmountPaid
     */

    /**
     * AmountOutstanding of Invoice
     *
     * @property float AmountOutstanding
     */

    /**
     * Client of Invoice
     *
     * @property \XeroPHP\Models\PracticeManager\Invoice\Client Client
     */

    /**
     * Contact of Invoice
     *
     * @property \XeroPHP\Models\PracticeManager\Invoice\Contact Contact
     */

    /**
     * Jobs of Invoice
     *
     * @property \XeroPHP\Models\PracticeManager\Invoice\Job[] Jobs
     */

    /**
     * Tasks of Invoice
     *
     * @property \XeroPHP\Models\PracticeManager\Invoice\Task[] Tasks
     */


    /**
     * Get the resource uri of the class (Clients) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'invoice.api/list';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'InvoiceDefinition';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return '';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string|null
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_PRACTICE_MANAGER;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
            Remote\Request::METHOD_POST,
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_DELETE,
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
            'InternalID'         => [false, self::PROPERTY_TYPE_INT, null, false, false],
            'ID'                 => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Type'               => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'Status'             => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'JobText'            => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Description'        => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Date'               => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'DueDate'            => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'Amount'             => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountTax'          => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountIncludingTax' => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountPaid'         => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'AmountOutstanding'  => [false, self::PROPERTY_TYPE_FLOAT, null, false, false],
            'Client'             => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Client', false, false],
            'Contact'            => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Contact', false, false],
            'Jobs'               => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Job', true, false],
            'Tasks'              => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Task', true, false],
            'Costs'              => [false, self::PROPERTY_TYPE_OBJECT, 'PracticeManager\\Invoice\\Cost', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return int
     */
    public function getInternalID()
    {
        return $this->_data['InternalID'];
    }

    /**
     * @param int $value
     *
     * @return self
     */
    public function setInternalID($value)
    {
        $this->propertyUpdated('InternalID', $value);
        $this->_data['InternalID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getID()
    {
        return $this->_data['ID'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setID($value)
    {
        $this->propertyUpdated('ID', $value);
        $this->_data['ID'] = $value;

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
     * @return self
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
    public function getStatus()
    {
        return $this->_data['Status'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setStatus($value)
    {
        $this->propertyUpdated('Status', $value);
        $this->_data['Status'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getJobText()
    {
        return $this->_data['JobText'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setJobText($value)
    {
        $this->propertyUpdated('JobText', $value);
        $this->_data['JobText'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_data['Description'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setDescription($value)
    {
        $this->propertyUpdated('Description', $value);
        $this->_data['Description'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDate()
    {
        return $this->_data['Date'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return self
     */
    public function setDate($value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getDueDate()
    {
        return $this->_data['DueDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return self
     */
    public function setDueDate($value)
    {
        $this->propertyUpdated('DueDate', $value);
        $this->_data['DueDate'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->_data['Amount'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmount($value)
    {
        $this->propertyUpdated('Amount', $value);
        $this->_data['Amount'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountTax()
    {
        return $this->_data['AmountTax'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountTax($value)
    {
        $this->propertyUpdated('AmountTax', $value);
        $this->_data['AmountTax'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountIncludingTax()
    {
        return $this->_data['AmountIncludingTax'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountIncludingTax($value)
    {
        $this->propertyUpdated('AmountIncludingTax', $value);
        $this->_data['AmountIncludingTax'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountPaid()
    {
        return $this->_data['AmountPaid'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountPaid($value)
    {
        $this->propertyUpdated('AmountPaid', $value);
        $this->_data['AmountPaid'] = $value;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountOutstanding()
    {
        return $this->_data['AmountOutstanding'];
    }

    /**
     * @param float $value
     *
     * @return self
     */
    public function setAmountOutstanding($value)
    {
        $this->propertyUpdated('AmountOutstanding', $value);
        $this->_data['AmountOutstanding'] = $value;

        return $this;
    }

    /**
     * @return \XeroPHP\Models\PracticeManager\Invoice\Client
     */
    public function getClient()
    {
        return $this->_data['Client'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setClient($value)
    {
        $this->propertyUpdated('Client', $value);
        $this->_data['Client'] = $value;

        return $this;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->_data['Contact'];
    }

    /**
     * @param string $value
     *
     * @return self
     */
    public function setContact($value)
    {
        $this->propertyUpdated('Contact', $value);
        $this->_data['Contact'] = $value;

        return $this;
    }

    /**
     * @return Job[]|Remote\Collection
     */
    public function getJobs()
    {
        return $this->_data['Jobs'];
    }

    /**
     * @param Job $value
     *
     * @return self
     */
    public function addJob(Job $value)
    {
        $this->propertyUpdated('Jobs', $value);
        if (!isset($this->_data['Jobs'])) {
            $this->_data['Jobs'] = new Remote\Collection();
        }
        $this->_data['Jobs'][] = $value;

        return $this;
    }

    /**
     * @return Task[]|Remote\Collection
     */
    public function getTasks()
    {
        return $this->_data['Tasks'];
    }

    /**
     * @param Task $value
     *
     * @return self
     */
    public function addTask(Task $value)
    {
        $this->propertyUpdated('Tasks', $value);
        if (!isset($this->_data['Tasks'])) {
            $this->_data['Tasks'] = new Remote\Collection();
        }
        $this->_data['Tasks'][] = $value;

        return $this;
    }

    /**
     * @return Cost[]|Remote\Collection
     */
    public function getCosts()
    {
        return $this->_data['Costs'];
    }

    /**
     * @param Cost $value
     *
     * @return self
     */
    public function addCost(Cost $value)
    {
        $this->propertyUpdated('Costs', $value);
        if (!isset($this->_data['Costs'])) {
            $this->_data['Costs'] = new Remote\Collection();
        }
        $this->_data['Costs'][] = $value;

        return $this;
    }
}
