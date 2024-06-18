<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Route::view('/about', 'about')->name('about');
Route::resource('articles', ArticleController::class);
Route::resource('categories', CategoryController::class);

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.store');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::view('/admin', 'admin')->name('admin');
});
