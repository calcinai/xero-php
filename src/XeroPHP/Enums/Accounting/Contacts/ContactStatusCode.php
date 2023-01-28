<?php

namespace XeroPHP\Enums\Accounting\Contacts;

class ContactStatusCode
{

    // The Contact is active and can be used in transactions
    const ACTIVE = 'ACTIVE';

    // The Contact is archived and can no longer be used in transactions
    const ARCHIVED = 'ARCHIVED';

    // The Contact is the subject of a GDPR erasure request and can no longer be used in transactions
    const GDPRREQUEST = 'GDPRREQUEST';
}