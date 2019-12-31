<?php

use Illuminate\Support\Facades\Route;

Route::post('/user/view', [
    'middleware' => ['xss', 'https'],
    'uses' => 'App\Http\Controllers\BoratCacheController@clear'
]);
