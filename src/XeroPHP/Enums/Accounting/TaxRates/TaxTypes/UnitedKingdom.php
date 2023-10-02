<?php

namespace XeroPHP\Enums\Accounting\TaxRates\TaxTypes;

class UnitedKingdom
{
    const CAPEXINPUT = 'CAPEXINPUT'; // 17.50 - 17.5% (VAT on Capital Purchases)

    const CAPEXINPUT2 = 'CAPEXINPUT2'; // 20.00 - 20% (VAT on Capital Purchases)

    const CAPEXOUTPUT = 'CAPEXOUTPUT'; // 17.50 - 17.5% (VAT on Capital Sales)

    const CAPEXOUTPUT2 = 'CAPEXOUTPUT2'; // 20.00 - 20% (VAT on Capital Sales)

    const CAPEXSRINPUT = 'CAPEXSRINPUT'; // 15.00 - 15% (VAT on Capital Purchases)

    const CAPEXSROUTPUT = 'CAPEXSROUTPUT'; // 15.00 - 15% (VAT on Capital Sales)

    const ECACQUISITIONS = 'ECACQUISITIONS'; // 20.00 - EC Acquisitions (20%)

    const ECZRINPUT = 'ECZRINPUT'; // 0.00 - Zero Rated EC Expenses

    const ECZROUTPUT = 'ECZROUTPUT'; // 0.00 - Zero Rated EC Goods Income

    const ECZROUTPUTSERVICES = 'ECZROUTPUTSERVICES'; // 0.00 - Zero Rated EC Services

    const EXEMPTINPUT = 'EXEMPTINPUT'; // 0.00 - Exempt Expenses

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT'; // 0.00 - Exempt Income

    const GSTONIMPORTS = 'GSTONIMPORTS'; // 0.00 - VAT on Imports

    const INPUT2 = 'INPUT2'; // 20.00 - 20% (VAT on Expenses)

    const NONE = 'NONE'; // 0.00 - No VAT

    const OUTPUT2 = 'OUTPUT2'; // 20.0 - 20% (VAT on Income)

    const REVERSECHARGES = 'REVERSECHARGES'; // 20.00 - Reverse Charge Expenses (20%)

    const RRINPUT = 'RRINPUT'; // 5.00 - 5% (VAT on Expenses)

    const RROUTPUT = 'RROUTPUT'; // 5.00 - 5% (VAT on Income)

    const SRINPUT = 'SRINPUT'; // 15.00 - 15% (VAT on Expenses)

    const SROUTPUT = 'SROUTPUT'; // 15.00 - 15% (VAT on Income)

    const ZERORATEDINPUT = 'ZERORATEDINPUT'; // 0.00 - Zero Rated Expenses

    const ZERORATEDOUTPUT = 'ZERORATEDOUTPUT'; // 0.00 - Zero Rated Income

}