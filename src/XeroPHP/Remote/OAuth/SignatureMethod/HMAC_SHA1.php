<?php

namespace XeroPHP\Remote\OAuth\SignatureMethod;

use XeroPHP\Remote\OAuth\Exception;

class HMAC_SHA1 implements SignatureMethodInterface {

    public static function generateSignature(array $config, $sbs, $secret){

        return base64_encode(hash_hmac('sha1', $sbs, $secret, true));
    }


}