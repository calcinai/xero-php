<?php

use XeroPHP\Application\PrivateApplication;

//These are the minimum settings - for more options, refer to examples/config.php
$config = array(
    'oauth' => array(
        'callback'         => 'http://localhost/',
        'consumer_key'     => 'k',
        'consumer_secret'  => 's',
        'rsa_private_key'  => 'file://certs/private.pem',
    ),
    'curl' => array(
        CURLOPT_CAINFO => __DIR__.'/certs/ca-bundle.crt',
    ),
);

$xero = new PrivateApplication($config);

print_r($xero->load('Accounting\\Organisation')->execute());
