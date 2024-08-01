<?php

namespace Ariaservice\Virtualizor;

use Illuminate\Support\ServiceProvider;

class VirtualizorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/virtualizor.php', 'virtualizor');

        $this->app->singleton('virtualizor', function ($app) {
            return new Virtualizor();
        });
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/virtualizor.php' => config_path('virtualizor.php'),
            ], 'config');
        }
    }
}
