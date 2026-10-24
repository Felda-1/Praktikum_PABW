<?php

namespace App\Providers;

use App\Support\SampleData;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Daftar usaha dibutuhkan layout user (dropdown + badge menu) dan form blog,
        // jadi disediakan di satu tempat lewat view composer.
        View::composer(['layouts.user', 'user.*'], function ($view) {
            $view->with('usahaList', SampleData::businesses());
        });
    }
}
