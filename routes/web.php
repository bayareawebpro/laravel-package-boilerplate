<?php
/*
|--------------------------------------------------------------------------
| Package Web Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('package-name::default');
})
    ->middleware(['web', 'guest'])
    ->name('home');

Route::get('/dashboard', function () {
    return view('package-name::default');
})
    ->middleware(['web', 'auth'])
    ->name('dashboard');
