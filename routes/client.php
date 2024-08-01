<?php

use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home'] )->name('client');
Route::get('/search', [PostController::class, 'search'] )->name('client.search');

Route::get('{category}/{post}', [PostController::class, 'show'] )
    ->name('client.post')
    ->where('category', '^[a-z0-9]+-[a-z0-9-]*$')
    ->where('post', '^[a-z0-9-]+-[a-z0-9-]*\.html$');

Route::get('{category}', [PostController::class, 'postInCategory'] )
    ->name('client.category.posts')
    ->where('category', '^[a-z0-9]+-[a-z0-9-]*$');
