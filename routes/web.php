<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('/login', [AuthController::class, 'doLogin']);

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name("index");

    Route::get('/new', 'create')->name('create')->middleware('auth');
    Route::post('/new', 'store');
    Route::get('/{post}/edit', 'edit')->name('edit')->middleware('auth');
    Route::patch('{post}/edit', 'update')->middleware('auth');
    Route::get('/{slug}-{post}', 'show')->where([
        "slug" => "[a-zA-Z0-9\-]+",
        "post" => "[0-9]+",
    ])->name("show");
});
