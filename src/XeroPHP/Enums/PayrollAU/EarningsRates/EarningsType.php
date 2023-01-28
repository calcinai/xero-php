<?php

namespace XeroPHP\Enums\PayrollAU\EarningsRates;

class EarningsType
{

    //
    const ORDINARYTIMEEARNINGS = 'ORDINARYTIMEEARNINGS';

    //
    const OVERTIMEEARNINGS = 'OVERTIMEEARNINGS';

    // 	EarningsRates with EarningsType ALLOWANCE also require an ALLOWANCETYPE value.
    const ALLOWANCE = 'ALLOWANCE';

    // 	Earnings Rate with LumpSumA Type is a systems generated earnings rate and can only be used in final pays. It is used for payments of ATO mandated Lump sum A.
    const LUMPSUMA = 'LUMPSUMA';

    // 	Earnings Rate with LumpSumB Type is a systems generated earnings rate and can only be used in final pays. It is used for payments of ATO mandated Lump sum B.
    const LUMPSUMB = 'LUMPSUMB';

    // 	Earnings Rate with LumpSumD Type is a systems generated earnings rate and can only be used in final pays. It is used for payments of ATO mandated Lump sum D.
    const LUMPSUMD = 'LUMPSUMD';

    // 	EarningsRate with LumpSumE Type is used for payments of ATO mandated Lump sum E.
    const LUMPSUME = 'LUMPSUME';

    // 	EarningsRates with EarningsType EMPLOYMENTTERMINATIONPAYMENT can only be used in final pays.
    const EMPLOYMENTTERMINATIONPAYMENT = 'EMPLOYMENTTERMINATIONPAYMENT';

    // 	EarningsRates with EarningsType BONUSESANDCOMMISSIONS always subject to tax and reportable as W1
    const BONUSESANDCOMMISSIONS = 'BONUSESANDCOMMISSIONS';

    // 	Earnings Rates with LUMPSUMW Type is used for payments made for return to work amounts given to employees. It is always subject to tax and reportable as W1.
    const LUMPSUMW = 'LUMPSUMW';

    // 	Earnings Rates with DIRECTORSFEES Type is used for payments to director of a company or a person performing duties of a director. It is always subject to tax and reportable as W1.
    const DIRECTORSFEES = 'DIRECTORSFEES';

    // 	Earnings Rates with PAIDPARENTALLEAVE Type is used for payments to eligible employees when they are on parental leave. It is always subject to tax and reportable as W1.
    const PAIDPARENTALLEAVE = 'PAIDPARENTALLEAVE';

    // 	Earnings Rates with WORKERSCOMPENSATION Type is used for wage replacement and medical benefits to employees injured in the course of employment. It is always subject to tax and reportable as W1.
    const WORKERSCOMPENSATION = 'WORKERSCOMPENSATION';

}