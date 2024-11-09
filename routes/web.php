<?php

use App\Http\Controllers\Auth\LoginController ;
use App\Http\Controllers\Dashboard\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as SiteHomeController;



// ->name berfungsi untuk memberikan nama pada route dan supaya bisa diigunakan didalam aplikasi 
// 'index' adalah nama function yang ada di controller
Route::get('/',[SiteHomeController::class, 'index'])->name('site.home');

Route::get('/login',[LoginController::class, 'index'])->name('auth.login');

Route::post('/login',[LoginController::class, 'action'])->name('auth.login.action');


Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard.home');