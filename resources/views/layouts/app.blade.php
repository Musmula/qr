<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- OpenGraph --}}
    <meta property="og:title" content="{{ config('app.name') }}">
    <meta property="og:description" content="Qr codes from space">
    <meta property="og:image" content="{{ url('img/splash.jpg') }}">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="fb:app_id" content="{{ env('APP_ID') }}">

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
                <img src="{{ url('/img/logo.svg') }}" alt="{{ config('app.name') }}"> &nbsp; &nbsp;
                <span>{{ config('app.name') }}</span>
            </a>
        </div>
        <span class="nav-toggle" @click="mobileNav = ! mobileNav" :class="{ 'is-active' : mobileNav }">
            <span></span>
            <span></span>
            <span></span>
        </span>
        <div class="nav-right nav-menu" :class="{ 'is-active' : mobileNav }">
            <a href="{{ url('about') }}" class="nav-item">About</a>
            @if (Auth::guest())
                <div class="nav-item">
                    <a href="{{ url('login') }}" class="button">Login</a>
                    <a href="{{ url('register') }}" class="button is-primary">Sign up</a>
                </div>
            @else
            <form id="sign-out" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <a href="{{ url('/profile') }}" class="nav-item">
                Profile
            </a>
            <a class="nav-item" @click.prevent="signOut">
                Sign out
            </a>
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
