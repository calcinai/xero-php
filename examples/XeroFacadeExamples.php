<?php

/**
  * Get config data to instance Xero.
  *
  * Example of Configuration
  *
  * 'xero_sz' => [
  *      'xero' => [
  *          // API versions can be overridden if necessary for some reason.
  *          //'core_version'     => '2.0',
  *          //'payroll_version'  => '1.0',
  *          //'file_version'     => '1.0'
  *      ],
  *      'oauth' => [
  *          'callback'          => env('XERO_CALLBACK', 'http://yourdomain.com'),
  *          'consumer_key'      => env('XERO_CONSUMER_KEY', 'GGYDC41N2KMQ9FKKYIQWRIYREJV6YP'),
  *          'consumer_secret'   => env('XERO_CONSUMER_SECRET', '06XS2D4PBZU5A1ASCWP8WV72ILU7GD'),
  *          //If you have issues passing the Authorization header, you can set it to append to the query string
  *          //'signature_location'    => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY
  *          //For certs on disk or a string - allows anything that is valid with openssl_pkey_get_(private|public)
  *          'rsa_private_key'  => env('XERO_CERT_PATH', 'file:///var/www/some_path/cert/privatekey.pem')
  *      ],
  *      //These are raw curl options.  I didn't see the need to obfuscate these through methods
  *      'curl' => [
  *          CURLOPT_USERAGENT   => 'Xero Sync System',
  *      ]
  *  ],
  * 
**/
$config = config('services.xero'); // will be an array with the config file

/**
  * Instance Xero
**/
$xero_instance = new XeroFacade($config);

/**
  * Get all Contacts
**/
$page = 1; // 
$contacts_page = $xero_instance->getAllContacts($page); // 100 rows per page
# Or
$contacts_page = $xero_instance->getAllContacts(); // max 100 latest contacts 

/**
  * Create User
  *
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
  * Update User
  *
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
  * Create a new invoice for xero.
  *
  * the facade will check if user exist in xero. 
  * If not will create it for you. Check the method.
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


  
  
/**
  * Get Payments.
  *
  * Will return all the payments on your account. 
  * Usefull to update status in your system by looping it and checking the status on invoice ID fo Eg..
**/
$xero_instance->getPayments()
