<?php

namespace XeroPHP\Tests\Remote\Model;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use XeroPHP\Application;
use XeroPHP\Models\Accounting\Account;
use XeroPHP\Remote\Model;
use XeroPHP\Tests\Remote\Model\ModelWithCollection;

class AccountTest extends TestCase
{
    public function testMagicAccessorMethods()
    {
        $account = new Account();

        $account->setCode('TESTCODE');
        $this->assertEquals('TESTCODE', $account->getCode());
    }
}
