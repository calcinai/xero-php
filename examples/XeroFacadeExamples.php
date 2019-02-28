<?php

/**
  Get config data to instance Xero.
**/
$config = config('services.xero'); // ??

/**
  Instance Xero
**/
$xero_instance = new XeroFacade($config);

/**
  Get all Contacts
**/
$page = 1; // 
$contacts_page = $xero_instance->getAllContacts($page); // 100 rows per page
# Or
$contacts_page = $xero_instance->getAllContacts(); // max 100 latest contacts 

/**
  Create User
  * Data format
     *
     *   $data = [
     *       'ContactID' => '123213-123123-123123-123123  || null',
     *       'EmailAddress' => '12312',
     *       'Name' => '12312',
     *       'FirstName' => '12312',
     *       'LastName' => '12312',
     *       'Addresses' => [
     *           "City" => '12312',
     *           "Region" => '12312',
     *           "PostalCode" => '12312',
     *           "Country" => '12312',
     *           "AddressLine1" => '12312',
     *       ],
     *       'Phones' => 'xxxxx'
     *   ];
**/
$xero_instance->createContact($user_data);




/**
  Update User
  * Data format
     *
     *   $data = [
     *       'ContactID' => '123213-123123-123123-123123  || null',
     *       'EmailAddress' => '12312',
     *       'Name' => '12312',
     *       'FirstName' => '12312',
     *       'LastName' => '12312',
     *       'Addresses' => [
     *           "City" => '12312',
     *           "Region" => '12312',
     *           "PostalCode" => '12312',
     *           "Country" => '12312',
     *           "AddressLine1" => '12312',
     *       ],
     *       'Phones' => 'xxxxx'
     *   ];
**/
$xero_instance->updateContact($user_data);



/**
  Create a new invoice for xero.
  
  the facade will check if user exist in xero. 
  If not will create it for you. Check the method.
**/
#Generate invoice rows
$LineItems[] = [
    "Description" => "Your description",
    "Quantity" => "1.00",
    "UnitAmount" => intval(200), // amount
    "AccountCode" => "200", #??????
    "TaxType" => 'OUTPUT2' # Tax in New Zealand
];
$data = [
    "user" => Auth::user(),
    "Type" => "ACCREC", # invoices owed to you.
    "AmountType" => "Inclusive",
    "InvoiceNumber" => uniqid(), // invoice reference, you could add any here
    "Reference" => "more reference data",
    "DueDate" => date('Y-m-d'), # Or Eg. date('Y-m-d', strtotime("+3 days")),
    "Status" => "AUTHORISED",
    "LineItems"=> $LineItems,
];
# Parameters: (array) Data
$invoice = $xero_instance->createInvoice($data);
echo $invoice['InvoiceID'] // got the invoice id to track it later. 



