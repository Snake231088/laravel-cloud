<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', function () {
    \App\Models\User::factory(10)->create();
    
    return response()->json(status: 204);
});
