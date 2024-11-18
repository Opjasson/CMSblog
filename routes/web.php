<?php

use App\Http\Controllers\Auth\{LoginController,LogOutControllers};
use App\Http\Controllers\Dashboard\{HomeController,TagController};
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\HomeController as SiteHomeController;




// ->name berfungsi untuk memberikan nama pada route dan supaya bisa diigunakan didalam aplikasi 
// 'index' adalah nama function yang ada di controller
Route::get('/', [SiteHomeController::class, 'index'])->name('site.home');


// Middleware dan guest untuk authentikasi
// yang belum login
Route::middleware(['guest'])->group(
    function () {
        // terhubung dengan folder bootstrap app.php
        Route::get('/login', [LoginController::class, 'index'])->name('auth.login');

        Route::post('/login', [LoginController::class, 'action'])->name('auth.login.action');
    }
);

// hanya bisa diakses ketika user sudah login
Route::middleware(['auth'])->group(
    function () {
        Route::post('/logout', LogOutControllers::class)->name('auth.logout');
        Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.home');
        Route::get('/dashboard/tags', [TagController::class, 'index'])->name('dashboard.tag');
        Route::get('/dashboard/tags/create', [TagController::class, 'create'])->name('dashboard.tag.create');
    }

);
