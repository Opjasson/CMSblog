@php
    $app = [
        'name' => config('app.name'),
        'lang' => str_replace('_', '-', app()->getLocale()),
    ];

    // auth()->user() akan mengakses data user yang sedang aktif
    $user = auth()->user();
    $route = [
        'dashboard' => route('dashboard.home'),
        'profile' => '/',
        'logout' => route('auth.logout'),
    ];

    $sidenavmenu = [
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
@endphp

<!DOCTYPE html>
<html lang="{{ $app['lang'] }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/sass/app.scss')
    <title>{{ $app['name'] }}| @yield('title')</title>
</head>

<body class="sb-nav-fixed">
    {{-- navbar --}}
    @include('layouts.dashboard._navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            {{-- sidenav --}}
            @include('layouts.dashboard._sidenav')
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">
                        {{-- title --}}
                        @yield('title')
                    </h1>
                    {{-- bread/content --}}
                    @yield('breadcrumb')
                    @yield('content')
                </div>
            </main>
            {{-- footer --}}
            @include('layouts.dashboard._footer')
        </div>
    </div>
    {{-- script/js --}}
    @vite('resources/js/app.js')
</body>

</html>
