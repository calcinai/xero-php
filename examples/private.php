<?php

use XeroPHP\Application\PrivateApplication;

//These are the minimum settings - for more options, refer to examples/config.php
$config = array(
    'oauth' => array(
        'callback'         => 'http://localhost/',
        'consumer_key'     => 'k',
        'consumer_secret'  => 's',
        'rsa_private_key'  => 'file://certs/private.pem',
        'rsa_public_key'   => 'file://certs/public.pem'
    )
);


$xero = new PrivateApplication($config);


print_r($xero->load('Accounting\\Organisation')->execute());

