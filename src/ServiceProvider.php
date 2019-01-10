<?php

namespace NickDeKruijk\Pages;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'pages');

        $this->publishes([
            __DIR__.'/config.php' => config_path('pages.php'),
        ], 'config');
        if (config('pages.migration')) {
            $this->loadMigrationsFrom(__DIR__.'/migrations/');
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config.php', 'pages');
    }
}
