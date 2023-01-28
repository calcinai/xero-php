<?php

namespace XeroPHP\Enums\Accounting\ManualJournals;

class ManualJournalStatusCode
{
    const DRAFT = 'DRAFT'; // A Draft ManualJournal ( default)

    const POSTED = 'POSTED'; // A Posted ManualJournal

    const DELETED = 'DELETED'; // A Deleted Draft ManualJournal

    const VOIDED = 'VOIDED'; // A Voided Posted ManualJournal

}