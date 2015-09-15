<?php

namespace Ree\Theme;

use Illuminate\Contracts\Config\Repository;
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
        $this->baseViewDir   = $baseViewDir;
        $this->baseAssetDir  = $baseAssetDir;
        $this->basePublicDir = $basePublicDir;
    }

    public function getThemeAssetDir()
    {
        
    }

    public function getThemeName()
    {
        
    }

    public function getThemePublicDir()
    {
        
    }

    public function getThemeViewDir()
    {
        
    }

    public function setThemeName($name)
    {
        
    }
}
