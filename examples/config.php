<?php

$xero_base_config = array(

    'xero' => array(
        // API versions can be overridden if necessary for some reason.
        //'core_version'     => '2.0',
        //'payroll_version'  => '1.0',
        //'file_version'     => '1.0'
    ),

    'oauth' => array(
        'callback'    => 'oob',

        'consumer_key'      => 'k',
        'consumer_secret'   => 's',

        //If you have issues passing the Authorization header, you can set it to append to the query string
        //'signature_location'    => \XeroPHP\Remote\OAuth\Client::SIGN_LOCATION_QUERY


        //For certs on disk or a string - allows anything that is valid with openssl_pkey_get_(private|public)
        'rsa_private_key'  => 'file://certs/private.pem',
        'rsa_public_key'   => 'file://certs/public.pem'
    ),

    //These are raw curl options.  I didn't see the need to obfuscate these through methods
    'curl' => array(
        CURLOPT_USERAGENT   => 'XeroPHP Test App',

        //Only for partner apps - unfortunately need to be files on disk only.
        //CURLOPT_CAINFO          => 'certs/ca-bundle.crt',

        //CURLOPT_SSLCERT         => 'certs/entrust-cert-RQ3.pem',
        //CURLOPT_SSLKEYPASSWD    => '1234',
        //CURLOPT_SSLKEY          => 'certs/entrust-private-RQ3.pem'

    )
);
