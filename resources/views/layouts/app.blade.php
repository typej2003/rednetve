<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('favicon-16x16.png?v=1') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico?v=1') }}">
    <meta name="theme-color" content="#ff572f">
    <title>@yield('title', 'RedNetVe - Bienvenidos')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    @livewireStyles
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px; /* Nueva variable para el estado minimizado */
            --navbar-height: 70px; 
            --primary-rednet: #009b9f;
        }

        body { 
            background-color: #f8f9fa; 
            padding-top: var(--navbar-height); 
            overflow-x: hidden;
        }

        #wrapper {
            display: flex;
            min-height: calc(100vh - var(--navbar-height));
        }

        /* Contenedor del Sidebar */
        #sidebarMenu {
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid #dee2e6;
            transition: width 0.3s ease-in-out; /* Animamos solo el ancho */
            z-index: 1;
            position: sticky;
            top: var(--navbar-height);
            height: calc(100vh - var(--navbar-height));
            overflow: hidden; /* Evita que el contenido interno se desborde al achicar */
        }

        /* AJUSTE CLAVE: Cuando el componente interno Aside tiene la clase minimized */
        #sidebarMenu:has(.minimized) {
            width: var(--sidebar-collapsed-width);
        }

        .main-content {
            flex: 1;
            padding: 20px;
            min-width: 0; 
            transition: all 0.3s ease-in-out; /* Para que el contenido se expanda suavemente */
        }

        /* RESPONSIVIDAD MÓVIL */
        @media (max-width: 991.98px) {
            #sidebarMenu {
                position: fixed;
                left: -100%; 
                top: var(--navbar-height);
                width: 280px !important; /* Forzamos ancho completo en móvil */
                height: 100%;
                box-shadow: 5px 0 15px rgba(0,0,0,0.1);
            }

            #sidebarMenu.show {
                left: 0; 
            }
        }
    </style>
</head>
<body>
    @auth
        @livewire('layouts.navbar-user')
    @else
        @livewire('layouts.navbar')
    @endauth

    <div id="wrapper">
        @auth
            <div id="sidebarMenu">
                @livewire('layouts.aside')
            </div>
        @endauth

        <main class="main-content">
            <div class="container-fluid py-4">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewire('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
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
</body>
</html>