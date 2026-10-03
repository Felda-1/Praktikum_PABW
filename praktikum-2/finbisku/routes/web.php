<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Halaman publik
|--------------------------------------------------------------------------
*/
Route::view('/', 'public.landing')->name('home');
Route::view('/articles', 'public.articles.index')->name('articles.index');
Route::view('/articles/{id}', 'public.articles.show')->whereNumber('id')->name('articles.show');
Route::view('/public-blogs', 'public.blogs.index')->name('public-blogs.index');
Route::view('/public-blogs/{id}', 'public.blogs.show')->whereNumber('id')->name('public-blogs.show');

// Autentikasi
Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');
Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');

/*
|--------------------------------------------------------------------------
| Halaman user
|--------------------------------------------------------------------------
*/
Route::view('/dashboard', 'user.dashboard')->name('dashboard');
Route::view('/dashboard/articles', 'user.articles.index')->name('user.articles.index');
Route::view('/dashboard/articles/{id}', 'user.articles.show')->whereNumber('id')->name('user.articles.show');

// Usaha
Route::view('/business', 'user.business.index')->name('business.index');
Route::view('/business/add', 'user.business.create')->name('business.create');
Route::view('/business/{id}', 'user.business.show')->whereNumber('id')->name('business.show');
Route::view('/business/{id}/edit', 'user.business.edit')->whereNumber('id')->name('business.edit');

// Keuangan / transaksi (aplikasi tanpa database: data disimpan sementara di session)
Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
Route::get('/transactions/add', [TransactionController::class, 'create'])->name('transactions.create');
Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
Route::delete('/transactions', [TransactionController::class, 'reset'])->name('transactions.reset');
Route::delete('/transactions/{index}', [TransactionController::class, 'destroy'])->whereNumber('index')->name('transactions.destroy');
Route::view('/transactions/{id}', 'user.transactions.show')->whereNumber('id')->name('transactions.show');
Route::view('/transactions/{id}/edit', 'user.transactions.edit')->whereNumber('id')->name('transactions.edit');

// Blog usaha
Route::view('/blogs', 'user.blogs.index')->name('blogs.index');
Route::view('/blogs/add', 'user.blogs.create')->name('blogs.create');
Route::view('/blogs/{id}', 'user.blogs.show')->whereNumber('id')->name('blogs.show');
Route::view('/blogs/{id}/edit', 'user.blogs.edit')->whereNumber('id')->name('blogs.edit');

// Lainnya
Route::view('/bookmarks', 'user.bookmarks')->name('bookmarks');
Route::view('/profile', 'user.profile')->name('profile');
Route::view('/profile/password', 'user.password')->name('profile.password');

/*
|--------------------------------------------------------------------------
| Halaman admin
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::view('/', 'admin.dashboard')->name('dashboard');
    Route::view('/profile', 'admin.profile')->name('profile');
    Route::view('/users', 'admin.users.index')->name('users.index');
    Route::view('/users/{id}', 'admin.users.show')->whereNumber('id')->name('users.show');
    Route::view('/articles', 'admin.articles.index')->name('articles.index');
    Route::view('/articles/add', 'admin.articles.create')->name('articles.create');
    Route::view('/articles/{id}', 'admin.articles.show')->whereNumber('id')->name('articles.show');
    Route::view('/articles/{id}/edit', 'admin.articles.edit')->whereNumber('id')->name('articles.edit');
});
