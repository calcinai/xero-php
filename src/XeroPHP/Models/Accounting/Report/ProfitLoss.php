<?php
namespace XeroPHP\Models\Accounting\Report;

use XeroPHP\Remote;

class ProfitLoss extends Report
{
    /**
     * Get the resource uri of the class (Contacts) etc
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Reports/ProfitAndLoss';
    }
}
