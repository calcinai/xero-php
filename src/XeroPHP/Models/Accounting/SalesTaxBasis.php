<?php

namespace XeroPHP\Models\Accounting;

class SalesTaxBasis
{
    const NEW_ZEALAND_PAYMENTS = 'PAYMENTS';
    const NEW_ZEALAND_INVOICE  = 'INVOICE';
    const NEW_ZEALAND_NONE     = 'NONE';

    const UNITED_KINGODOM_CASH            = 'CASH';
    const UNITED_KINGODOM_ACCRUAL         = 'ACCRUAL';
    const UNITED_KINGODOM_FLATRATECASH    = 'FLATRATECASH';
    const UNITED_KINGODOM_FLATRATEACCRUAL = 'FLATRATEACCRUAL';
    const UNITED_KINGODOM_NONE            = 'NONE';

    const AUSTRALIA_US_GLOBAL_CASH     = 'CASH';
    const AUSTRALIA_US_GLOBAL_ACCRUALS = 'ACCRUALS';
    const AUSTRALIA_US_GLOBAL_NONE     = 'NONE';
}
