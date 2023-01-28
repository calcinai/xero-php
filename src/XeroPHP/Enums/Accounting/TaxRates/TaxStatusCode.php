<?php

namespace XeroPHP\Enums\Accounting\TaxRates;

class TaxStatusCode
{
    // The tax rate is active and can be used in transactions
    const ACTIVE = 'ACTIVE';

    // The tax rate is deleted and cannot be restored or used on transactions
    const DELETED = 'DELETED';

    // The tax rate has been used on a transaction (e.g. an invoice) but has since been deleted. ARCHIVED tax rates cannot be restored or used on transactions.
    const ARCHIVED = 'ARCHIVED';
}