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
    <button class="mobile__menu_button">NAVIGATION</button>
    <nav class="mobile__menu">
    <button class="show">Locations</button>
    <div id="show__inside">
        @foreach($dropdownLocations as $location)
        <a href="/location/show/{{$location->id}}">{{$location->location}}</a>
        @endforeach
    </div>
    </nav>
    <form method="GET" action="#">
        <input type="text" id="search" name="search" placeholder="find an entry"/>
    </form> 
        <main>
        @yield('content')
        </main>
    </body>
</html>
