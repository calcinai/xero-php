<?php

namespace XeroPHP\Models\Accounting\Report;

class AgedPayablesByContact extends Report
{
    /**
     * Get the resource uri of the class (Contacts) etc.
     *
     * @return string
     */
    public static function getResourceURI()
    {
        return 'Reports/AgedPayablesByContact';
    }
}
