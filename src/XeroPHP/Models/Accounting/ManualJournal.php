<?php

namespace XeroPHP\Models\Accounting;

use XeroPHP\Remote;
use XeroPHP\Traits\AttachmentTrait;
use XeroPHP\Models\Accounting\ManualJournal\JournalLine;

class ManualJournal extends Remote\Model
{
    use AttachmentTrait;

    /**
     * Xero identifier.
     *
     * @property string ManualJournalID
     */

    /**
     * Description of journal being posted.
     *
     * @property string Narration
     */

    /**
     * See JournalLines.
     *
     * @property JournalLine[] JournalLines
     */

    /**
     * Date journal was posted – YYYY-MM-DD.
     *
     * @property \DateTimeInterface Date
     */

    /**
     * NoTax by default if you don’t specify this element. See Line Amount Types.
     *
     * @property string LineAmountTypes
     */

    /**
     * See Manual Journal Status Codes.
     *
     * @property string Status
     */

    /**
     * Url link to a source document – shown as “Go to [appName]” in the Xero app.
     *
     * @property string Url
     */

    /**
     * Boolean – default is true if not specified.
     *
     * @property bool ShowOnCashBasisReports
     */

    /**
     * Boolean to indicate if a manual journal has an attachment.
     *
     * @property bool HasAttachments
     */

    /**
     * Last modified date UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */
    const MANUAL_JOURNAL_STATUS_DRAFT = 'DRAFT';

    const MANUAL_JOURNAL_STATUS_POSTED = 'POSTED';

    const MANUAL_JOURNAL_STATUS_DELETED = 'DELETED';

    const MANUAL_JOURNAL_STATUS_VOIDED = 'VOIDED';

    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'ManualJournals';
    }

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'ManualJournal';
    }

    /**
     * Get the guid property.
     *
     * @return string
     */
    public static function getGUIDProperty()
    {
        return 'ManualJournalID';
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
            Remote\Request::METHOD_PUT,
            Remote\Request::METHOD_POST,
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
            'ManualJournalID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'Narration' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'JournalLines' => [true, self::PROPERTY_TYPE_OBJECT, 'Accounting\\ManualJournal\\JournalLine', true, false],
            'Date' => [false, self::PROPERTY_TYPE_DATE, '\\DateTimeInterface', false, false],
            'LineAmountTypes' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Status' => [false, self::PROPERTY_TYPE_ENUM, null, false, false],
            'Url' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'ShowOnCashBasisReports' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'HasAttachments' => [false, self::PROPERTY_TYPE_BOOLEAN, null, false, false],
            'UpdatedDateUTC' => [false, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
        ];
    }

    public static function isPageable()
    {
        return true;
    }

    /**
     * @return string
     */
    public function getManualJournalID()
    {
        return $this->_data['ManualJournalID'];
    }

    /**
     * @param string $value
     *
     * @return ManualJournal
     */
    public function setManualJournalID($value)
    {
        $this->propertyUpdated('ManualJournalID', $value);
        $this->_data['ManualJournalID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getNarration()
    {
        return $this->_data['Narration'];
    }

    /**
     * @param string $value
     *
     * @return ManualJournal
     */
    public function setNarration($value)
    {
        $this->propertyUpdated('Narration', $value);
        $this->_data['Narration'] = $value;

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
     * @return ManualJournal
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
     * @return ManualJournal
     */
    public function setDate(\DateTimeInterface $value)
    {
        $this->propertyUpdated('Date', $value);
        $this->_data['Date'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getLineAmountTypes()
    {
        return $this->_data['LineAmountTypes'];
    }

    /**
     * @param string $value
     *
     * @return ManualJournal
     */
    public function setLineAmountType($value)
    {
        $this->propertyUpdated('LineAmountTypes', $value);
        $this->_data['LineAmountTypes'] = $value;

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
     * @return ManualJournal
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
    public function getUrl()
    {
        return $this->_data['Url'];
    }

    /**
     * @param string $value
     *
     * @return ManualJournal
     */
    public function setUrl($value)
    {
        $this->propertyUpdated('Url', $value);
        $this->_data['Url'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getShowOnCashBasisReports()
    {
        return $this->_data['ShowOnCashBasisReports'];
    }

    /**
     * @param bool $value
     *
     * @return ManualJournal
     */
    public function setShowOnCashBasisReport($value)
    {
        $this->propertyUpdated('ShowOnCashBasisReports', $value);
        $this->_data['ShowOnCashBasisReports'] = $value;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHasAttachments()
    {
        return $this->_data['HasAttachments'];
    }

    /**
     * @return \DateTimeInterface
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }
}
