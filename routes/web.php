<?php

use Illuminate\Support\Facades\Route;

Route::post('/package/clear', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\BoratCacheController@packageClear'
]);

Route::post('/packages/clear', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\BoratCacheController@packagesClear'
]);
