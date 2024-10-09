<?php

use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});

Route::resource('buku', BukuController::class);
