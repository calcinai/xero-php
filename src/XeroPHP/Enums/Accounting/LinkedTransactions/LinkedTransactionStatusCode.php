<?php

namespace XeroPHP\Enums\Accounting\LinkedTransactions;

class LinkedTransactionStatusCode
{
    const DRAFT = 'DRAFT'; // The source transaction is in a draft status. The linked transaction has not been allocated to target transaction

    const APPROVED = 'APPROVED'; // The source transaction is in a authorised status. The linked transaction has not been allocated to target transaction

    const ONDRAFT = 'ONDRAFT'; // The linked transaction has been allocated to target transaction in draft status

    const BILLED = 'BILLED'; // The linked transaction has been allocated to a target transaction in authorised status

    const VOIDED = 'VOIDED'; // The source transaction has been voided

}