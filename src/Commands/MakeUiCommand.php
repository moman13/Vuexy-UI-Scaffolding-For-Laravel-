<?php

namespace Bastinald\LaravelLivewireUi\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Artisan;

class MakeUiCommand extends Command
{
    protected $signature = 'make:moman {--a|--auth} {--force}';
    private $filesystem;

    public function handle()
    {
        $this->filesystem = new Filesystem;



        $this->makeStubs();
        //$this->executeCommands();.

        $this->info('UI made successfully.');
        $this->line(config('app.url'));
    }

    private function makeStubs()
    {
        $stubs = config('moman12_ui.stub_path') . '/ui';

        foreach ($this->filesystem->allFiles($stubs) as $stub) {
            $path = base_path($stub->getRelativePathname());

            $this->filesystem->ensureDirectoryExists(dirname($path));
            $this->filesystem->put($path, $this->filesystem->get($stub));

            $this->line('<info>File created:</info> ' . $stub->getRelativePathname());
        }
    }

    private function executeCommands()
    {
        if ($this->option('auth')) {
            Artisan::call('make:auth', [
                '--force' => $this->option('force'),
            ], $this->getOutput());
        }

        Artisan::call('make:amodel', [
            'class' => 'User',
            '--force' => true,
        ], $this->getOutput());

        Artisan::call('migrate:auto', [
            '--fresh' => true,
            '--seed' => true,
        ], $this->getOutput());

        exec('npm install');
        exec('npm run dev');
    }
}
