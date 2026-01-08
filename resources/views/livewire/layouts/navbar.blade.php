<div id="navbar-wrapper">
    <nav class="navbar fixed-top navbar-custom shadow-sm p-0 bg-white" wire:ignore>
        <div class="container-fluid py-2 border-bottom">
            <div class="row align-items-center w-100 g-0">
                <div class="col-6 col-md-2 text-start">
                    <a class="navbar-brand p-0 m-0" href="/">
                        <img src="{{ asset('img/logo_rednet.png') }}" class="img-fluid" style="max-width:140px;" alt="Logo Rednet">
                    </a>
                </div>

                <div class="col-12 col-md-6 order-3 order-md-2 mt-2 mt-md-0 px-md-4 d-none">
                    <div class="input-group input-group-sm">
                        <input class="form-control" type="search" placeholder="Buscar...">
                        <button class="btn btn-primary" style="background-color: #009b9f; border:none;"><i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-12 col-md-6 order-3 order-md-2 mt-2 mt-md-0 px-md-4">

                </div>

                <div class="col-6 col-md-4 order-2 order-md-3 d-flex justify-content-end align-items-center">
                    <div class="dropdown me-2">
                        @auth
                            <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="miRednetDropdownLeft" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-page="mi-rednet">
                                <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="profileImage img-circle elevation-2" alt="User Image">
                                <span>{{auth()->user()->name}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="miRednetDropdownLeft">
                                @if(auth()->user()->role == 'root' || auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="/admin/panel">Escritorio</a>
                                @endif
                                @if(auth()->user()->role == 'cliente')
                                    
                                @endif
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf <a class="dropdown-item" href="{{ route('logout') }}" 
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Salir
                                    </a>
                                </form>
                            </div>
                            @else                            
                            <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="miRednetDropdownLeft" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-page="mi-rednet">
                                <img src="img/icono_mirednet.svg" alt="Mi Rednet" class="nav-icon me-2" onerror="this.onerror=null;this.src='https://placehold.co/20x20/007bff/fff?text=R';" style="max-width:20px;">
                                <span>Mi Rednet</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="miRednetDropdownLeft">
                                <a class="dropdown-item" href="/login">Login</a>
                            </div>
                            @endauth
                    </div>
                    <div class="ps-2 border-start">
                        <span class="small">Caracas</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-100" style="background-color:#009b9f;">
            <div class="container">
                <nav class="d-none d-md-flex justify-content-center py-0">
                    
                    <div class="dropdown-rednet mx-3">
                        <a href="/" class="text-white text-uppercase fs-6 nav-link-custom">INICIO</a>
                    </div>

                    <div class="dropdown-rednet mx-3">
                        <a href="/#nosotros" class="text-white text-uppercase fs-6 nav-link-custom">NOSOTROS</a>
                    </div>

                    <div class="dropdown-rednet mx-3">
                        <a href="/#servicios" class="text-white text-uppercase fs-6 nav-link-custom">
                            SERVICIOS <i class="bi bi-chevron-down small"></i>
                        </a>
                        <ul class="dropdown-menu-custom shadow">
                            <li><a href="/residencial" class="dropdown-item-custom">Residencial</a></li>
                            <li class="dropdown-submenu-custom">
                                <a href="#" class="dropdown-item-custom d-flex justify-content-between align-items-center">
                                    Empresarial <i class="bi bi-chevron-right small"></i>
                                </a>
                                <ul class="dropdown-menu-custom shadow">
                                    <li><a href="/pyme" class="dropdown-item-custom">Pyme</a></li>
                                    <li><a href="/corporacionplus" class="dropdown-item-custom">Corporación Plus</a></li>
                                    <li><a href="/isp" class="dropdown-item-custom">ISP</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                    @auth
                    <div class="dropdown-rednet mx-3">
                        <a href="#consulta" class="text-white text-uppercase fs-6 nav-link-custom">
                            CONSULTA <i class="bi bi-chevron-down small"></i>
                        </a>
                        <ul class="dropdown-menu-custom shadow">
                            <li><a href="/consultafacturas" class="dropdown-item-custom">Mis Facturas</a></li>
                            <li><a href="/mispagos" class="dropdown-item-custom">Mis Pagos</a></li>
                        </ul>
                    </div>
                    @endauth

                    <div class="dropdown-rednet mx-3">
                        <a href="/pagueaqui" class="text-white text-uppercase fs-6 nav-link-custom">PAGUE AQUÍ</a>
                    </div>
                </nav>

                <div class="d-md-none d-flex justify-content-between align-items-center py-2">
                    <span class="text-white small fw-bold ps-2">MENÚ</span>
                    <button id="btn-hamburguesa" class="btn border-0 shadow-none text-white" type="button">
                        <i class="bi bi-list" style="font-size: 2rem;"></i>
                    </button>
                </div>

                <div id="menu-movil-manual" class="d-none d-md-none pb-2">
                    <nav class="d-flex flex-column text-center">
                        <a href="/" class="text-white py-2 border-top border-info text-decoration-none small-menu-item">INICIO</a>
                        <a href="/#nosotros" class="text-white py-2 border-top border-info text-decoration-none small-menu-item">NOSOTROS</a>
                        <a href="/#servicios" class="text-white py-2 border-top border-info text-decoration-none small-menu-item">SERVICIOS</a>
                        <a href="/pagueaqui" class="text-white py-2 border-top border-info text-decoration-none small-menu-item">PAGUE AQUÍ</a>
                    </nav>
                </div>
            </div>
        </div>    
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('btn-hamburguesa');
            const menu = document.getElementById('menu-movil-manual');
            // Seleccionamos todos los enlaces dentro del menú móvil
            const links = menu.querySelectorAll('a');

            // Función para alternar el menú
            btn.addEventListener('click', function() {
                menu.classList.toggle('d-none');
            });

            // Función para CERRAR el menú cuando se hace clic en una opción
            links.forEach(link => {
                link.addEventListener('click', function() {
                    // Solo actuamos si el menú no está oculto
                    if (!menu.classList.contains('d-none')) {
                        menu.classList.add('d-none');
                    }
                });
            });
        });
    </script>

    <style>
        /* --- ESTILOS DE ESCRITORIO --- */
        .dropdown-rednet {
            position: relative;
            display: inline-block;
        }

        .nav-link-custom {
            text-decoration: none;
            display: block;
            padding: 12px 0; /* Aumentado para mejor click zone */
            position: relative;
            transition: color 0.3s ease;
        }

        /* Línea blanca inferior animada */
        .nav-link-custom::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 5px;
            left: 0;
            background-color: #ffffff;
            transition: width 0.3s ease;
        }

        .dropdown-rednet:hover .nav-link-custom::after {
            width: 100%;
        }

        /* Menú desplegable */
        .dropdown-menu-custom {
            display: none;
            position: absolute;
            background-color: #ffffff;
            min-width: 220px;
            list-style: none;
            padding: 8px 0;
            margin: 0;
            border-top: 4px solid #00d1d6;
            box-shadow: 0 8px 16px rgba(0,0,0,0.1);
            z-index: 1050;
            top: 100%;
            left: 50%;
            transform: translateX(-50%);
        }

        .dropdown-item-custom {
            color: #333 !important;
            padding: 10px 20px;
            text-decoration: none;
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            text-align: left;
            transition: all 0.2s ease;
        }

        .dropdown-item-custom:hover {
            background-color: #f1fbfc;
            color: #009b9f !important;
            padding-left: 25px;
        }

        .dropdown-rednet:hover > .dropdown-menu-custom {
            display: block;
            animation: fadeInMenu 0.2s ease-out;
        }

        /* Submenú Multinivel */
        .dropdown-submenu-custom { position: relative; }
        .dropdown-submenu-custom > .dropdown-menu-custom {
            top: -8px;
            left: 100%;
            transform: translateX(0);
            border-top: none;
            border-left: 4px solid #00d1d6;
        }
        .dropdown-submenu-custom:hover > .dropdown-menu-custom { display: block; }

        @keyframes fadeInMenu {
            from { opacity: 0; transform: translateX(-50%) translateY(10px); }
            to { opacity: 1; transform: translateX(-50%) translateY(0); }
        }

        /* --- ESTILOS MÓVIL --- */
        .small-menu-item {
            font-size: 0.85rem;
            letter-spacing: 1px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .navbar-brand img { max-width: 110px !important; }
            body { padding-top: 110px !important; }
        }

        
    </style>

    <style>
    /* Posicionamiento específico para el menú de usuario */
.dropdown-menu[aria-labelledby="miRednetDropdownLeft"] {
    display: none;
    position: absolute;
    right: 0;         /* Se alinea a la derecha para no salirse de la pantalla */
    left: auto;
    top: 100%;
    z-index: 2000;    /* Por encima de todo */
    min-width: 200px;
    background-color: #fff;
    border: 1px solid rgba(0,0,0,0.15);
    border-radius: 8px;
    margin-top: 10px;
}

/* Solo se muestra cuando tiene la clase .show */
.dropdown-menu[aria-labelledby="miRednetDropdownLeft"].show {
    display: block !important;
}

/* Estilo de los links dentro del menú de usuario */
.dropdown-menu[aria-labelledby="miRednetDropdownLeft"] .dropdown-item {
    padding: 10px 20px;
    color: #333;
    text-decoration: none;
    display: block;
    font-size: 0.9rem;
}

.dropdown-menu[aria-labelledby="miRednetDropdownLeft"] .dropdown-item:hover {
    background-color: #f8f9fa;
    color: #009b9f;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const userBtn = document.getElementById('miRednetDropdownLeft');
    const userMenu = userBtn.nextElementSibling; // Selecciona el .dropdown-menu que le sigue

    userBtn.addEventListener('click', function (e) {
        e.preventDefault();
        e.stopPropagation();
        userMenu.classList.toggle('show');
    });

    // Cerrar el menú si se hace clic fuera de él
    document.addEventListener('click', function (e) {
        if (!userBtn.contains(e.target) && !userMenu.contains(e.target)) {
            userMenu.classList.remove('show');
        }
    });
});
</script>
</div>