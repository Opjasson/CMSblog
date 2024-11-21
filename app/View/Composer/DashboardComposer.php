<?php

namespace App\View\Composer;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class DashboardComposer
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
// Setting awalan
    public function compose(View $view): void
    {

        $route = [
            'dashboard' => route('dashboard.home'),
            'profile' => '/',
            'logout' => route('auth.logout'),
        ];

        $view->with('app',[
            'name' => config('app.name'),
            'lang' => str_replace('_', '-', app()->getLocale()),
        ]);

    
// ------------------------------------------------
        // Auth::user() akan mengakses data user yang sedang aktif

        $view->with('user', Auth::user());

        $view->with('route',[
            'dashboard' => route('dashboard.home'),
            'profile' => '/',
            'logout' => route('auth.logout'),
        ]);

        $view->with('sidenavmenu',$this->generateMenu());
    }

    // ------------------------------------------------
    private function generateMenu()
    {
        $menus = $this->getMenus();
        $this->setMenuActive($menus);
        // dd($menus);
        return $menus;
    }

    private function setMenuActive(&$menus)
    {
        $setMenuActive = function (&$menu) use (&$setMenuActive) {
            $isActive = false;

            foreach ($menu as &$item) {
                if (isset($item['dropdown'])) {
                    $item['active'] = $setMenuActive($item['dropdown']);
                } else {
                    $item['active'] = ($item['route'] == Request::url());
                }

                $isActive = $isActive || $item['active'];
            }

            return $isActive;
        };

        foreach ($menus as &$menu) {
            if (isset($menu['menus'])) {
                $setMenuActive($menu['menus']);
            }
        }

        return $menus;
    }
    


    public function getMenus() : array {
        return [
            [
                'heading' => 'Core',
                'menus' => [
                    [
                        'title' => 'Dashboard',
                        'icon' => 'bi-speedometer2',
                        'route' => route('dashboard.home'),
                    ],
                ],
            ],
            [
                'heading' => 'Blog',
                'menus' => [
                    [
                        'title' => 'Tags',
                        'icon' => 'bi-tags',
                        'route' => route('dashboard.tag'),
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
