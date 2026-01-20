<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ensure helper file is loaded
        if (file_exists($helperPath = app_path('Helpers/LocaleHelper.php'))) {
            require_once $helperPath;
        }
    }
}
