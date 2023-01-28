<?php

namespace XeroPHP\Enums\PayrollAU\Employees;

/**
 * This is a new field which will be supported as of STP Phase 2 enablement for an organisation.
 * If the TFN exemption is NOTQUOTED, this field may not be set.
 * Additionally, if ApprovedWithholdingVariationPercentage is set, this field may not be set.
 * Otherwise, this field must be set in order for an employee to be payable under STP Phase 2.
 */
class TaxScaleType
{
    const REGULAR = 'REGULAR';

    const ACTORSARTISTSENTERTAINERS = 'ACTORSARTISTSENTERTAINERS';

    const HORTICULTURISTORSHEARER = 'HORTICULTURISTORSHEARER';

    const SENIORORPENSIONER = 'SENIORORPENSIONER';

    const WORKINGHOLIDAYMAKER = 'WORKINGHOLIDAYMAKER';

    const FOREIGN = 'FOREIGN'; // Only valid when ResidencyStatus is FOREIGNRESIDENT.

}