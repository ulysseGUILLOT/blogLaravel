<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name("index");

    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');
    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::post('{post}/edit', 'update');
    Route::get('/{slug}-{post}', 'show')->where([
        "slug" => "[a-zA-Z0-9\-]+",
        "post" => "[0-9]+",
    ])->name("show");
});
