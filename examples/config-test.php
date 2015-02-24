<?php

/**
 * Actual tests should be written at some point.
 *
 * This file is a rudimentary config testing script.
 */

use XeroPHP\Application\PartnerApplication;

require '../vendor/autoload.php';

$config = array(
    'oauth' => array(
        'callback'    => 'http://localhost/',

        'consumer_key'      => 'k',
        'consumer_secret'   => 's',

    ),

    'curl' => array(
        CURLOPT_CAINFO          => 'certs/ca-bundle.crt',

        CURLOPT_SSLCERT         => 'certs/entrust-cert-RQ3.pem',
        CURLOPT_SSLKEYPASSWD    => '1234',
        CURLOPT_SSLKEY          => 'certs/entrust-private-RQ3.pem'
    )
);

$xero = new PartnerApplication($config);


