<?php

namespace Bastinald\LaravelLivewireUi\Providers;

use Bastinald\LaravelLivewireUi\Commands\LogClearCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeAuthCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeCrudCommand;
use Bastinald\LaravelLivewireUi\Commands\MakeUiCommand;
use Illuminate\Support\ServiceProvider;

class LaravelLivewireUiProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([

                MakeUiCommand::class,
            ]);
        }

        $this->publishes(
            [__DIR__ . '/../../config/moman12_ui.php' => config_path('moman12_ui.php')],
            ['moman12_ui', 'moman12-ui:config']
        );


    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/moman12_ui.php', 'moman12_ui');
    }
}
