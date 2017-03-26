<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @include('partials.favicon')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            'url' => env('APP_URL')
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
    <nav class="nav container">
        <div class="nav-left">
            <a href="{{ url('/') }}" class="nav-item is-brand">
                <img src="{{ url('/img/logo.jpg') }}" alt="{{ config('app.name') }}"> &nbsp;
                <span>{{ config('app.name') }}</span>
            </a>
        </div>
        <span class="nav-toggle" @click="mobileNav = ! mobileNav" :class="{ 'is-active' : mobileNav }">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="nav-right nav-menu" :class="{ 'is-active' : mobileNav }">
            @if (Auth::guest())
                <div class="nav-item">
                    <a href="{{ url('login') }}" class="button">Login</a>
                    <a href="{{ url('register') }}" class="button is-primary">Sign up</a>
                </div>
            @else
            <form id="sign-out" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <div class="nav-item">
                <a href="{{ url('/home') }}" class="button is-primary">
                    Generate
                </a>
                <a class="button" @click.prevent="signOut">
                    Sign out
                </a>
            </div>
            @endif
        </div>
    </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @include('sweet::alert')
    @include('partials.footer')
</body>
</html>
