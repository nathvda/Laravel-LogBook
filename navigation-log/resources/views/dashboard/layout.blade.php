<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panneau d'administration</title>
    @vite(['resources/scss/style.scss', 'resources/js/app.js'])
        @livewireStyles
</head>
<body>
    <header>Welcome on the administration panel, {{auth()->user()->name}}.</header>
    <main>
    @yield('content')
    @livewireScripts
    </main>
    <footer>
        2023 
    </footer>
</body>
</html>