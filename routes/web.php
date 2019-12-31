<?php

use Illuminate\Support\Facades\Route;

Route::post('/borat/cache/clear', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\BoratCacheController@clear'
]);
