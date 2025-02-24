<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('user', function () {
    \App\Models\User::factory(1000)->create();
    
    return response()->json([
        'status' => 'ok',
    ]);
});
