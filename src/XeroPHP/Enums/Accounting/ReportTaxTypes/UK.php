<?php

namespace XeroPHP\Enums\Accounting\ReportTaxTypes;

class UK
{

    // The following can be used for creating and updating tax rates
    const OUTPUT = 'OUTPUT';

    const INPUT = 'INPUT';

    const EXEMPTOUTPUT = 'EXEMPTOUTPUT';

    const EXEMPTINPUT = 'EXEMPTINPUT';

    const ECOUTPUT = 'ECOUTPUT';

    const ECOUTPUTSERVICES = 'ECOUTPUTSERVICES';

    const ECINPUT = 'ECINPUT';

    const ECACQUISITIONS = 'ECACQUISITIONS';

    const CAPITALSALESOUTPUT = 'CAPITALSALESOUTPUT';

    const CAPITALEXPENSESINPUT = 'CAPITALEXPENSESINPUT';

    const MOSSSALES = 'MOSSSALES';

    // The following are not yet available for create and update via the API. They are returned on GET requests
    const REVERSECHARGES = 'REVERSECHARGES';

    //The following are used for system tax rates and only returned on GET requests
    const NONE = 'NONE';

    const GSTONIMPORTS = 'GSTONIMPORTS';

}