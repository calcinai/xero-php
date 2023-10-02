<?php

namespace XeroPHP\Enums\PayrollAU\EarningsRates;

class RateType
{
    const FIXEDAMOUNT = 'FIXEDAMOUNT';

    // Multiple of Employee’s Ordinary Earnings Rate: an earnings rate which is derived from an employee’s ordinary earnings rate
    const MULTIPLE = 'MULTIPLE';

    // An earnings rate allowing entry of a rate per unit
    const RATEPERUNIT = 'RATEPERUNIT';

}