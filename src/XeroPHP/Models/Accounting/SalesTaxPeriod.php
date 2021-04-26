<?php

namespace XeroPHP\Models\Accounting;

class SalesTaxPeriod
{
    const AUSTRALIAN_MONTHLY = 'MONTHLY';

    const AUSTRALIAN_QUARTERLY1 = 'QUARTERLY1';

    const AUSTRALIAN_QUARTERLY2 = 'QUARTERLY2';

    const AUSTRALIAN_QUARTERLY3 = 'QUARTERLY3';

    const AUSTRALIAN_ANNUALLY = 'ANNUALLY';

    const NEW_ZEALAND_ONEMONTHS = 'ONEMONTHS';

    const NEW_ZEALAND_TWOMONTHS = 'TWOMONTHS';

    const NEW_ZEALAND_SIXMONTHS = 'SIXMONTHS';

    const US_GLOBAL_1MONTHLY = '1MONTHLY';

    const US_GLOBAL_2MONTHLY = '2MONTHLY';

    const US_GLOBAL_3MONTHLY = '3MONTHLY';

    const US_GLOBAL_6MONTHLY = '6MONTHLY';

    const US_GLOBAL_ANNUALLY = 'ANNUALLY';

    const UNITED_KINGDOM_MONTHLY = 'MONTHLY';

    const UNITED_KINGDOM_QUARTERLY = 'QUARTERLY';

    const UNITED_KINGDOM_YEARLY = 'YEARLY';

    /**
     * These have incorrect spelling and will be remove in a future release.
     * Please see "AUSTRALIAN" constants at the top of this file.
     *
     * @deprecated
     */
    const AUSTRALIUM_MONTHLY = self::AUSTRALIAN_MONTHLY;

    const AUSTRALIUM_QUARTERLY1 = self::AUSTRALIAN_QUARTERLY1;

    const AUSTRALIUM_QUARTERLY2 = self::AUSTRALIAN_QUARTERLY2;

    const AUSTRALIUM_QUARTERLY3 = self::AUSTRALIAN_QUARTERLY3;

    const AUSTRALIUM_ANNUALLY = self::AUSTRALIAN_ANNUALLY;
}
