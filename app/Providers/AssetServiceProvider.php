<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        view()->share('styles', [
            asset('css/website/bootstrap.css'),
            asset('css/website/font-awesome.min.css'),
            asset('css/website/style.css'),
            asset('css/website/responsive.css'),
            asset('css/website/carousel-owal.css'),
        ]);
        view()->share('script', [
            asset('js/website/jquery-3.4.1.min.js'),
            asset('js/website/bootstrap.js'),
            asset('js/website/carousel-owal.js'),
            asset('js/website/custom.js'),
        ]);
      
    }
}
