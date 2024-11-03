<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Layout</title>
</head>
<body>
    {{-- template ini berguna sebagai induk atau base layout --}}
    {{-- @yield berfungsi untuk mendefinisikan sebuah section yang dapat diisi oleh child template --}}
    @yield('content')
</body>
</html>