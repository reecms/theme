<?php

namespace Ree\Theme;

use Ree\Theme\Contracts\ThemeConfiguration as ThemeConfigurationContract;

/**
 * Description of ThemeConfiguration
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class ThemeConfiguration implements ThemeConfigurationContract
{

    /**
     * The path to the directory containing view files of ALL themes
     *
     * @var string 
     */
    protected $baseThemeDir;

    /**
     * The path to the directory containing compiled asset files of ALL themes
     *
     * @var string 
     */
    protected $basePublicDir;

    /**
     * The name of the current theme
     *
     * @var string
     */
    protected $theme;

    /**
     * You have the supply three paths when initialize the theme configuration
     * object:
     * 
     *   * the path to base directory of view and asset files
     *   * the path to base directory of compiled asset files
     * 
     * @param type $baseThemeDir
     * @param type $basePublicDir
     */
    function __construct($baseThemeDir, $basePublicDir)
    {
        $this->baseThemeDir  = rtrim($baseThemeDir, "/") . "/";
        $this->basePublicDir = rtrim($basePublicDir, "/") . "/";
    }

    /**
     * Set the name of the current theme
     * 
     * @param string $name
     * @return \Ree\Theme\ThemeConfiguration
     */
    public function setThemeName($name)
    {
        $this->theme = $name;
        return $this;
    }

    /**
     * Get the name of the current theme
     * 
     * @return string
     */
    public function getThemeName()
    {
        return $this->theme;
    }

    /**
     * Get the path to the theme folder of a theme
     * 
     * @param string $theme default to current theme, pass a theme name 
     *                      as argument
     * @return string
     */
    public function getThemeDir($theme = null)
    {
        return $this->baseThemeDir . ($theme ? : $this->theme);
    }

    /**
     * Get the path to the directory contains theme asset files
     * 
     * @param string $theme default to current theme, pass a theme name as
     *                      argument
     * @return string
     */
    public function getThemeAssetDir($theme = null)
    {
        return $this->getThemeDir($theme ? : $this->theme) . "/assets";
    }

    /**
     * Get the path to the directory contains theme compiled asset files
     * 
     * @param string $theme default to current theme, pass a theme name as
     *                      argument
     * @return string
     */
    public function getThemePublicDir($theme = null)
    {
        return $this->basePublicDir . ($theme ? : $this->theme);
    }

    /**
     * Get the path to the directory contains theme view files
     *
     * @param string $theme default to current theme, pass a theme name as
     *                      argument 
     * @return string
     */
    public function getThemeViewDir($theme = null)
    {
        return $this->getThemeDir($theme ? : $this->theme) . "/views";
    }

    /**
     * Get the name of the default theme
     * 
     * @return string
     */
    public function getDefaultTheme()
    {
        return 'default';
    }
}
