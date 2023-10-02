<?php

namespace XeroPHP\Enums\Accounting\BankTransactions;

class BankTransactionType
{
    const RECEIVE = 'RECEIVE';

    const RECEIVE_OVERPAYMENT = 'RECEIVE-OVERPAYMENT';

    const RECEIVE_PREPAYMENT = 'RECEIVE-PREPAYMENT';

    const SPEND = 'SPEND';

    const SPEND_OVERPAYMENT = 'SPEND-OVERPAYMENT';

    const SPEND_PREPAYMENT = 'SPEND-PREPAYMENT';


    // The following values are only supported via the GET method at the moment

    const RECEIVE_TRANSFER = 'RECEIVE-TRANSFER';

    const SPEND_TRANSFER = 'SPEND-TRANSFER';
}