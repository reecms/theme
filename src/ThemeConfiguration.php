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
    protected $baseViewDir;

    /**
     * The path to the directory containing asset files of ALL themes
     *
     * @var string 
     */
    protected $baseAssetDir;

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
     *   * the path to base directory of view files
     *   * the path to base directory of source asset files
     *   * the path to base directory of compiled asset files
     * 
     * @param type $baseViewDir
     * @param type $baseAssetDir
     * @param type $basePublicDir
     */
    function __construct($baseViewDir, $baseAssetDir, $basePublicDir)
    {
        $this->baseViewDir   = rtrim($baseViewDir, "/") . "/";
        $this->baseAssetDir  = rtrim($baseAssetDir, "/") . "/";
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
     * Get the path to the directory contains theme asset files
     * 
     * @return string
     */
    public function getThemeAssetDir()
    {
        return $this->baseAssetDir . $this->theme;
    }

    /**
     * Get the path to the directory contains theme compiled asset files
     * 
     * @return string
     */
    public function getThemePublicDir()
    {
        return $this->basePublicDir . $this->theme;
    }

    /**
     * Get the path to the directory contains theme view files
     * 
     * @return string
     */
    public function getThemeViewDir()
    {
        return $this->baseViewDir . $this->theme;
    }
    
    public function getDefaultThemeViewDir()
    {
        return $this->baseViewDir . 'default';
    }
}
