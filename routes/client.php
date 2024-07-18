<?php

use App\Http\Controllers\Client\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'home'] )->name('client');
Route::get('/search', [PostController::class, 'search'] )->name('client.search');

Route::get('posts/{id}', [PostController::class, 'show'] )->name('client.post');
Route::get('categories/{id}', [PostController::class, 'postInCategory'] )->name('client.category.posts');
