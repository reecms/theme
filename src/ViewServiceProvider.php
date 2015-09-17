<?php

namespace Ree\Theme;

use Illuminate\View\ViewServiceProvider as BaseServiceProvider;
use Ree\Theme\ThemeConfiguration;
use Ree\Theme\ThemeViewFinder;
use Ree\Theme\Console\ThemeCreateCommand;

/**
 * Description of ViewServiceProvider
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 * 
 */
class ViewServiceProvider extends BaseServiceProvider
{

    public function register()
    {
        parent::register();

        $this->registerCommands();
    }

    public function registerViewFinder()
    {
        $this->app->singleton(Contracts\ThemeConfiguration::class, function($app) {

            $themeViewPath   = $app['config']['view.theme.dir_path'];
            $themePublicPath = $app['config']['view.theme.public_path'];

            return new ThemeConfiguration($themeViewPath, $themePublicPath);
        });

        $this->app->bind('view.finder', function ($app) {

            $paths = $app['config']['view.paths'];

            $themeConfig = $app->make(Contracts\ThemeConfiguration::class);

            return new ThemeViewFinder($themeConfig, $app['files'], $paths);
        });
    }

    public function registerCommands()
    {

        $this->app->singleton('command.theme.create', function($app) {
            return new ThemeCreateCommand($app['files'], $app['view.finder']);
        });

        $this->commands(['command.theme.create']);
    }
}
