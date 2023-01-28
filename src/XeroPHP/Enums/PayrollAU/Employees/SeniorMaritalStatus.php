<?php

namespace XeroPHP\Enums\PayrollAU\Employees;

/**
 * This is a new field which will be supported as of STP Phase 2 enablement for an organisation.
 * This field is required to be set only for employees with a tax scale type of SENIORORPENSIONER.
 */
class SeniorMaritalStatus
{
    const MEMBEROFCOUPLE = 'MEMBEROFCOUPLE';

    const MEMBEROFILLNESSSEPARATEDCOUPLE = 'MEMBEROFILLNESSSEPARATEDCOUPLE';

    const SINGLE = 'SINGLE';

}