<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->as('admin.')
    ->group(function(){

        Route::get('/',function(){
            return view('admin.dashboard');
        });


        Route::resource('categories', CategoryController::class);
        Route::resource('posts', PostController::class);
        Route::resource('users', UserController::class);
    });
