<?php
/*
|--------------------------------------------------------------------------
| Package Web Routes
|--------------------------------------------------------------------------
*/

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('package-name::default');
});
