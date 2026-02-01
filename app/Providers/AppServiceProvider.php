<?php

namespace App\Providers;

use App\Models\JobApplicant;
use App\Models\Setting;
use Carbon\Carbon;
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

        // New job application notifications for admin layout
        View::composer('layouts.admin', function ($view) {
            $newSince = Carbon::now()->subDays(7);
            $newApplicationCount = JobApplicant::where('created_at', '>=', $newSince)->count();
            $recentApplicationNotifications = JobApplicant::latest('created_at')->take(8)->get();
            $view->with([
                'newApplicationCount' => $newApplicationCount,
                'recentApplicationNotifications' => $recentApplicationNotifications,
            ]);
        });
    }
}
