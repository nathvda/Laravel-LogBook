<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/scss/style.scss', 'resources/js/app.js'])
        <!-- Styles -->
    </head>
    <body class="antialiased">
    <header>
    <h2>@yield('title')</h2>
    @auth<div class="navigation"> <form method="post" action="/logout">
        @csrf
        <button class="button--dark" type="submit">Log Out</button>
    </form>
    <a href="/viewprofile/{{auth()->user()->id}}">Profile</a>
        <button class="mobile__menu_button">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-map" viewBox="0 0 16 16">
    <path fill-rule="evenodd" d="M15.817.113A.5.5 0 0 1 16 .5v14a.5.5 0 0 1-.402.49l-5 1a.502.502 0 0 1-.196 0L5.5 15.01l-4.902.98A.5.5 0 0 1 0 15.5v-14a.5.5 0 0 1 .402-.49l5-1a.5.5 0 0 1 .196 0L10.5.99l4.902-.98a.5.5 0 0 1 .415.103zM10 1.91l-4-.8v12.98l4 .8V1.91zm1 12.98 4-.8V1.11l-4 .8v12.98zm-6-.8V1.11l-4 .8v12.98l4-.8z"/>
    </svg>
    </button>
    <nav class="mobile__menu">
    <button class="show">Locations</button>
    <div id="show__inside">
        @foreach($dropdownLocations as $location)
        <a href="/location/show/{{$location->id}}">{{$location->location}}</a>
        @endforeach
    </div>
    </nav></div>@endauth
</header>
        <main>
        @yield('content')
        </main>
        <footer>
            <p>2023</p>
        </footer>
    </body>
</html>
