<?php

namespace Ree\Theme\Console;

use Illuminate\Console\Command;

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
    protected $signature = 'theme:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new theme directory structure';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->comment(PHP_EOL . Inspiring::quote() . PHP_EOL);
    }
}
