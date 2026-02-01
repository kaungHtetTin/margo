<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\Facades\View;
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

        // Share site settings with app layout, home, and courses page
        View::composer(['layouts.app', 'home', 'courses'], function ($view) {
            try {
                $settings = Setting::getByGroup('general') ?: [];
            } catch (\Throwable $e) {
                $settings = [];
            }
            $view->with('siteSettings', $settings);
        });
    }
}
