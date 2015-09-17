<?php

namespace Ree\Theme;

use Illuminate\View\FileViewFinder;
use Illuminate\Filesystem\Filesystem;
use Ree\Theme\Contracts\ThemeConfiguration as ThemeConfigContract;

/**
 * Description of ThemeViewFinder
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class ThemeViewFinder extends FileViewFinder
{

    /**
     *
     * @var ThemeConfigContract
     */
    protected $themeConfig;

    public function __construct(ThemeConfigContract $themeConfig, Filesystem $files, array $paths, array $extensions = null)
    {
        parent::__construct($files, $paths, $extensions);
        $this->themeConfig = $themeConfig;
    }

    /**
     * 
     * @return ThemeConfigContract
     */
    function getThemeConfig()
    {
        return $this->themeConfig;
    }

    /**
     * 
     * @param string $name
     * @return string
     */
    public function find($name)
    {
        if (isset($this->views[$name])) {
            // @codeCoverageIgnoreStart
            return $this->views[$name];
            // @codeCoverageIgnoreEnd
        }

        $name = trim($name);

        if ($this->hasHintInformation($name)) {
            return $this->views[$name] = $this->findNamedPathView($name);
        }

        if ($this->themeConfig->getThemeName()) {
            $dirs               = [
                $this->themeConfig->getThemeViewDir(),
                $this->themeConfig->getThemeViewDir($this->themeConfig->getDefaultTheme()),
            ];
            return $this->views[$name] = $this->findInPaths($name, $dirs);
        }

        return $this->views[$name] = $this->findInPaths($name, $this->paths);
    }

    /**
     * Check the theme folder existence
     * 
     * @param string $theme
     * 
     * @return bool
     */
    public function doesThemeExist($theme)
    {
        return $this->files->exists($this->themeConfig->getThemeDir($theme));
    }
}
