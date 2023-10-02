<?php

namespace XeroPHP\Enums\PayrollAU\TaxDeclaration;

class ResidencyStatus
{
    // Employee is an Australian resident for tax purposes.
    // AustralianResidentForTaxPurposes must be true.
    const AUSTRALIANRESIDENT = 'AUSTRALIANRESIDENT';

    // Employee is a foreign resident for tax purposes.
    // AustralianResidentForTaxPurposes must be false.
    // TaxScaleType must be one of HORTICULTURISTORSHEARER or FOREIGN.
    const FOREIGNRESIDENT = 'FOREIGNRESIDENT';

    // WORKINGHOLIDAYMAKER is deprecated and will be invalid for an STP Phase 2 enabled organisation.
    // Applications currently sending this value should instead send an income type of WORKINGHOLIDAYMAKER.
    const WORKINGHOLIDAYMAKER = 'WORKINGHOLIDAYMAKER';

}