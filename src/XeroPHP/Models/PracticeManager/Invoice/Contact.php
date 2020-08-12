<?php

namespace XeroPHP\Models\PracticeManager\Invoice;

use XeroPHP\Models\PracticeManager\Model\IdAndNameModel;

class Contact extends IdAndNameModel
{
    /**
     * Get the root node name.  Just the unqualified classname.
     *
     * @return string
     */
    public static function getRootNodeName()
    {
        return 'Contact';
    }
}