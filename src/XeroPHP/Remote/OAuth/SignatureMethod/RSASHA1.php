<?php

namespace XeroPHP\Remote\OAuth\SignatureMethod;

use XeroPHP\Remote\OAuth\Exception;

class RSASHA1 implements SignatureMethodInterface
{
    public static function generateSignature(array $config, $sbs, $secret)
    {
        // Fetch the private key
        if (false === $private_key_id = openssl_pkey_get_private($config['rsa_private_key'])) {
            throw new Exception("Cannot access private key for signing: openssl_pkey_get_private('${config['rsa_private_key']}') returned false");
        }

        // Sign using the key
        if (false === openssl_sign($sbs, $signature, $private_key_id)) {
            throw new Exception('Cannot sign signature base string.');
        }

        // Release the key resource
        openssl_free_key($private_key_id);

        return base64_encode($signature);
    }
}
