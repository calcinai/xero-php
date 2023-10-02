<?php

namespace XeroPHP\Enums\Accounting\ExpenseClaims;

class ExpenseClaimStatusCode
{
    const SUBMITTED = 'SUBMITTED'; // An expense claim has been submitted for approval ( default)

    const AUTHORISED = 'AUTHORISED'; // An expense claim has been authorised for payment

    const PAID = 'PAID'; // An expense claim has been paid

}