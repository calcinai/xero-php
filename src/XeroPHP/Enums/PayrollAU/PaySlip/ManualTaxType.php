<?php

namespace XeroPHP\Enums\PayrollAU\PaySlip;

class ManualTaxType
{
    const PAYGMANUAL = 'PAYGMANUAL'; // Manual adjustment for PAYG

    const ETPOMANUAL = 'ETPOMANUAL'; // Manual adjustment for PAYG on Employment Termination Payments Type O

    const ETPRMANUAL = 'ETPRMANUAL'; // Manual adjustment for PAYG on Employment Termination Payments Type R

    const SCHEDULE5MANUAL = 'SCHEDULE5MANUAL'; // Manual adjustment for PAYG on Schedule 5

    const SCHEDULE5STSLMANUAL = 'SCHEDULE5STSLMANUAL'; // Manual adjustment for STSL Component on Schedule 5

    const SCHEDULE4MANUAL = 'SCHEDULE4MANUAL'; // Manual adjustment for PAYG on Schedule 4

}