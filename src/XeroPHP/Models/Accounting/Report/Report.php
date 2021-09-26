<?php

namespace XeroPHP\Models\Accounting\Report;

use XeroPHP\Remote;

abstract class Report extends Remote\Model
{
    /**
     * Xero identifier.
     *
     * @property string ReportID
     */

    /**
     * Report Name.
     *
     * @property string ReportName
     */

    /**
     * Report Type.
     *
     * @property string ReportType
     */

    /**
     * Array of the title of this report (one title will be on multiple lines).
     *
     * @property array ReportTitles
     */

    /**
     * Last modified date in UTC format.
     *
     * @property \DateTimeInterface UpdatedDateUTC
     */

    /**
     * All the rows of data contained in the report.
     *
     * @property string Rows
     */

    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Report';
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
            'ReportID' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReportName' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReportType' => [true, self::PROPERTY_TYPE_STRING, null, false, false],
            'ReportTitles' => [true, self::PROPERTY_TYPE_STRING, null, true, false],
            'ReportDate' => [true, self::PROPERTY_TYPE_DATE, null, false, false],
            'UpdatedDateUTC' => [true, self::PROPERTY_TYPE_TIMESTAMP, '\\DateTimeInterface', false, false],
            'Rows' => [true, self::PROPERTY_TYPE_STRING, null, true, false],
        ];
    }

    public static function isPageable()
    {
        return false;
    }

    /**
     * @return string
     */
    public function getReportID()
    {
        return $this->_data['ReportID'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setReportID($value)
    {
        $this->propertyUpdated('ReportID', $value);
        $this->_data['ReportID'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReportName()
    {
        return $this->_data['ReportName'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setReportName($value)
    {
        $this->propertyUpdated('ReportName', $value);
        $this->_data['ReportName'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReportType()
    {
        return $this->_data['ReportType'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setReportType($value)
    {
        $this->propertyUpdated('ReportType', $value);
        $this->_data['ReportType'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReportTitles()
    {
        return $this->_data['ReportTitles'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setReportTitles($value)
    {
        $this->propertyUpdated('ReportTitles', $value);
        $this->_data['ReportTitles'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getReportDate()
    {
        return $this->_data['ReportDate'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setReportDate($value)
    {
        $this->propertyUpdated('ReportDate', $value);
        $this->_data['ReportDate'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedDateUTC()
    {
        return $this->_data['UpdatedDateUTC'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setUpdatedDateUTC($value)
    {
        $this->propertyUpdated('UpdatedDateUTC', $value);
        $this->_data['UpdatedDateUTC'] = $value;

        return $this;
    }

    /**
     * @return string
     */
    public function getRows()
    {
        return $this->_data['Rows'];
    }

    /**
     * @param string $value
     *
     * @return Report
     */
    public function setRows($value)
    {
        $this->propertyUpdated('Rows', $value);
        $this->_data['Rows'] = $value;

        return $this;
    }
}
