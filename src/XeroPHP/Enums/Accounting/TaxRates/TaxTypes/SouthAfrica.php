<?php

namespace XeroPHP\Enums\Accounting\TaxRates\TaxTypes;

class SouthAfrica
{
    const ACC28PLUS = 'ACC28PLUS'; // 15.00 - Accommodation exceeding 28 days

    const ACCUPTO28 = 'ACCUPTO28'; // 15.00 - Accommodation under 28 days

    const BADDEBT = 'BADDEBT'; // 15.00 - Bad Debt

    const CAPEXINPUT = 'CAPEXINPUT'; // 14.00 - Old Standard Rate Purchases - Capital Goods

    const CAPEXINPUT2 = 'CAPEXINPUT2'; // 15.00 - Standard Rate Purchases - Capital Goods

    const EXEMPTINPUT = 'EXEMPTINPUT'; // 0.00 - Exempt Purchases

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT'; // 0.00 - Exempt and Non-Supplies

    const GSTONCAPIMPORTS = 'GSTONCAPIMPORTS'; // 0.00 - Capital Goods Imported

    const IMINPUT = 'IMINPUT'; // 0.00 - Goods and Services Imported

    const INPUT = 'INPUT'; // 14.00 - Old Standard Rate Purchases

    const INPUT2 = 'INPUT2'; // 14.00 - Old Change in Use

    const INPUT3 = 'INPUT3'; // 15.00 - Standard Rate Purchases

    const INPUT4 = 'INPUT4'; // 15.00 - Change in Use

    const NONE = 'NONE'; // 0.00 - No VAT

    const OUTPUT = 'OUTPUT'; // 14.00 - Old Standard Rate Sales

    const OTHERINPUT = 'OTHERINPUT'; // 0.00 - Other Purchase

    const OTHEROUTPUT = 'OTHEROUTPUT'; // 0.00 - Other Sales

    const OUTPUT2 = 'OUTPUT2'; // 14.00 - Old Change in use and Export of Second-hand Goods

    const OUTPUT3 = 'OUTPUT3'; // 15.00 - Standard Rate Sales

    const OUTPUT4 = 'OUTPUT4'; // 15.00 - Change in use and Export of Second-hand Goods

    const SHOUTPUT = 'SHOUTPUT'; // 15.00 - Export of Second-hand Goods

    const SROUTPUT = 'SROUTPUT'; // 14.00 - Old Standard Rate Sales - Capital Goods

    const SROUTPUT2 = 'SROUTPUT2'; // 15.00 - Standard Rate Sales - Capital Goods

    const ZERORATED = 'ZERORATED'; // 0.00 - Zero rate (Excluding Goods Exported)

    const ZERORATEDOUTPUT = 'ZERORATEDOUTPUT'; // 0.00 - Zero Rate (only Exported Goods)

    const ZRINPUT = 'ZRINPUT'; // 0.00 - Zero Rated Purchases

}