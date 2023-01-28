<?php

namespace XeroPHP\Enums\PayrollAU\TaxDeclaration;

class TFNExemptionType
{
    const NOTQUOTED = 'NOTQUOTED'; // Employee has not provided a TFN. TaxScaleType must not be set.

    const PENDING = 'PENDING'; // Employee has made a separate application or Enquiry to the ATO for a new or existing TFN.

    const PENSIONER = 'PENSIONER'; // Employee is claiming that they are in receipt of a pension, benefit or allowance.

    const UNDER18 = 'UNDER18'; // Employee is claiming an exemption as they are under the age of 18 and do not earn enough to pay tax.

}