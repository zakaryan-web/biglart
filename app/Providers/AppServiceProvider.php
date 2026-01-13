<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Facades\Setting;
use App\Facades\Language;
use App\Models\Users;
use App\Observers\UsersObserver;

use Illuminate\Support\Facades;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Users::observe(UsersObserver::class);

        Facades\View::composer('*', function (View $view) {
            $view->with('Setting', Setting::class);
            $view->with('Language', Language::class);
        });
    }
}
