<?php

namespace Fungku\SweetFlasher\Providers;

use Fungku\SweetFlasher\SessionFlasher\SessionFlasher;
use Fungku\SweetFlasher\SessionFlasher\LaravelSessionFlasher;
use Illuminate\Support\ServiceProvider;

class SweetFlasherLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(SessionFlasher::class, LaravelSessionFlasher::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
