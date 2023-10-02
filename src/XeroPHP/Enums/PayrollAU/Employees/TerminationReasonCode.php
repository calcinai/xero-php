<?php

namespace XeroPHP\Enums\PayrollAU\Employees;

class TerminationReasonCode
{
    const VOLUNTARY_CESSATION = 'V'; // Voluntary cessation	An employee resignation, retirement, domestic or pressing necessity or abandonment of employment

    const ILL_HEALTH = 'I'; // Ill health	An employee resignation due to medical condition that prevents the continuation of employment, such as for illness, ill-health, medical unfitness or total permanent disability

    const DECEASED = 'D'; // Deceased - The death of an employee

    const REDUNDANCY = 'R'; // Redundancy - An employer-initiated termination of employment due to a genuine redundancy or approved early retirement scheme

    const DISMISSAL = 'F'; // Dismissal - An employer-initiated termination of employment due to dismissal, inability to perform the required work, misconduct or inefficiency

    const CONTRACT_CESSATION = 'C'; // Contract cessation - The natural conclusion of a limited employment relationship due to contract/engagement duration or task completion, seasonal work completion, or to cease casuals that are no longer required

    const TRANSFER = 'T'; // Transfer - The administrative arrangements performed to transfer employees across payroll systems, move them temporarily to another employer (machinery of government for public servants), transfer of business, move them to outsourcing arrangements or other such technical activities.

}