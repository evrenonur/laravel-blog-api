<?php

use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\CkeditorFileUploadController;
use App\Http\Controllers\Backend\CommentsController;
use App\Http\Controllers\Backend\Users;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Backend\HomeController;


Route::group(['prefix' => 'admin', 'as' => 'admin.','middleware' => ['auth','admin']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('categories', CategoriesController::class);
    Route::resource('blog', BlogController::class);
    Route::resource('ckeditor', CkeditorFileUploadController::class);
    Route::resource('users', Users::class);
    Route::resource('comments', CommentsController::class);
});

Route::get('/', function () {})->name('home');

Auth::routes();

