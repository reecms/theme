<?php

namespace ReeTest\Theme\Console;

use Mockery as m;
use ReeTest\Theme\Foundation\PackageTestCase;
use Ree\Theme\Console\ThemeCreateCommand;

/**
 * Description of ThemeCreateCommandTest
 *
 * @author Hieu Le <hieu@codeforcevina.com>
 */
class ThemeCreateCommandTest extends PackageTestCase
{

    protected $baseDir;

    public function setUp()
    {
        parent::setUp();

        $this->baseDir = dirname(dirname(__FILE__));
    }

    public function testCommandIsRegistered()
    {
        $allCommands = $this->app
            ->make(\Illuminate\Contracts\Console\Kernel::class)
            ->all();

        foreach ($allCommands as $command) {
            if ($command instanceof ThemeCreateCommand) {
                return;
            }
        }

        $this->fail('The command "theme:create" is not registered.');
    }

    public function testCreateThemeDirsSuccess()
    {
        $files = m::mock(\Illuminate\Filesystem\Filesystem::class);

        $files->shouldReceive('exists')
            ->with($this->baseDir . "/foo")
            ->andReturn(false);

        $files->shouldReceive('makeDirectory')
            ->once()
            ->with($this->baseDir . "/foo/views", 0755, true)
            ->andReturn(true);

        $files->shouldReceive('makeDirectory')
            ->once()
            ->with($this->baseDir . "/foo/assets", 0755, true)
            ->andReturn(true);

        $this->app->instance('files', $files);

        $this->artisan('theme:create', ['name' => 'foo']);
    }

    public function testCreateThemeDirsWithExistedTheme()
    {
        $files = m::mock(\Illuminate\Filesystem\Filesystem::class);

        $files->shouldReceive('exists')
            ->with($this->baseDir . "/foo")
            ->andReturn(true);

        $files->shouldReceive('makeDirectory')
            ->never();

        $this->app->instance('files', $files);

        $this->artisan('theme:create', ['name' => 'foo']);
    }
}
