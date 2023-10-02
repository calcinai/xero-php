<?php

namespace XeroPHP\Enums\Accounting\Invoices;

class LineAmountType
{
    const Exclusive = 'Exclusive'; // Line items are exclusive of tax

    const Inclusive = 'Inclusive'; // Line items are inclusive tax

    const NoTax = 'NoTax'; // Line have no tax

}