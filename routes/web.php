<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function () {
    return \App\Models\User::get();
});

Route::get('users/count', function () {
    return \App\Models\User::count();
});
