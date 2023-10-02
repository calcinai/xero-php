<?php

namespace XeroPHP\Enums\Accounting\Receipts;

class ReceiptStatusCode
{
    const DRAFT = 'DRAFT'; // A draft receipt ( default)

    const SUBMITTED = 'SUBMITTED'; // Receipt has been submitted as part of an expense claim

    const AUTHORISED = 'AUTHORISED'; // Receipt has been authorised in the Xero app

    const DECLINED = 'DECLINED'; // Receipt has been declined in the Xero app

}