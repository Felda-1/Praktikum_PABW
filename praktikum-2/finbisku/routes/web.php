<?php

use App\Http\Controllers\AdminPageController;
use App\Http\Controllers\PublicPageController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserPageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman publik
|--------------------------------------------------------------------------
*/
Route::controller(PublicPageController::class)->group(function () {
    Route::get('/', 'landing')->name('home');
    Route::get('/articles', 'articles')->name('articles.index');
    Route::get('/articles/{id}', 'article')->whereNumber('id')->name('articles.show');
    Route::get('/public-blogs', 'blogs')->name('public-blogs.index');
    Route::get('/public-blogs/{id}', 'blog')->whereNumber('id')->name('public-blogs.show');
});

// Autentikasi
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

/*
|--------------------------------------------------------------------------
| Halaman user
|--------------------------------------------------------------------------
*/
Route::controller(UserPageController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/dashboard/articles', 'articles')->name('user.articles.index');
    Route::get('/dashboard/articles/{id}', 'article')->whereNumber('id')->name('user.articles.show');
    Route::get('/business', 'businesses')->name('business.index');
    Route::get('/business/{id}', 'business')->whereNumber('id')->name('business.show');
    Route::get('/blogs', 'blogs')->name('blogs.index');
    Route::get('/blogs/{id}', 'blog')->whereNumber('id')->name('blogs.show');
    Route::get('/bookmarks', 'bookmarks')->name('bookmarks');
});

// Form usaha (halaman contoh)
Route::view('/business/add', 'user.business.create')->name('business.create');
Route::view('/business/{id}/edit', 'user.business.edit')->whereNumber('id')->name('business.edit');

// Keuangan / transaksi (aplikasi tanpa database: data disimpan sementara di session)
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/add', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::delete('/transactions', [TransactionController::class, 'reset'])->name('transactions.reset');
Route::delete('/transactions/{index}', [TransactionController::class, 'destroy'])->whereNumber('index')->name('transactions.destroy');
Route::view('/transactions/{id}', 'user.transactions.show')->whereNumber('id')->name('transactions.show');
Route::view('/transactions/{id}/edit', 'user.transactions.edit')->whereNumber('id')->name('transactions.edit');

// Form blog usaha (halaman contoh)
Route::view('/blogs/add', 'user.blogs.create')->name('blogs.create');
Route::view('/blogs/{id}/edit', 'user.blogs.edit')->whereNumber('id')->name('blogs.edit');

// Profil
Route::view('/profile', 'user.profile')->name('profile');
Route::view('/profile/password', 'user.password')->name('profile.password');

/*
|--------------------------------------------------------------------------
| Halaman admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->controller(AdminPageController::class)->group(function () {
    Route::get('/', 'dashboard')->name('dashboard');
    Route::get('/users', 'users')->name('users.index');
    Route::get('/users/{id}', 'user')->whereNumber('id')->name('users.show');
    Route::get('/articles', 'articles')->name('articles.index');
    Route::get('/articles/{id}', 'article')->whereNumber('id')->name('articles.show');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/profile', 'admin.profile')->name('profile');
    Route::view('/articles/add', 'admin.articles.create')->name('articles.create');
    Route::view('/articles/{id}/edit', 'admin.articles.edit')->whereNumber('id')->name('articles.edit');
});
