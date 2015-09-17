<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ReeTest\Theme;

use PHPUnit_Framework_TestCase;
use Ree\Theme\ThemeConfiguration;

/**
 * Description of ThemeConfigurationTest
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class ThemeConfigurationTest extends PHPUnit_Framework_TestCase
{

    public function testReceiveCorrectViewName()
    {
        $config = new ThemeConfiguration('', '');
        $this->assertEquals(null, $config->getThemeName());
    }

    public function testThemeNameIsSet()
    {
        $config = new ThemeConfiguration('', '');
        $config->setThemeName('default');
        $this->assertEquals('default', $config->getThemeName());
    }

    public function testGetCorrectThemeViewDir()
    {
        $config = new ThemeConfiguration('/resources/views/themes/', '');
        $config->setThemeName('default');
        $this->assertEquals('/resources/views/themes/default/views', $config->getThemeViewDir());
        $this->assertEquals('/resources/views/themes/foo/views', $config->getThemeViewDir('foo'));
    }

    public function testGetCorrectThemeViewDirNoSlash()
    {
        $config = new ThemeConfiguration('/resources/views/themes', '');
        $config->setThemeName('default');
        $this->assertEquals('/resources/views/themes/default/views', $config->getThemeViewDir());
        $this->assertEquals('/resources/views/themes/foo/views', $config->getThemeViewDir('foo'));
    }

    public function testGetCorrectThemeAssetDir()
    {
        $config = new ThemeConfiguration('/resources/assets/themes/', '');
        $config->setThemeName('default');
        $this->assertEquals('/resources/assets/themes/default/assets', $config->getThemeAssetDir());
        $this->assertEquals('/resources/assets/themes/foo/assets', $config->getThemeAssetDir('foo'));
    }

    public function testGetCorrectThemeAssetDirNoSlash()
    {
        $config = new ThemeConfiguration('/resources/assets/themes', '');
        $config->setThemeName('default');
        $this->assertEquals('/resources/assets/themes/default/assets', $config->getThemeAssetDir());
    }

    public function testGetCorrectThemePublicDir()
    {
        $config = new ThemeConfiguration('', '/public/assets/themes/');
        $config->setThemeName('default');
        $this->assertEquals('/public/assets/themes/default', $config->getThemePublicDir());
        $this->assertEquals('/public/assets/themes/foo', $config->getThemePublicDir('foo'));
    }

    public function testGetCorrectThemePublicDirNoSlash()
    {
        $config = new ThemeConfiguration('', '/public/assets/themes');
        $config->setThemeName('default');
        $this->assertEquals('/public/assets/themes/default', $config->getThemePublicDir());
    }

    public function testGetThemeDir()
    {
        $config = new ThemeConfiguration('/resources/views/themes/', '');
        $config->setThemeName('default');
        $this->assertEquals('/resources/views/themes/default', $config->getThemeDir());
        $this->assertEquals('/resources/views/themes/foo', $config->getThemeDir('foo'));
    }

    public function testGetDefaultTheme()
    {
        $config = new ThemeConfiguration('/resources/views/themes/', '');
        $config->setThemeName('foo');
        $this->assertEquals('default', $config->getDefaultTheme());
    }
}
