<?php

namespace Ree\Theme\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Ree\Theme\ThemeViewFinder;

/**
 * Description of ThemeCreateCommand
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class ThemeCreateCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'theme:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme directory structure';

    /**
     * File system instance
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * Theme view finder instance
     *
     * @var ThemeViewFinder
     */
    protected $finder;

    public function __construct(Filesystem $files, ThemeViewFinder $finder)
    {
        parent::__construct();

        $this->files  = $files;
        $this->finder = $finder;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $theme = snake_case($this->argument('name'));
        $this->output->writeln("Theme dir name: <info>($theme)</info>");

        if ($this->finder->doesThemeExist($theme)) {
            $this->error('Theme folder exists.');
            return false;
        }

        $themeViewDir = $this->finder->getThemeConfig()->getThemeViewDir($theme);
        $this->files->makeDirectory($themeViewDir, 0755, true);
        $this->output->writeln("Creating theme views directory : <info>{$themeViewDir}</info>");

        $themeAssetDir = $this->finder->getThemeConfig()->getThemeAssetDir($theme);
        $this->files->makeDirectory($themeAssetDir, 0755, true);
        $this->output->writeln("Creating theme assets directory: <info>{$themeAssetDir}</info>");

        $this->info('DONE.');

        return true;
    }
}
