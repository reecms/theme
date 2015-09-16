<?php

namespace Ree\Theme;

use Illuminate\View\ViewServiceProvider as BaseServiceProvider;
use Ree\Theme\ThemeConfiguration;
use Ree\Theme\ThemeViewFinder;

/**
 * Description of ViewServiceProvider
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 * 
 * @codeCoverageIgnore
 */
class ViewServiceProvider extends BaseServiceProvider
{

    public function registerViewFinder()
    {
        $this->app->singleton(Contracts\ThemeConfiguration::class, function($app) {

            $themeViewPath   = $app['config']['view.theme.view_path'];
            $themeAssetPath  = $app['config']['view.theme.asset_path'];
            $themePublicPath = $app['config']['view.theme.public_path'];

            return new ThemeConfiguration($themeViewPath, $themeAssetPath, $themePublicPath);
        });

        $this->app->bind('view.finder', function ($app) {

            $paths       = $app['config']['view.paths'];
            
            $themeConfig = $app->make(Contracts\ThemeConfiguration::class);

            return new ThemeViewFinder($themeConfig, $app['files'], $paths);
        });
    }
}
