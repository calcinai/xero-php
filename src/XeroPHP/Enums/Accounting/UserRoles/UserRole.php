<?php

namespace XeroPHP\Enums\Accounting\UserRoles;

class UserRole
{
    const READONLY = 'READONLY'; // Read only user

    const INVOICEONLY = 'INVOICEONLY'; // Invoice only user

    const STANDARD = 'STANDARD'; // Standard user

    const FINANCIALADVISER = 'FINANCIALADVISER'; // Financial adviser role

    const MANAGEDCLIENT = 'MANAGEDCLIENT'; // Managed client role (Partner Edition only)

    const CASHBOOKCLIENT = 'CASHBOOKCLIENT'; // Cashbook client role (Partner Edition only)

}