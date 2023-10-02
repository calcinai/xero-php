<?php

namespace XeroPHP\Enums\Accounting\Payments;

class PaymentType
{
    const ACCRECPAYMENT = 'ACCRECPAYMENT'; // Accounts Receivable Payment

    const ACCPAYPAYMENT = 'ACCPAYPAYMENT'; // Accounts Payable Payment

    const ARCREDITPAYMENT = 'ARCREDITPAYMENT'; // Accounts Receivable Credit Payment (Refund)

    const APCREDITPAYMENT = 'APCREDITPAYMENT'; // Accounts Payable Credit Payment (Refund)

    const AROVERPAYMENTPAYMENT = 'AROVERPAYMENTPAYMENT'; // Accounts Receivable Overpayment Payment (Refund)

    const ARPREPAYMENTPAYMENT = 'ARPREPAYMENTPAYMENT'; // Accounts Receivable Prepayment Payment (Refund)

    const APPREPAYMENTPAYMENT = 'APPREPAYMENTPAYMENT'; // Accounts Payable Prepayment Payment (Refund)

    const APOVERPAYMENTPAYMENT = 'APOVERPAYMENTPAYMENT'; // Accounts Payable Overpayment Payment (Refund)

}