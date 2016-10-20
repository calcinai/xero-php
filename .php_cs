<?php
//php-cs-fixer config file.
//See: https://github.com/FriendsOfPHP/PHP-CS-Fixer
//Run like this from the project root:
//php-cs-fixer fix --config-file=.php_cs

return Symfony\CS\Config::create()
    ->finder(
        Symfony\CS\Finder::create()
            ->in(__DIR__)
            ->exclude('src/XeroPHP/Models')
    )
    ->level(Symfony\CS\FixerInterface::PSR2_LEVEL)
    ->setUsingCache(true)
;
