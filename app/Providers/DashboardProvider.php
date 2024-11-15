<?php
// Anda juga dapat membuat provider sendiri untuk mengatur layanan-layanan yang Anda buat sendiri.Dengan menggunakan provider, Anda dapat dengan mudah mengatur dan mengelola layanan-layanan yang digunakan oleh aplikasi, sehingga aplikasi Anda menjadi lebih fleksibel dan mudah diatur.

namespace App\Providers;

use Illuminate\Support\Facades\View as FVIEW;
use Illuminate\Support\ServiceProvider;
use App\View\Composer\DashboardComposer;

class DashboardProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        FView::composer('layouts.dashboard.dashboard-layout',DashboardComposer::class);
    }

    
}
