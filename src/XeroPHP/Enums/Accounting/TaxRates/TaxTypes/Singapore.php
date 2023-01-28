<?php

namespace XeroPHP\Enums\Accounting\TaxRates\TaxTypes;

class Singapore
{
    const BLINPUT = 'BLINPUT'; // 0.00 - Disallowed Expenses

    const DSOUTPUT = 'DSOUTPUT'; // 7.00 - Deemed Supplies

    const EPINPUT = 'EPINPUT'; // 0.00 - Exempt Purchases

    const ES33OUTPUT = 'ES33OUTPUT'; // 0.00 - Regulation 33 Exempt Supplies

    const ESN33OUTPUT = 'ESN33OUTPUT'; // 0.00 - Non-Regulation 33 Exempt Supplies

    const IGDSINPUT2 = 'IGDSINPUT2'; // 0.00 - Imports under the Import GST Deferment Scheme

    const IMINPUT2 = 'IMINPUT2'; // 0.00 - Imports

    const INPUT = 'INPUT'; // 7.00 - Standard-Rated Purchases

    const MEINPUT = 'MEINPUT'; // 0.00 - Imports under a Special Scheme

    const NONE = 'NONE'; // 0.00 - No Tax

    const NRINPUT = 'NRINPUT'; // 0.00 - Purchases from Non-GST Registered Suppliers

    const OPINPUT = 'OPINPUT'; // 0.00 - Out Of Scope Purchases

    const OSOUTPUT = 'OSOUTPUT'; // 0.00 - Out Of Scope Supplies

    const OUTPUT = 'OUTPUT'; // 7.00 - Standard-Rated Supplies

    const TXESSINPUT = 'TXESSINPUT'; // 7.00 - Partially Exempt Traders Regulation 33 Exempt

    const TXN33INPUT = 'TXN33INPUT'; // 7.00 - Partially Exempt Traders Non-Regulation 33 Exempt

    const TXPETINPUT = 'TXPETINPUT'; // 7.00 - Partially Exempt Traders Standard-Rated Purchases

    const TXREINPUT = 'TXREINPUT'; // 7.00 - Partially Exempt Traders Residual Input tax

    const ZERORATEDINPUT = 'ZERORATEDINPUT'; // 0.00 - Zero-Rated Purchases

    const ZERORATEDOUTPUT = 'ZERORATEDOUTPUT'; // 0.00 - Zero-Rated Supplies

}