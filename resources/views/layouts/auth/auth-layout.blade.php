@php
   $app = [
      'name' => config('app.name'),
      'lang' => str_replace('_', '-', app()->getLocale())
   ]
@endphp

<!DOCTYPE html>
<html lang="{{ $app['lang'] }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $app['name'] }} | @yield('title')</title>
    @vite('resources/sass/app.scss')
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
       <div id="layoutAuthentication_content">
          <main>
             {{-- content --}}
             @yield('content')
          </main>
       </div>
       {{-- footer --}}
       
       @include('layouts.auth._footer')
      </div>
 
    {{-- js --}}
    @vite('resources/js/app.js')

 </body>

</html>