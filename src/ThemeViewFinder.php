<?php

namespace Ree\Theme;

use InvalidArgumentException;
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
            try {
                $dirs               = [$this->themeConfig->getThemeViewDir()];
                return $this->views[$name] = $this->findInPaths($name, $dirs);
            } catch (InvalidArgumentException $_) {
                return $this->views[$name] = $this->findInPaths($name, $this->paths);
            }
        }

        return $this->views[$name] = $this->findInPaths($name, $this->paths);
    }
}
