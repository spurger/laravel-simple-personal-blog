<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Route::resource('articles', ArticleController::class)->only(['index', 'show']);
