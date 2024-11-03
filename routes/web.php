<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController;



// ->name berfungsi untuk memberikan nama pada route dan supaya bisa diigunakan didalam aplikasi 
Route::get('/',[HomeController::class, 'index'])->name('site.home');

Route::get('/login',[LoginController::class, 'index'])->name('site.login');
