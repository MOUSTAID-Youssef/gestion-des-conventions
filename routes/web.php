<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/', function () {
    return view('auth.login');
});
