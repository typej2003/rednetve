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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('css/rednetve.css') }}">
    
    @livewireStyles
</head>
<style>
    main {
        margin: 0px !important;
        padding: 0px !important;
        z-index: 20000 !important;
        margin-top: 35px !important;
    }
</style>
<body>
    
    @livewire('layouts.navbar')

    <main>
        {{ $slot }}
    </main>

    @livewire('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tu lógica de hamburguesa móvil actual
        window.addEventListener('toggleSidebar', () => {
            const sidebar = document.getElementById('sidebarMenu');
            if(sidebar) {
                sidebar.classList.toggle('show');
            }
        });

        document.addEventListener('click', (e) => {
            const sidebar = document.getElementById('sidebarMenu');
            const btn = document.querySelector('.btn-hamburguesa'); 
            if (sidebar && window.innerWidth < 992 && sidebar.classList.contains('show') && !sidebar.contains(e.target) && (btn && !btn.contains(e.target))) {
                sidebar.classList.remove('show');
            }
        });
    </script>
    @livewireScripts
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</body>
</html>