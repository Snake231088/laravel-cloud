<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users', function () {
    return \App\Models\User::get();
});

Route::get('users/count', function () {
    return \App\Models\User::count();
});

Route::get('users/create', function () {
    dispatch(new \App\Jobs\CreateUsers());
    
    return response()->json();
});

Route::get('users/search', function (\Illuminate\Http\Request $request) {
    $search = $request->input('search');
    
    return \App\Models\User::where('name', 'like', "%{$search}%")->get();
});
