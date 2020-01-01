<?php

use Illuminate\Support\Facades\Route;

Route::post('/repo/clear', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\BoratCacheController@clear'
]);
