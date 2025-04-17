<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home route
Route::get('/', function () {
    return view('home');
});

// Job routes (now using controller)
Route::resource('jobs', JobController::class);

// Contact route
Route::get('/contact', function () {
    return view('contact');
});