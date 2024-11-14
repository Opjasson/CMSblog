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
