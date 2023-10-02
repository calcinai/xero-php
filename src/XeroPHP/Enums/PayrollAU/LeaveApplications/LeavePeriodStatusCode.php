<?php

namespace XeroPHP\Enums\PayrollAU\LeaveApplications;

class LeavePeriodStatusCode
{
    const SCHEDULED = 'Scheduled'; // The default status

    const PROCESSED = 'Processed'; // A LeavePeriod is set to the 'Processed' status when the Payrun associated with the LeavePeriod is 'POSTED'
}