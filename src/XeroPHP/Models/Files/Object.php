<?php

namespace XeroPHP\Models\Files;

class Object
{
    const OBJECT_GROUP_ACCOUNT         = 'Account';
    const OBJECT_GROUP_BANKTRANSACTION = 'BankTransaction';
    const OBJECT_GROUP_CONTACT         = 'Contact';
    const OBJECT_GROUP_CREDITNOTE      = 'CreditNote';
    const OBJECT_GROUP_FIXED_ASSETS    = 'Fixed Assets';
    const OBJECT_GROUP_INVOICE         = 'Invoice';
    const OBJECT_GROUP_ITEM            = 'Item';
    const OBJECT_GROUP_MANUALJOURNAL   = 'ManualJournal';
    const OBJECT_GROUP_OVERPAYMENT     = 'Overpayment';
    const OBJECT_GROUP_PAYMENT         = 'Payment';
    const OBJECT_GROUP_PAYRUN          = 'Payrun';
    const OBJECT_GROUP_PREPAYMENT      = 'Prepayment';
    const OBJECT_GROUP_PURCHASEORDER   = 'PurchaseOrder';
    const OBJECT_GROUP_RECEIPT         = 'Receipt';
    const OBJECT_GROUP_RECONCILIATION  = 'Reconciliation';

    const OBJECT_TYPE_ACCOUNT                    = 'ACCOUNT';
    const OBJECT_TYPE_ACCPAY                     = 'ACCPAY';
    const OBJECT_TYPE_ACCPAYCREDIT               = 'ACCPAYCREDIT';
    const OBJECT_TYPE_ACCPAYPAYMENT              = 'ACCPAYPAYMENT';
    const OBJECT_TYPE_ACCREC                     = 'ACCREC';
    const OBJECT_TYPE_ACCRECCREDIT               = 'ACCRECCREDIT';
    const OBJECT_TYPE_ACCRECPAYMENT              = 'ACCRECPAYMENT';
    const OBJECT_TYPE_ADJUSTMENT                 = 'ADJUSTMENT';
    const OBJECT_TYPE_APCREDITPAYMENT            = 'APCREDITPAYMENT';
    const OBJECT_TYPE_APOVERPAYMENT              = 'APOVERPAYMENT';
    const OBJECT_TYPE_APOVERPAYMENTPAYMENT       = 'APOVERPAYMENTPAYMENT';
    const OBJECT_TYPE_APOVERPAYMENTSOURCEPAYMENT = 'APOVERPAYMENTSOURCEPAYMENT';
    const OBJECT_TYPE_APPREPAYMENT               = 'APPREPAYMENT';
    const OBJECT_TYPE_APPREPAYMENTPAYMENT        = 'APPREPAYMENTPAYMENT';
    const OBJECT_TYPE_APPREPAYMENTSOURCEPAYMENT  = 'APPREPAYMENTSOURCEPAYMENT';
    const OBJECT_TYPE_ARCREDITPAYMENT            = 'ARCREDITPAYMENT';
    const OBJECT_TYPE_AROVERPAYMENT              = 'AROVERPAYMENT';
    const OBJECT_TYPE_AROVERPAYMENTPAYMENT       = 'AROVERPAYMENTPAYMENT';
    const OBJECT_TYPE_AROVERPAYMENTSOURCEPAYMENT = 'AROVERPAYMENTSOURCEPAYMENT';
    const OBJECT_TYPE_ARPREPAYMENT               = 'ARPREPAYMENT';
    const OBJECT_TYPE_ARPREPAYMENTPAYMENT        = 'ARPREPAYMENTPAYMENT';
    const OBJECT_TYPE_ARPREPAYMENTSOURCEPAYMENT  = 'ARPREPAYMENTSOURCEPAYMENT';
    const OBJECT_TYPE_CASHPAID                   = 'CASHPAID';
    const OBJECT_TYPE_CASHREC                    = 'CASHREC';
    const OBJECT_TYPE_CONTACT                    = 'CONTACT';
    const OBJECT_TYPE_EXPPAYMENT                 = 'EXPPAYMENT';
    const OBJECT_TYPE_FIXEDASSET                 = 'FIXEDASSET';
    const OBJECT_TYPE_MANUALJOURNAL              = 'MANUALJOURNAL';
    const OBJECT_TYPE_PAYRUN                     = 'PAYRUN';
    const OBJECT_TYPE_PRICELISTITEM              = 'PRICELISTITEM';
    const OBJECT_TYPE_PURCHASEORDER              = 'PURCHASEORDER';
    const OBJECT_TYPE_RECEIPT                    = 'RECEIPT';
    const OBJECT_TYPE_TRANSFER                   = 'TRANSFER';
}
