<?php

namespace XeroPHP\tests\Application;

use XeroPHP\Application;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testAllowsFQNWhenValidatingModelClass()
    {
        $class = \XeroPHP\Models\Accounting\Invoice::class;

        $this->assertSame(
            $this->instance()->validateModelClass($class),
            $class
        );
    }

    public function testAllowsFQNBeginningWithBackslashWhenValidatingModelClass()
    {
        $class = '\\XeroPHP\\Models\\Accounting\\Invoice';

        $this->assertSame(
            $this->instance()->validateModelClass($class),
            $class
        );
    }

    public function testThrowsExceptionWhenUnableToValidateClass()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->validateModelClass('Unknown\\Namespaced\\Class');

    }

    public function testSettingMissingConfigOptionThrowsException()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->setConfigOption('non_exitant_key', 'sub_key', 'value');
    }

    public function testSetConfigOptionUpdatesConfiguration()
    {
        $key = 'xero';
        $subkey = 'test_sub_key';
        $expected = 'test_value';
        $app = $this->instance();
        $app->setConfigOption($key, $subkey, $expected);

        $this->assertSame(
            $expected,
            $app->getConfigOption($key, $subkey, $expected)
        );
    }

    public function testCanRetrieveConfig()
    {
        $key = 'test_key';
        $expected = ['sub_test_key' => 'test_value'];

        $this->assertSame(
            $expected,
            $this->instance([$key => $expected])->getConfig($key)
        );
    }

    public function testCanRetrieveConfigOption()
    {
        $key = 'test_key';
        $subKey = 'sub_test_key';
        $expected = 'test_value';

        $this->assertSame(
            $expected,
            $this->instance([$key => [$subKey => $expected]])->getConfigOption($key, $subKey)
        );
    }

    public function testAccessingMissingConfigOptionThrowsException()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->getConfigOption('xero', 'non_existent_key');
    }

    public function testAccessingMissingConfigThrowsException()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->getConfig('non_existent_key');
    }

    protected function instance($config = [])
    {
        $application = new Application('token', 'tenantId');
        $application->setConfig($config);

        return $application;
    }
}
