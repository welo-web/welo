<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/subscribe', 'App\Http\Controllers\SubscriptionController@store');