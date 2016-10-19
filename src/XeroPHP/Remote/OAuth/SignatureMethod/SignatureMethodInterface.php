<?php

namespace XeroPHP\Remote\OAuth\SignatureMethod;

interface SignatureMethodInterface
{
    public static function generateSignature(array $config, $sbs, $secret);
}
