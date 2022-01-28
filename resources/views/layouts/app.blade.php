<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar sticky-top navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <span class="navbar-text">
                @if(Auth::check())
                    <a href="{{ url('posts') }}">{{ Auth::user()->name }}</a> |
                    <a href="{{ url('logout') }}" style="text-decoration: none; color: #E04A3A;">Logout</a>
                @endif
            </span>
        </nav>
        @yield('content')
    </div>

<!-- Scripts -->
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
