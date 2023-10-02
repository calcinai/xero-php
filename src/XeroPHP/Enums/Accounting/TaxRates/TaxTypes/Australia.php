<?php

namespace XeroPHP\Enums\Accounting\TaxRates\TaxTypes;

class Australia
{
    const OUTPUT = 'OUTPUT'; // 10.00 - GST on Income

    const INPUT = 'INPUT'; // 10.00 - GST on Expenses

    const EXEMPTEXPENSES = 'EXEMPTEXPENSES'; // 0.00 - GST Free Expenses

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT'; // 0.00 - GST Free Income

    const BASEXCLUDED = 'BASEXCLUDED'; // 0.00 - BAS Excluded

    const GSTONIMPORTS = 'GSTONIMPORTS'; // 0.00 - GST on Imports

}