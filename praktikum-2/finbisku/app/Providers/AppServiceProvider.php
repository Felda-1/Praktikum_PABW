<?php

namespace App\Providers;

use App\Models\Business;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Daftar usaha dibutuhkan layout user (dropdown + badge menu) dan form blog,
        // jadi disediakan di satu tempat lewat view composer.
        View::composer(['layouts.user', 'user.*'], function ($view) {
            $view->with(
                'usahaList',
                Schema::hasTable('businesses') ? Business::orderBy('id')->get() : collect()
            );
        });
    }
}