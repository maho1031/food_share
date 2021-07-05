<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title') | {{ config('app.name') }}</title>

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta name="description" content="yield('description')" />
<meta name="keywords" content="yield('keywords')">
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@haiki_share" />
<meta property="og:url" content="{{ config('app.url') }}" />
<meta property="og:title" content="haiki_share" />
<meta property="og:description" content="yield('description')" />
<meta property="og:image" content="" />
<link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}">
<link rel="apple-touch-icon-precomposed" href="">

 <!-- Font Awesome -->
<script src="https://kit.fontawesome.com/7f19bc1ee0.js" crossorigin="anonymous"></script>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

 <!-- Styles -->
 <link href="{{ asset('css/style.css') }}" rel="stylesheet">
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"/>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

   <!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</head>
<body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
</body>
</html>