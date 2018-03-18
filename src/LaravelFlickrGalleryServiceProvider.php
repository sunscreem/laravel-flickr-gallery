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

        $this->loadViewsFrom(__DIR__ . '/views', 'LaravelFlickrGallery');

        if ($this->app->runningInConsole()) {
            $this->commands([
                PullFromFlickr::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/config/flickr.php' => config_path('flickr.php'),
            __DIR__ . '/views/' => resource_path('views/vendor/laravel-flickr-gallery'),
        ]);
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
