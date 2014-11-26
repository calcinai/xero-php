<?php

namespace XeroPHP\Remote\OAuth\SignatureMethod;

use XeroPHP\Remote\Request;

interface SignatureMethodInterface {
    public static function generateSignature(array $config, $sbs, $secret);
}