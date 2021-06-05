<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @yield('head')
</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>
</html>