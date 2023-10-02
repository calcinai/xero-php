<?php

namespace XeroPHP\Enums\Accounting\ReportTaxTypes;

class NewZealand
{
    const OUTPUT = 'OUTPUT';

    const INPUT = 'INPUT';

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT';

    const EXEMPTINPUT = 'EXEMPTINPUT';

    // The following are used for system tax rates and only returned on GET requests
    const NONE = 'NONE';

    const GSTONIMPORTS = 'GSTONIMPORTS';

}