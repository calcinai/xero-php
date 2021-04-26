<?php

namespace XeroPHP\Tests\Remote\Model;

use XeroPHP\Remote\Model;
use XeroPHP\Remote\URL;

class ModelWithCollection extends Model
{
    public static function getGUIDProperty()
    {
        return 'ModelID';
    }

    public static function getProperties()
    {
        return [
            'ModelID' => [false, self::PROPERTY_TYPE_STRING, null, false, false],
            'EarningsLines' => [false, self::PROPERTY_TYPE_OBJECT, 'PayrollAU\\Payslip\\EarningsLine', true, false],
        ];
    }

    public static function getSupportedMethods()
    {
        return ['test'];
    }

    public static function getResourceURI()
    {
        return 'Model';
    }

    public static function isPageable()
    {
        return false;
    }

    public static function getAPIStem()
    {
        return URL::API_PAYROLL;
    }

    public static function getRootNodeName()
    {
        return 'Model';
    }

    public function getEarningsLines()
    {
        return isset($this->_data['EarningsLines']) ? $this->_data['EarningsLines'] : null;
    }

    public function getModelID()
    {
        return isset($this->_data['ModelID']) ? $this->_data['ModelID'] : null;
    }
}
