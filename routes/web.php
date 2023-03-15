<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function () {
    return view('post');
});

Route::get('/{any}', function () {
    return view('post');
})->where('any', '.*');

