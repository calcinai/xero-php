<?php

namespace XeroPHP\Enums\Accounting\Addresses;

class AddressType
{

    // The default mailing address for invoices
    const POBOX = 'POBOX';

    const STREET = 'STREET';

    //	Read-only via the GET endpoint (if set). The delivery address of the Xero organisation. DELIVERY address type is not valid for Contacts.
    const DELIVERY = 'DELIVERY';

}