<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    {{-- <script src="{{ asset('js/script.js') }}"></script> --}}
</body>

</html>
