<?php
// Anda juga dapat membuat provider sendiri untuk mengatur layanan-layanan yang Anda buat sendiri.Dengan menggunakan provider, Anda dapat dengan mudah mengatur dan mengelola layanan-layanan yang digunakan oleh aplikasi, sehingga aplikasi Anda menjadi lebih fleksibel dan mudah diatur.

namespace App\Providers;

use Illuminate\Support\Facades\View as FVIEW;
use Illuminate\View\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Stmt\Return_;

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
        

        FView::composer('layouts.dashboard.dashboard-layout', function(View $view){
                        
            $route = [
                'dashboard' => route('dashboard.home'),
                'profile' => '/',
                'logout' => route('auth.logout'),
            ];



            $view->with('app',[
                'name' => config('app.name'),
                'lang' => str_replace('_', '-', app()->getLocale()),
            ]);
            // Auth::user() akan mengakses data user yang sedang aktif

            $view->with('user', Auth::user());

            $view->with('route',[
                'dashboard' => route('dashboard.home'),
                'profile' => '/',
                'logout' => route('auth.logout'),
            ]);

            $view->with('sidenavmenu',$this->getMenus());
        });
    }

    public function getMenus() : array {
        return [
            [
                'heading' => 'Core',
                'menus' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => 'bi-speedometer2',
                        'route' => '/',
                    ],
                ],
            ],
            [
                'heading' => 'Dropdown',
                'menus' => [
                    [
                        'title' => 'Link 1',
                        'icon' => 'bi-share',
                        'dropdown' => [
                            [
                                'title' => 'Link 1.1',
                                'route' => '/',
                            ],
                            [
                                'title' => 'Link 1.2',
                                'route' => '/',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Link 2',
                        'icon' => 'bi-share',
                        'dropdown' => [
                            [
                                'title' => 'Link 2.1',
                                'route' => '/',
                            ],
                            [
                                'title' => 'Link 2.2',
                                'route' => '/',
                            ],
                        ],
                    ],
                    [
                        'title' => 'Link 3',
                        'icon' => 'bi-share',
                        'route' => '/',
                    ],
                ],
            ],
        ];
    }
}
