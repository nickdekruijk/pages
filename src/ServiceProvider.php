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

/*
        if (config('pages.migration')) {
            $this->loadMigrationsFrom(__DIR__.'/migrations/');
        }
*/
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
