<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="shortcut icon" href="/images/fav.png" />

    <link href="https://fonts.googleapis.com/css?family=Comfortaa|Quicksand|Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montez|Petit+Formal+Script&display=swap" rel="stylesheet">


    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    @yield('css')


    <title>@yield('title','Luvel')</title>
</head>
<body class="@yield('bodyclass')">

    @yield('nav')

    @yield('content')


    <!-- Scripts -->
    <script src="/js/app.js"></script>
    @yield('scripts')
</body>
</html>
