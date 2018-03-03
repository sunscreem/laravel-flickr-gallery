<?php

namespace Sunscreem\LaravelFlickrGallery;

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
        dd('hi - Im working fine locally but try me on the vm and I fail');
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
