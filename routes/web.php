<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Route::view('/about', 'about')->name('about');
Route::resource('articles', ArticleController::class)->only(['index', 'show']);
