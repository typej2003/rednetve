<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico?v=1') }}">
    <meta name="theme-color" content="#ff572f">
    <title>@yield('title', 'RedNetVe - Bienvenidos')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/rednetve.css') }}">
    
    @livewireStyles
</head>
<body>
    @livewire('layouts.navbar')

    <main>
        {{ $slot }}
    </main>

    @livewire('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>