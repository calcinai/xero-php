<?php

namespace XeroPHP\Enums\Accounting\Journals;

class JournalSourceType
{
    const ACCREC = 'ACCREC'; // Accounts Receivable Invoice

    const ACCPAY = 'ACCPAY'; // Accounts Payable Invoice

    const ACCRECCREDIT = 'ACCRECCREDIT'; // Accounts Receivable Credit Note

    const ACCPAYCREDIT = 'ACCPAYCREDIT'; // Accounts Payable Credit Note

    const ACCRECPAYMENT = 'ACCRECPAYMENT'; // Payment on an Accounts Receivable Invoice

    const ACCPAYPAYMENT = 'ACCPAYPAYMENT'; // Payment on an Accounts Payable Invoice

    const ARCREDITPAYMENT = 'ARCREDITPAYMENT'; // Accounts Receivable Credit Note Payment

    const APCREDITPAYMENT = 'APCREDITPAYMENT'; // Accounts Payable Credit Note Payment

    const CASHREC = 'CASHREC'; // Receive Money Bank Transaction

    const CASHPAID = 'CASHPAID'; // Spend Money Bank Transaction

    const TRANSFER = 'TRANSFER'; // Bank Transfer

    const ARPREPAYMENT = 'ARPREPAYMENT'; // Accounts Receivable Prepayment

    const APPREPAYMENT = 'APPREPAYMENT'; // Accounts Payable Prepayment

    const AROVERPAYMENT = 'AROVERPAYMENT'; // Accounts Receivable Overpayment

    const APOVERPAYMENT = 'APOVERPAYMENT'; // Accounts Payable Overpayment

    const EXPCLAIM = 'EXPCLAIM'; // Expense Claim

    const EXPPAYMENT = 'EXPPAYMENT'; // Expense Claim Payment

    const MANJOURNAL = 'MANJOURNAL'; // Manual Journal

    const PAYSLIP = 'PAYSLIP'; // Payslip

    const WAGEPAYABLE = 'WAGEPAYABLE'; // Payroll Payable

    const INTEGRATEDPAYROLLPE = 'INTEGRATEDPAYROLLPE'; // Payroll Expense

    const INTEGRATEDPAYROLLPT = 'INTEGRATEDPAYROLLPT'; // Payroll Payment

    const EXTERNALSPENDMONEY = 'EXTERNALSPENDMONEY'; // Payroll Employee Payment

    const INTEGRATEDPAYROLLPTPAYMENT = 'INTEGRATEDPAYROLLPTPAYMENT'; // Payroll Tax Payment

    const INTEGRATEDPAYROLLCN = 'INTEGRATEDPAYROLLCN'; // Payroll Credit Note

}