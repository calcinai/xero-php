<?php

namespace XeroPHP\Enums\Accounting\TaxRates\TaxTypes;

class UnitedStates
{
    const INPUT = 'INPUT'; // 0.00 - Tax on Purchases

    const NONE = 'NONE'; // 0.00 - Tax Exempt

    const OUTPUT = 'OUTPUT'; // 0.00 - Tax on Sales

    const GSTONIMPORTS = 'GSTONIMPORTS'; // 0.00 - Sales Tax on Imports
}