<?php

namespace XeroPHP\Enums\PayrollAU\PayTemplates;

class LeaveTypeContributionType
{
    const SGC = 'SGC'; // Mandatory 9% contribution

    const SALARYSACRIFICE = 'SALARYSACRIFICE'; // Pre-tax reportable employer superannuation contribution, which is displayed separately on payment summaries

    const EMPLOYERADDITIONAL = 'EMPLOYERADDITIONAL'; // Additional employer superannuation contribution, which is displayed as RESC on payment summaries

    const EMPLOYEE = 'EMPLOYEE'; // Post-tax employee superannuation contribution

}