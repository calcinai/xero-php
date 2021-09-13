<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Models\Accounting\Journal\JournalLine;

class Journal extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string JournalID
     */

    /**
     * Date the journal was posted.
     *
     * @property \DateTimeInterface JournalDate
     */

    /**
     * Xero generated journal number.
     *
     * @property string JournalNumber
     */

    /**
     * Created date UTC format.
     *
     * @property \DateTimeInterface CreatedDateUTC
     */

    /**
     * @property string Reference
     */

    /**
     * The identifier for the source transaction (e.g. InvoiceID).
     *
     * @property string SourceID
     */

    /**
     * The journal source type. The type of transaction that created the journal.
     *
     * @property string SourceType
     */

    /**
     * See JournalLines.
     *
     * @property JournalLine[] JournalLines
     */
    const JOURNAL_SOURCE_TYPE_ACCREC = 'ACCREC';

    const JOURNAL_SOURCE_TYPE_ACCPAY = 'ACCPAY';

    const JOURNAL_SOURCE_TYPE_ACCRECCREDIT = 'ACCRECCREDIT';

    const JOURNAL_SOURCE_TYPE_ACCPAYCREDIT = 'ACCPAYCREDIT';

    const JOURNAL_SOURCE_TYPE_ACCRECPAYMENT = 'ACCRECPAYMENT';

    const JOURNAL_SOURCE_TYPE_ACCPAYPAYMENT = 'ACCPAYPAYMENT';

    const JOURNAL_SOURCE_TYPE_ARCREDITPAYMENT = 'ARCREDITPAYMENT';

    const JOURNAL_SOURCE_TYPE_APCREDITPAYMENT = 'APCREDITPAYMENT';

    const JOURNAL_SOURCE_TYPE_CASHREC = 'CASHREC';

    const JOURNAL_SOURCE_TYPE_CASHPAID = 'CASHPAID';

    const JOURNAL_SOURCE_TYPE_TRANSFER = 'TRANSFER';

    const JOURNAL_SOURCE_TYPE_ARPREPAYMENT = 'ARPREPAYMENT';

    const JOURNAL_SOURCE_TYPE_APPREPAYMENT = 'APPREPAYMENT';

    const JOURNAL_SOURCE_TYPE_AROVERPAYMENT = 'AROVERPAYMENT';

    const JOURNAL_SOURCE_TYPE_APOVERPAYMENT = 'APOVERPAYMENT';

    const JOURNAL_SOURCE_TYPE_EXPCLAIM = 'EXPCLAIM';

    const JOURNAL_SOURCE_TYPE_EXPPAYMENT = 'EXPPAYMENT';

    const JOURNAL_SOURCE_TYPE_MANJOURNAL = 'MANJOURNAL';

    const JOURNAL_SOURCE_TYPE_PAYSLIP = 'PAYSLIP';

    const JOURNAL_SOURCE_TYPE_WAGEPAYABLE = 'WAGEPAYABLE';

    const JOURNAL_SOURCE_TYPE_INTEGRATEDPAYROLLPE = 'INTEGRATEDPAYROLLPE';

    const JOURNAL_SOURCE_TYPE_INTEGRATEDPAYROLLPT = 'INTEGRATEDPAYROLLPT';

    const JOURNAL_SOURCE_TYPE_EXTERNALSPENDMONEY = 'EXTERNALSPENDMONEY';

    const JOURNAL_SOURCE_TYPE_INTEGRATEDPAYROLLPTPAYMENT = 'INTEGRATEDPAYROLLPTPAYMENT';

    const JOURNAL_SOURCE_TYPE_INTEGRATEDPAYROLLCN = 'INTEGRATEDPAYROLLCN';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Journals';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Journal';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'JournalID';
    }

    /**
     * Get the stem of the API (core.xro) etc.
     *
     * @return string
     */
    public static function getAPIStem()
    {
        return Remote\URL::API_CORE;
    }

    /**
     * Get the supported methods.
     */
    public static function getSupportedMethods()
    {
        return [
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
            'JournalID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'JournalDate' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'JournalNumber' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'CreatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'Reference' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SourceID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'SourceType' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'JournalLines' => [false, self::PROPERTY_TYPE_OBJECT, 'Accounting\\Journal\\JournalLine', true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getJournalID()
    {
        return $this->_data['JournalID'];
    }

    /**
     * @param string $value
     *
     * @return Journal
     */
    public function setJournalID($value)
    {
        $this->propertyUpdated('JournalID', $value);
        $this->_data['JournalID'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getJournalDate()
    {
        return $this->_data['JournalDate'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Journal
     */
    public function setJournalDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('JournalDate', $value);
        $this->_data['JournalDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getJournalNumber()
    {
        return $this->_data['JournalNumber'];
    }

    /**
     * @param string $value
     *
     * @return Journal
     */
    public function setJournalNumber($value)
    {
        $this->propertyUpdated('JournalNumber', $value);
        $this->_data['JournalNumber'] = $value;

        return $this;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreatedDateUTC()
    {
        return $this->_data['CreatedDateUTC'];
    }

    /**
     * @param \DateTimeInterface $value
     *
     * @return Journal
     */
    public function setCreatedDateUTC(\DateTimeInterface $value)
    {
        $this->propertyUpdated('CreatedDateUTC', $value);
        $this->_data['CreatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->_data['Reference'];
    }

    /**
     * @param string $value
     *
     * @return Journal
     */
    public function setReference($value)
    {
        $this->propertyUpdated('Reference', $value);
        $this->_data['Reference'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceID()
    {
        return $this->_data['SourceID'];
    }

    /**
     * @param string $value
     *
     * @return Journal
     */
    public function setSourceID($value)
    {
        $this->propertyUpdated('SourceID', $value);
        $this->_data['SourceID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getSourceType()
    {
        return $this->_data['SourceType'];
    }

    /**
     * @param string $value
     *
     * @return Journal
     */
    public function setSourceType($value)
    {
        $this->propertyUpdated('SourceType', $value);
        $this->_data['SourceType'] = $value;

        return $this;
    }

    /**
     * @return JournalLine[]|Remote\Collection
     */
    public function getJournalLines()
    {
        return $this->_data['JournalLines'];
    }

    /**
     * @param JournalLine $value
     *
     * @return Journal
     */
    public function addJournalLine(JournalLine $value)
    {
        $this->propertyUpdated('JournalLines', $value);
        if (! isset($this->_data['JournalLines'])) {
            $this->_data['JournalLines'] = new Remote\Collection();
        }
        $this->_data['JournalLines'][] = $value;

        return $this;
    }
}
