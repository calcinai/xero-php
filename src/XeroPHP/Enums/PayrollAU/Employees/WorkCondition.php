<?php

namespace XeroPHP\Enums\PayrollAU\Employees;

/**
 * This is a new field which will be supported as of STP Phase 2 enablement for an organisation.
 * This field is required to be set only for employees with a tax scale type of ACTORSARTISTSENTERTAINERS.
 */
class WorkCondition
{
    const PROMOTIONAL = 'PROMOTIONAL'; // TaxFreeThresholdClaimed must be false.

    const THREELESSPERFORMANCESPERWEEK = 'THREELESSPERFORMANCESPERWEEK'; // TaxFreeThresholdClaimed must be false.

    const NONE = 'NONE';

}