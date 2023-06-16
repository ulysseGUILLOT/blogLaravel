<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->group(function () {
    Route::get('/', function (Request $request) {

        return \App\Models\Post::all();

    })->name("index");


    Route::get('/{slug}-{id}', function (string $slug, string $id){
        return [
            "slug" => $slug,
            "id" => $id
        ];
    })->where([
        "slug" => "[a-zA-Z0-9\-]+",
        "id" => "[0-9]+",
    ])->name("show");
});
