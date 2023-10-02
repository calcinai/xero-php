<?php

namespace XeroPHP\Enums\PayrollAU\PayTemplates;

class EarningsRateCalculationType
{
    const USEEARNINGSRATE = 'USEEARNINGSRATE'; // Use the rate per unit recorded for the earnings rate under Settings

    const ENTEREARNINGSRATE = 'ENTEREARNINGSRATE'; // The rate per unit is be added manually to the earnings line

    const ANNUALSALARY = 'ANNUALSALARY'; // If the employee receives a salary, the annual salary amount and units of work per week are added to the earnings line

}