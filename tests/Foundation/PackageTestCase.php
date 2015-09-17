<?php

namespace ReeTest\Theme\Foundation;

use Orchestra\Testbench\TestCase;

/**
 * Description of PackageTestCase
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class PackageTestCase extends TestCase
{

    protected function getApplicationProviders($app)
    {
        $providers = parent::getApplicationProviders($app);

        $viewProviderPosition = array_search(\Illuminate\View\ViewServiceProvider::class, $providers);

        array_splice($providers, $viewProviderPosition, 1, \Ree\Theme\ViewServiceProvider::class);

        return $providers;
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('view.theme.dir_path', dirname(dirname(__FILE__)));
        $app['config']->set('view.theme.public_path', dirname(dirname(__FILE__)));
    }
}
