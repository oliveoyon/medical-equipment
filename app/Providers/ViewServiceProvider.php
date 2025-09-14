<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Models\Category;
use App\Models\GeneralSetting;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Frontend views
        View::composer('web.*', function ($view) {
            $headerCategories = Cache::remember('header_categories', now()->addHours(6), function () {
                return Category::with('subcategories')->get();
            });

            $generalSetting = Cache::remember('general_setting', now()->addHours(6), function () {
                return GeneralSetting::first();
            });

            $view->with([
                'headerCategories' => $headerCategories,
                'generalSetting'   => $generalSetting,
            ]);
        });

        // Admin views
        View::composer('admin.*', function ($view) {
            $generalSetting = Cache::remember('general_setting', now()->addHours(6), function () {
                return GeneralSetting::first();
            });

            $view->with('generalSetting', $generalSetting);
        });
    }
}
