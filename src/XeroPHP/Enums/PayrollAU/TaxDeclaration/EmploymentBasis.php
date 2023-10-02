<?php

namespace XeroPHP\Enums\PayrollAU\TaxDeclaration;

class EmploymentBasis
{
    const FULLTIME = 'FULLTIME';

    const PARTTIME = 'PARTTIME';

    const CASUAL = 'CASUAL';

    const LABOURHIRE = 'LABOURHIRE';

    const SUPERINCOMESTREAM = 'SUPERINCOMESTREAM'; // SUPERINCOMESTREAM is deprecated and will be invalid for an STP Phase 2 enabled organisation.

    const NONEMPLOYEE = 'NONEMPLOYEE'; // NONEMPLOYEE will only be supported for an STP Phase 2 enabled organisation.

}