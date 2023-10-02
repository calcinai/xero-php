<?php

namespace XeroPHP\Enums\Accounting\PurchaseOrders;

class QuoteStatusCode
{
    const DRAFT = 'DRAFT'; // A draft quote ( default)

    const DELETED = 'DELETED'; // A deleted quote

    const SENT = 'SENT'; // A quote that is marked as sent

    const DECLINED = 'DECLINED'; // A quote that was declined by the customer

    const ACCEPTED = 'ACCEPTED'; // A quote that was accepted by the customer

    const INVOICED = 'INVOICED'; // A quote that has been invoiced

}