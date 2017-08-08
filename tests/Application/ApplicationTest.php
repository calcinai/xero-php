<?php

namespace XeroPHP\tests\Application;

use XeroPHP\Application\PrivateApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    public function test_prepends_config_namespace_when_validating_model_class()
    {
        $app = $this->instance();
        $class = 'Accounting\\Invoice';

        $this->assertEquals(
            $app->validateModelClass($class),
            $app->getConfig('xero')['model_namespace'].'\\'.$class
        );
    }

    public function test_allows_FQN_when_validating_model_class()
    {
        $class = \XeroPHP\Models\Accounting\Invoice::class;

        $this->assertEquals(
            $this->instance()->validateModelClass($class),
            $class
        );
    }

    public function test_allows_FQN_beginning_with_backslash_when_validating_model_class()
    {
        $class = '\XeroPHP\Models\Accounting\Invoice';

        $this->assertEquals(
            $this->instance()->validateModelClass($class),
            $class
        );
    }

    public function test_throws_exception_when_unable_to_validate_class()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->validateModelClass('Unknown\\Namespaced\\Class');
    }

    public function test_setting_missing_config_option_throws_exception()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->setConfigOption('non_exitant_key', 'sub_key', 'value');
    }

    public function test_set_config_option_updates_configuration()
    {
        $key = 'oauth';
        $subkey = 'test_sub_key';
        $expected = 'test_value';
        $app = $this->instance();
        $app->setConfigOption($key, $subkey, $expected);

        $this->assertEquals(
            $expected,
            $app->getConfigOption($key, $subkey, $expected)
        );
    }

    public function test_can_retrieve_config()
    {
        $key = 'test_key';
        $expected = ['sub_test_key' => 'test_value'];

        $this->assertEquals(
            $expected,
            $this->instance([$key => $expected])->getConfig($key)
        );
    }

    public function test_can_retrieve_config_option()
    {
        $key = 'test_key';
        $subKey = 'sub_test_key';
        $expected = 'test_value';

        $this->assertEquals(
            $expected,
            $this->instance([$key => [$subKey => $expected]])->getConfigOption($key, $subKey)
        );
    }

    public function test_accessing_missing_config_option_throws_exception()
    {
        $this->setExpectedException(\Exception::class);

        $this->instance()->getConfigOption('oauth', 'non_existent_key');
    }

    public function test_accessing_missing_config_throws_exception()
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
