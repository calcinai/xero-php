<?php

namespace XeroPHP\Enums\Accounting\Accounts;

class SystemAccount
{
    const DEBTORS = 'DEBTORS'; // Accounts Receivable
    const CREDITORS = 'CREDITORS'; // Accounts Payable
    const BANKCURRENCYGAIN = 'BANKCURRENCYGAIN'; // Bank Revaluations
    const CISASSETS = 'CISASSETS'; // CIS Assets (UK Only)
    const CISLABOUREXPENSE = 'CISLABOUREXPENSE'; // CIS Labour Expense (UK Only)
    const CISLABOURINCOME = 'CISLABOURINCOME'; // CIS Labour Income (UK Only)
    const CISLIABILITY = 'CISLIABILITY'; // CIS Liability (UK Only)
    const CISMATERIALS = 'CISMATERIALS'; // CIS Materials (UK Only)
    const GST = 'GST'; // GST / VAT
    const GSTONIMPORTS = 'GSTONIMPORTS'; // GST On Imports
    const HISTORICAL = 'HISTORICAL'; // Historical Adjustment
    const REALISEDCURRENCYGAIN = 'REALISEDCURRENCYGAIN'; // Realised Currency Gains
    const RETAINEDEARNINGS = 'RETAINEDEARNINGS'; // Retained Earnings
    const ROUNDING = 'ROUNDING'; // Rounding
    const TRACKINGTRANSFERS = 'TRACKINGTRANSFERS'; // Tracking Transfers
    const UNPAIDEXPCLM = 'UNPAIDEXPCLM'; // Unpaid Expense Claims
    const UNREALISEDCURRENCYGAIN = 'UNREALISEDCURRENCYGAIN'; // Unrealised Currency Gains
    const WAGEPAYABLES = 'WAGEPAYABLES'; // Wages Payable
}