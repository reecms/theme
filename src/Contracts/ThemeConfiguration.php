<?php

namespace Ree\Theme\Contracts;

/**
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
interface ThemeConfiguration
{

    /**
     * Set the name of the current theme
     * 
     * @param string $name
     * 
     * @return ThemeConfiguration
     */
    public function setThemeName($name);

    /**
     * Get the name of the current theme
     * 
     * @return string
     */
    public function getThemeName();

    /**
     * Get the path to the directory contains theme view files
     * 
     * @return string
     */
    public function getThemeViewDir();

    /**
     * Get the path to the directory contains theme asset files
     * 
     * @return string
     */
    public function getThemeAssetDir();

    /**
     * Get the path to the directory contains theme compiled asset files
     * 
     * @return string
     */
    public function getThemePublicDir();
}
