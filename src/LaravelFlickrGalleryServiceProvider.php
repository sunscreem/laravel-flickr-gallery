<?php

namespace Sunscreem\LaravelFlickrGallery;

use Sunscreem\LaravelFlickrGallery\Commands\PullFromFlickr;
use Illuminate\Support\ServiceProvider;

class LaravelFlickrGalleryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                PullFromFlickr::class,
            ]);
        }
    }

    /**a
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
