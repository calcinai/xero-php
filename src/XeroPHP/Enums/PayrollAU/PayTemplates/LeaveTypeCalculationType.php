<?php

namespace XeroPHP\Enums\PayrollAU\PayTemplates;

class LeaveTypeCalculationType
{
    const NOCALCULATIONREQUIRED = 'NOCALCULATIONREQUIRED'; // No leave will be accrued. Manual leave accruals can be done on the payslip if required.

    const FIXEDAMOUNTEACHPERIOD = 'FIXEDAMOUNTEACHPERIOD'; // Accrue a fixed amount of leave each pay period based on annual entitlement.

    const ENTERRATEINPAYTEMPLATE = 'ENTERRATEINPAYTEMPLATE'; // Enter manual calculated rates for accrual.

    const BASEDONORDINARYEARNINGS = 'BASEDONORDINARYEARNINGS'; // Accrue a relative amount of leave on the number of hours an employee works in the pay period.

}