<?php

return Symfony\CS\Config::create()
    ->finder(
        Symfony\CS\Finder::create()
            ->in(__DIR__)
            ->exclude('src/XeroPHP/Models')
    )
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->setUsingCache(true)
;
