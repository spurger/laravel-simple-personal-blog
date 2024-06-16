<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Route::get('/articles', [ArticleController::class, 'index']);
