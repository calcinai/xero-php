<?php

namespace XeroPHP\Enums\Accounting\ReportTaxTypes;

class Australia
{
    const OUTPUT = 'OUTPUT';

    const INPUT = 'INPUT';

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT';

    const INPUTTAXED = 'INPUTTAXED';

    const BASEXCLUDED = 'BASEXCLUDED';

    const EXEMPTEXPENSES = 'EXEMPTEXPENSES';

    // The following are used for system tax rates and only returned on GET requests
    const EXEMPTCAPITAL = 'EXEMPTCAPITAL';

    const EXEMPTEXPORT = 'EXEMPTEXPORT';

    const CAPITALEXINPUT = 'CAPITALEXINPUT';

    const GSTONCAPIMPORTS = 'GSTONCAPIMPORTS';

    const GSTONIMPORTS = 'GSTONIMPORTS';

}