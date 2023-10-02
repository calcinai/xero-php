<?php

namespace XeroPHP\Enums\Accounting\Invoices;

class InvoiceStatusCode
{
    const DRAFT = 'DRAFT'; // A Draft Invoice ( default)

    const SUBMITTED = 'SUBMITTED'; // An Awaiting Approval Invoice

    const DELETED = 'DELETED'; // A Deleted Invoice

    const AUTHORISED = 'AUTHORISED'; // An Invoice that is Approved and Awaiting Payment OR partially paid

    const PAID = 'PAID'; // An Invoice that is completely Paid

    const VOIDED = 'VOIDED'; // A Voided Invoice

}