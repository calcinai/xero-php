<?php

namespace XeroPHP\tests\Application;

use XeroPHP\Application\PrivateApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function testPrependsConfigNamespaceWhenValidatingModelClass()
    {
        $app = $this->instance();
        $class = 'Accounting\\Invoice';

        $this->assertSame(
            $app->validateModelClass($class),
            $app->getConfig('xero')['model_namespace'].'\\'.$class
        );
    }

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

    public function testOauthClientInstantiatedWithAppInstantiation()
    {
        $app = $this->instance();

        $this->assertNotNull($app->getOAuthClient());
    }

    public function testSettingMissingConfigOptionThrowsException()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->setConfigOption('non_exitant_key', 'sub_key', 'value');
    }

    public function testSetConfigOptionUpdatesConfiguration()
    {
        $key = 'oauth';
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

        $this->instance()->getConfigOption('oauth', 'non_existent_key');
    }

    public function testAccessingMissingConfigThrowsException()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->getConfig('non_existent_key');
    }

    protected function instance($config = [])
    {
        return new PrivateApplication(
            array_merge_recursive([
                'oauth' => ['consumer_key' => 'CONSUMER_KEY'],
            ], $config)
        );
    }
}
