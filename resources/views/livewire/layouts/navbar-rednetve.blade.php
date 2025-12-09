<div>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>RedNetVe</title>
        
        <!-- Enlace a Bootstrap 5 CSS CDN -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjHh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="/css/css_rednetve.css">
        
        <!-- nav -->
        @stack('styles')
        
    </head>

    <!-- BARRA DE NAVEGACIÓN (SOLO ESTRUCTURA DE ESCRITORIO) -->
    <nav class="navbar fixed-top navbar-custom shadow-sm p-0">
        <!-- container-fluid sin padding para pegar a los bordes si es necesario -->
        <div class="container-fluid p-0 mt-2 mb-3">
            
            <!-- ÚNICO CONTENEDOR DE ESCRITORIO -->
            <div class="navbar-content-container">

                <!-- 1. LOGO (Izquierda) -->
                <div class="section-logo">
                    <a class="navbar-brand p-0" href="/">
                        <img src="img/logo_rednet.png" 
                             class="img-fluid" style="max-width:140px;" alt="Logo Rednet">
                    </a>
                </div>

                <!-- 2. SEARCH (Centro - Expandido) -->
                <div class="section-search">
                    <form class="w-100" role="search">
                        <div class="input-group">
                            <!-- Input -->
                            <input class="form-control form-control-search" type="search" placeholder="Buscar servicios o ayuda..." aria-label="Search">
                            <!-- Botón de Búsqueda -->
                            <button class="btn btn-custom-primary" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.447.747 1.054 1.353 1.398 1.397l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85Z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- 3. LOGIN (Derecha) - espacio reservado para otros elementos -->
                <div class="section-login">
                    <!-- aquí puedes colocar botones o enlaces adicionales a la derecha -->
                    <!-- Mi Rednet y Localización movidos aquí (izquierda del header) -->
                    <div class="d-flex align-items-center ms-3">
                        <!-- Mi Rednet (dropdown) -->
                        <div class="dropdown me-2">
                            @auth
                            <a class="nav-link dropdown-toggle d-flex align-items-center p-0 text-dark" href="#" id="miRednetDropdownLeft" role="button" data-bs-toggle="dropdown" aria-expanded="false" data-page="mi-rednet">
                                <img src="{{ auth()->user()->avatar_url }}" id="profileImage" class="profileImage img-circle elevation-2" alt="User Image">
                                <span>{{auth()->user()->name}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="miRednetDropdownLeft">
                                @if(auth()->user()->role == 'root' || auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="/admin/dashboard">Escritorio</a>
                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}" x-ref="profileLink">Perfil</a>
                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}" x-ref="changePasswordLink">Cambiar Contraseña</a>
                                    <a class="dropdown-item" href="{{ route('admin.settings') }}">Configuración</a>
                                @endif
                                @if(auth()->user()->role == 'cliente')
                                    <a class="dropdown-item" href="{{ route('updateprofileclient') }}" x-ref="profileLink">Perfil</a>
                                    <a class="dropdown-item" href="{{ route('updateprofileclient') }}" x-ref="changePasswordLink">Cambiar Contraseña</a>
                                @endif
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Salir</a>
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
                    </div>
                    
                </div>
                <!-- Localización (dropdown convertido a div para poder controlar z-index) -->
                <div class="section-localization ml-3 mr-2" style="margin-right: 20px !important;">
                    <div class="dropdown" style="position:relative; z-index:3000;">
                        <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" id="locationDropdownLeft" data-bs-toggle="dropdown" aria-expanded="false">
                            Caracas
                        </button>
                        <div class="dropdown-menu dropdown-menu-start" aria-labelledby="locationDropdownLeft">
                            <a class="dropdown-item active" href="#">Caracas</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Menú horizontal adicional debajo del nav (desktop + mobile) -->
        <div class="w-100 my-1" style="background-color:#009b9f; ">
            <div class="container">
                <!-- Desktop menu: visible en md+ (con dropdown para SERVICIOS) -->
                <nav class="menu-desktop">
                    <a href="/" data-page="inicio" class="text-white text-uppercase fs-6 mx-3">INICIO</a>
                    <a href="/#nosotros" data-page="nosotros" class="text-white text-uppercase fs-6 mx-3">NOSOTROS</a>

                    <!-- SERVICIOS dropdown multinivel -->
                    <div class="dropdown mx-3">
                        <a href="/#servicios" data-page="servicios" class="text-white text-uppercase fs-6 dropdown-toggle">SERVICIOS</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Residencial</a>
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle">Empresarial</a>
                                <div class="dropdown-menu">
                                    <a href="/pyme" class="dropdown-item">Pyme</a>
                                    <a href="/corporacionplus" class="dropdown-item">Corporacion Plus</a>
                                    <a href="/isp" class="dropdown-item">ISP</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                    <!-- CONSULTA dropdown multinivel -->
                    <div class="dropdown mx-3">
                        <a href="#consulta" data-page="consulta" class="text-white text-uppercase fs-6 dropdown-toggle">CONSULTA</a>
                        <div class="dropdown-menu">
                            <a href="/consultafacturas" class="dropdown-item">Mis Factura</a>
                            <a href="/mispagos" class="dropdown-item">Mis Pagos</a>
                        </div>
                    </div>
                    @endauth
                    <a href="/pagueaqui" class="text-white text-uppercase fs-6 mx-3">PAGUE AQUÍ</a>
                </nav>

                <!-- Mobile header: visible en sm (muestra toggler) -->
                <div class="d-flex d-md-none justify-content-between align-items-center py-2">
                    <div></div>
                    <button class="btn btn-link text-white p-0" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle menu">
                        <!-- Icono hamburguesa simple -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="color:white;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile menu (colapsable) -->
                <div class="collapse d-md-none" id="mobileMenu">
                    <nav class="d-flex flex-column text-center py-2">
                        <a href="/" class="text-white py-2 border-top">INICIO</a>
                        <a href="/#nosotros" class="text-white py-2 border-top">NOSOTROS</a>
                        <a href="/#servicios" class="text-white py-2 border-top">SERVICIOS</a>
                        <a href="/pagueaqui" class="text-white py-2 border-top">PAGUE AQUÍ</a>
                    </nav>
                </div>

            </div>
        </div>    

    </nav>

    <!-- JS de Bootstrap (necesario para el colapso del menú móvil) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    
</div>