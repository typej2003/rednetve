<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RedNetVe')</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --sidebar-width: 260px;
            --sidebar-collapsed-width: 80px; 
            --navbar-height: 70px; 
            --primary-rednet: #009b9f;
        }

        body { 
            background-color: #f8f9fa; 
            padding-top: var(--navbar-height); 
            overflow-x: hidden;
        }

        /* Estructura del Wrapper */
        #wrapper { display: flex; }

        /* SIDEBAR FIJO EN ESCRITORIO */
        #sidebarMenu {
            width: var(--sidebar-width);
            background: white;
            border-right: 1px solid #dee2e6;
            transition: width 0.3s ease-in-out;
            
            /* Posición fija absoluta debajo del navbar */
            position: fixed;
            top: var(--navbar-height);
            bottom: 0;
            left: 0;
            z-index: 1030;
            overflow-y: auto;
            overflow-x: hidden;
        }

        /* Clase para cuando está minimizado */
        #sidebarMenu.is-minimized {
            width: var(--sidebar-collapsed-width);
        }

        /* El contenido principal debe tener un margen izquierdo en escritorio */
        .main-content { 
            flex: 1; 
            margin-left: var(--sidebar-width);
            transition: margin-left 0.3s ease-in-out;
            padding: 20px 0;
        }

        /* Ajuste de margen cuando el sidebar está minimizado */
        body:has(#sidebarMenu.is-minimized) .main-content {
            margin-left: var(--sidebar-collapsed-width);
        }

        /* RESPONSIVIDAD MÓVIL */
        @media (max-width: 991.98px) {
            #sidebarMenu {
                left: -100%; 
                width: 280px !important;
                transition: left 0.3s ease-in-out;
            }
            #sidebarMenu.show {
                left: 0;
            }
            .main-content {
                margin-left: 0 !important;
            }
        }
    </style>
    @livewireStyles
</head>
<body>
    @auth @livewire('layouts.navbar-user') @else @livewire('layouts.navbar') @endauth

    <div id="wrapper">
        @auth
            <div id="sidebarMenu">
                @livewire('layouts.aside')
            </div>
        @endauth

        <main class="main-content">
            <div class="container-fluid">
                {{ $slot }}
            </div>
        </main>
    </div>

    @livewire('layouts.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle para móvil
        window.addEventListener('toggleSidebar', () => {
            const sidebar = document.getElementById('sidebarMenu');
            if(sidebar) sidebar.classList.toggle('show');
        });

        // Cerrar al hacer clic fuera en móvil
        document.addEventListener('click', (e) => {
            const sidebar = document.getElementById('sidebarMenu');
            if (sidebar && window.innerWidth < 992 && sidebar.classList.contains('show')) {
                if (!sidebar.contains(e.target) && !e.target.closest('.btn-hamburguesa-movil')) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>
    @livewireScripts
</body>
</html>