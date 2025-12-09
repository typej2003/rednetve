<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedNetVe</title>
    
    <!-- Enlace a Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjHh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <style>
        html, body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Variables y Estilos Generales */
        :root {
            --color-primary: #10999F; /* Color principal (azul verdoso) */
            --color-secondary: #f8f9fa; /* Fondo claro */
            --color-text: #343a40;

            /* ALTURAS DE EJEMPLO (AJUSTA ESTOS VALORES A LA ALTURA REAL DE TUS MENÚS) */
            --navbar-height: 70px; 
            --menu-desktop-height: 40px; 

            /* Cálculo de la altura total del banner */
            --banner-dynamic-height: calc(100vh - var(--navbar-height) - var(--menu-desktop-height));
        }

        .navbar-custom {
            background-color: var(--color-secondary);
            border-bottom: 1px solid #e9ecef;
            min-height: 70px; /* Altura mínima para asegurar el espacio */
        }

        /* ------------------------------------------------------------------ */
        /* ESTRUCTURA CLAVE DE TRES COLUMNAS (Desktop) */
        /* ------------------------------------------------------------------ */
        .navbar-content-container {
            /* PROPIEDADES CRUCIALES PARA LA DISTRIBUCIÓN */
            display: flex;
            align-items: center;
            justify-content: space-between; /* Distribuye Logo y Login a los extremos */
            width: 100%;
            height: 100%; /* Asegura que ocupe la altura del nav */
        }

        /* 1. Section-Logo (Izquierda) */
        .section-logo {
            flex-shrink: 0; /* Asegura que mantenga su tamaño */
            /* Padding para separar del borde izquierdo */
            padding: 0 1rem 0 1rem; 
        }

        /* 2. Section-Search (Centro - EXPANDIDO) */
        .section-search {
            flex-grow: 1; /* <-- ESTO HACE QUE SE ESTIRE y ocupe el espacio central */
            max-width: 420px; /* Reducido a 420px para una barra de búsqueda más compacta */
            margin: 0 1.5rem; /* Margen para separar visualmente del logo y login */
        }
        
        /* 3. Section-Login (Derecha) */
        .section-login {
            flex-shrink: 0; /* Asegura que mantenga su tamaño */
            /* Padding para separar del borde derecho */
            padding: 0 1rem 0 0; 
        }

        /* Estilo para el Input y Botón de Búsqueda */
        .form-control-search {
            border-radius: 0.5rem 0 0 0.5rem;
        }
        .btn-custom-primary {
            background-color: var(--color-primary);
            border-color: var(--color-primary);
            color: white;
            border-radius: 0 0.5rem 0.5rem 0; 
            transition: background-color 0.3s;
        }
        .btn-custom-primary:hover {
            background-color: #0b7a7f;
            border-color: #0b7a7f;
            color: white;
        }
        /* Color hover para items de dropdown */
        .dropdown-menu .dropdown-item:hover {
            background-color: var(--color-main-footer) !important;
            color: #fff !important;
        }
        /* --- Estilos para el menú de escritorio (sin subrayado) y dropdown por hover --- */
        .menu-desktop a {
            text-decoration: none !important;
            color: #ffffff !important;
        }
        .menu-desktop .dropdown,
        .menu-desktop .dropdown-submenu {
            position: relative;
        }
        .btn-secondary {
            background-color: var(--color-dark-blue);
        }
        @media (min-width: 768px) {
            .menu-desktop .dropdown:hover > .dropdown-menu {
                display: block;
            }
            .menu-desktop .dropdown-menu {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                background: #009b9f;
                border: none;
                min-width: 200px;
                z-index: 2000;
                padding: .25rem 0;
            }
            .menu-desktop .dropdown-menu .dropdown-item {
                color: #fff !important;
                padding: .5rem 1rem;
            }
            .menu-desktop .dropdown-submenu:hover > .dropdown-menu {
                display: block;
                top: 0;
                left: 100%;
                min-width: 180px;
            }
        }
    </style>
    <!-- footer -->
    <style>
        /* Variables de Color Actualizadas */
        :root {
            --color-primary: #10999F; /* Azul Verdoso (para botones y redes sociales) */
            --color-main-footer: #162661; /* ¡NUEVO COLOR SOLICITADO! (Fondo principal) */
            --color-bottom-footer: #101c4e; /* Fondo de Copyright (Ligeramente más oscuro que el principal) */
            --color-dark-blue: #113c66; /* Azul Oscuro para Copyright Text */
        }

        /* ------------------------------------------------------------------ */
        /* PIE DE PÁGINA: Fila Superior (4 Columnas) */
        /* ------------------------------------------------------------------ */

        .footer-top {
            background-color: var(--color-main-footer); /* Usando el nuevo color #162661 */
            color: white; /* Color de las letras: Blanco */
            padding: 3rem 0;
        }

        /* Estilo para los títulos y etiquetas */
        .footer-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
        }
        .footer-link, .footer-text {
            color: #ccc; /* Gris claro para el texto secundario */
            text-decoration: none;
            display: block;
            margin-bottom: 0.25rem;
            font-size: 0.95rem;
        }
        .footer-link:hover {
            color: var(--color-primary);
        }
        /* Ajuste específico para las líneas de horario */
        .footer-top .col-md-3:nth-child(3) .footer-text {
            margin-bottom: 0.5rem; 
        }

        /* ------------------------------------------------------------------ */
        /* PIE DE PÁGINA: Fila Inferior (Copyright y Redes Sociales) */
        /* ------------------------------------------------------------------ */
        .footer-bottom {
            background-color: var(--color-bottom-footer); /* Usando el azul oscuro de contraste */
            color: white;
            padding: 1rem 0;
            font-size: 0.9rem;
        }

        /* Estilo específico para el texto de Copyright */
        .copyright-text {
            color: var(--color-dark-blue); /* Color solicitado: Azul Oscuro #003366 */
            font-weight: 500;
        }

        /* Estilos para los Iconos de Redes Sociales */
        .social-icon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 38px;
            height: 38px;
            background-color: var(--color-primary); /* Fondo: #10999f */
            border-radius: 50%; /* Iconos Redondos */
            color: white; /* Iconos: Color Blanco */
            transition: transform 0.3s ease;
            margin-left: 0.5rem; /* Separación entre iconos */
        }
        .social-icon:hover {
            transform: scale(1.1);
            background-color: #0b7a7f;
        }

        /* ------------------------------------------------------------------ */
        /* RESPONSIVIDAD (Ajustes para Móviles) */
        /* ------------------------------------------------------------------ */
        @media (max-width: 767.98px) {
            .footer-top .col-md-3 {
                margin-bottom: 2rem;
            }
            .footer-bottom .text-md-end {
                text-align: start !important;
                margin-top: 0.5rem;
            }
            .social-icon {
                margin-left: 0;
                margin-right: 0.5rem;
            }
        }
    </style>
    <!-- inicio -->
    <style>
        /* ------------------------------------------------------------------ */
        /* SECCIÓN INICIO SOLICITADA */
        /* ------------------------------------------------------------------ */
        #inicio {
            margin-top: 120px;
            /* 1. Aplica la altura dinámica calculada */
            height: var(--banner-dynamic-height);
            width: 100%;
            overflow: hidden; /* Evita barras de desplazamiento si hay un desbordamiento mínimo */
        }
        
        #section-body {
            /* 2. El contenedor toma el 100% del alto de la sección principal */
            width: 100%;
            height: 100%;
        }

        #section-body img {
            /* 3. La imagen ocupa todo el contenedor (#section-body) */
            width: 100%; 
            height: 100%;
            /* 4. Propiedad clave para responsividad: ajusta la imagen sin distorsionarla */
            object-fit: cover; 
            display: block;
        }
    </style>

    <style>
        /* ======================================= */
        /* CSS Base para Altura y Flexibilidad Vertical */
        /* ======================================= */
        
        /* Contenedor principal: Ocupa el 100% de la altura del viewport y usa Flexbox en columna. */
        #nosotros {
            height: 100vh;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        /* ======================================= */
        /* Fila 1 (Cabecera): 10% y Responsividad Horizontal */
        /* ======================================= */

        .section-title {
            background-color: #10999F; /* Color solicitado */
            flex-shrink: 0; /* Evita que la cabecera se reduzca */
            /* En móvil, la altura es automática para apilar los elementos (display: flex + flex-direction: column) */
            height: auto; 
            padding-top: 0.5rem; 
            padding-bottom: 0.5rem;
        }

        /* Media Query para Tablet y PC (md: 768px en Bootstrap) */
        @media (min-width: 768px) {
            .section-title {
                height: 10%; /* Fija la altura al 10% en pantallas grandes */
                padding: 0; /* Elimina padding vertical extra en PC */
            }
        }
        
        /* Aseguramos que los elementos internos en PC estén alineados */
        .header-content {
            height: 100%;
        }


        /* ======================================= */
        /* Fila 2 (Cuerpo): 90% y Adaptación de Imagen */
        /* ======================================= */
        
        #section-body {
            flex-grow: 1; /* Ocupa todo el espacio vertical restante (el 90% dinámico) */
            padding: 0 !important; /* Quitar padding de Bootstrap para que la imagen toque los bordes */
            overflow: hidden; 
        }
        
        /* Estilos de la imagen para ADAPTACIÓN RESPONSIVA */
        #section-body img {
            width: 100%;
            height: 100%;
            /* object-fit: cover asegura que la imagen cubra completamente el área sin distorsionarse */
            object-fit: cover; 
            display: block;
        }

        /* Estilos específicos para el menú en móvil */
        .navbar-nav-mobile-flex {
            display: flex;
            flex-direction: column; /* Apila los enlaces en móvil */
            width: 100%;
            text-align: center;
        }
        @media (min-width: 768px) {
            .navbar-nav-mobile-flex {
                flex-direction: row; /* Vuelve a línea en PC */
                justify-content: flex-end; /* Alinea a la derecha en PC */
            }
        }

    </style>
    
    <style>
        /* --- Estilos Personalizados --- */
        #servicios {
            background-image: url('img/servicio.png'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;            
            padding-bottom: 40px;
            height: 85vh;
        }
        /* .section-title {
            background-color: #10999F;
            padding: 15px;
        } */
        /* CAMBIO: Título principal a blanco con margen a la izquierda */
        .titulo-servicios {
            color: #FFFFFF; /* Color blanco */
            margin: 0;
            text-align: left !important; /* Asegura alineación izquierda */
            margin-left: 15px; /* Margen a la izquierda (ajusta este valor si es necesario) */
            
        }

        .boton-servicio {
            display: block; 
            aspect-ratio: 1 / 1; 
            width: 100%; 
            max-width: 150px; 
            /* border: 1px solid #ccc;  */
            border-radius: 15px; 
            margin: 0 auto;
        }

        /* CAMBIO: Subtítulos a blanco */
        .item-text {
            margin-top: 10px;
            font-size: 0.9rem;
            color: #FFFFFF; /* Color blanco */
            text-align: center;
        }
        
        /* Definición de Imágenes Normales y Hover (mantengo tus rutas originales) */
        #btn-servicio-1 { 
            background-image: url('img/boton_residencial_01.png'); 
            background-size: 100% auto;
        }
        #btn-servicio-2 { background-image: url('img/boton_pyme_01.png'); background-size: 100% auto;}
        #btn-servicio-3 { background-image: url('img/boton_corporativo_01.png'); background-size: 100% auto;}
        #btn-servicio-4 { background-image: url('img/boton_isp_01.png'); background-size: 100% auto;}

        #btn-servicio-1:hover { background-image: url('img/boton_residencial_01.png'); border: 2px solid #ffffff; }
        #btn-servicio-2:hover { background-image: url('img/boton_pyme_02.png'); border: 2px solid #ffffff; }
        #btn-servicio-3:hover { background-image: url('img/boton_corporativo_02.png'); border: 2px solid #ffffff; }
        #btn-servicio-4:hover { background-image: url('img/boton_isp_02.png'); border: 2px solid #ffffff; }
    </style>
    <style>
        section[id] {
            scroll-margin-top: 425px; 
        }
        
    </style>
    
</head>
<body>

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
                                <img src="img/icono_mirednet.svg" alt="Mi Rednet" class="nav-icon me-2" onerror="this.onerror=null;this.src='https://placehold.co/20x20/007bff/fff?text=R';" style="max-width:20px;">
                                <span>{{auth()->user()->name}}</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="miRednetDropdownLeft">
                                @if(auth()->user()->role == 'admin')
                                    <a class="dropdown-item" href="/admin/dashboard">Escritorio</a>
                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}" x-ref="profileLink">Perfil</a>
                                    <a class="dropdown-item" href="{{ route('admin.profile.edit') }}" x-ref="changePasswordLink">Cambiar Contraseña</a>
                                    <a class="dropdown-item" href="{{ route('admin.settings') }}">Configuración</a>
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
                                <a class="dropdown-item" href="#">Salir</a>
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
        <div class="w-100 my-1" style="background-color:#009b9f;">
            <div class="container">
                <!-- Desktop menu: visible en md+ (con dropdown para SERVICIOS) -->
                <nav class="menu-desktop d-md-flex justify-content-center align-items-center gap-4 py-2">
                    <a href="#inicio" data-page="inicio" class="text-white text-uppercase fs-6 mx-3">INICIO</a>
                    <a href="#nosotros" data-page="nosotros" class="text-white text-uppercase fs-6 mx-3">NOSOTROS</a>

                    <!-- SERVICIOS dropdown multinivel -->
                    <div class="dropdown mx-3">
                        <a href="#servicios" data-page="servicios" class="text-white text-uppercase fs-6 dropdown-toggle">SERVICIOS</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Residencial</a>
                            <div class="dropdown-submenu">
                                <a href="#" class="dropdown-item dropdown-toggle">Empresarial</a>
                                <div class="dropdown-menu">
                                    <a href="#" class="dropdown-item">Pyme</a>
                                    <a href="#" class="dropdown-item">Corporacion Plus</a>
                                    <a href="#" class="dropdown-item">ISP</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @auth
                    <!-- CONSULTA dropdown multinivel -->
                    <div class="dropdown mx-3">
                        <a href="#consulta" data-page="consulta" class="text-white text-uppercase fs-6 dropdown-toggle">CONSULTA</a>
                        <div class="dropdown-menu">
                            <a href="/consulta" class="dropdown-item">Mis Factura</a>
                        </div>
                    </div>
                    @endauth
                    <a href="/formadepago" class="text-white text-uppercase fs-6 mx-3">PAGUE AQUÍ</a>
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
                        <a href="#" class="text-white py-2 border-top">INICIO</a>
                        <a href="#" class="text-white py-2 border-top">NOSOTROS</a>
                        <a href="#" class="text-white py-2 border-top">SERVICIOS</a>
                        <a href="#" class="text-white py-2 border-top">PAGUE AQUÍ</a>
                    </nav>
                </div>

            </div>
        </div>    
    </nav>

    <!-- JS de Bootstrap (necesario para el colapso del menú móvil) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <main class="main-content">
        <div class="container py-4">
            
            <div class="payment-container bg-light p-4 shadow-sm rounded">
                <h3 class="mb-4" style="color: var(--color-main-footer);">
                    <i class="bi bi-wallet2 me-2"></i> Realizar Pago
                </h3>
                
                <form id="payment-form">
                    
                    <div class="mb-4 border-bottom pb-3">
                        <label class="form-label fw-bold">1. Selecciona el Monto a Pagar:</label>
                        
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentAmount" id="radioSaldoTotal" value="total" checked>
                            <label class="form-check-label" for="radioSaldoTotal">
                                Saldo total Bs. 
                                <span class="text-alert-red ms-2">Bs. 5 848,52 (USD 23,65)</span>
                            </label>
                        </div>
                        
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="paymentAmount" id="radioOtroMonto" value="partial">
                            <label class="form-check-label d-flex align-items-center" for="radioOtroMonto">
                                Otro monto Bs. 
                                <div class="input-group input-group-sm ms-3" style="width: 180px;">
                                    <span class="input-group-text">Bs.</span>
                                    <input type="number" class="form-control" id="inputOtroMonto" placeholder="Monto" disabled>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold d-block">2. Selecciona la Forma de Pago:</label>
                        
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle dropdown-toggle-custom" type="button" id="dropdownFormaPago" data-bs-toggle="dropdown" aria-expanded="false" data-payment-method="none">
                                <i class="bi bi-cash-stack"></i> Elegir forma de pago
                            </button>
                            <ul class="dropdown-menu dropdown-menu-custom" aria-labelledby="dropdownFormaPago">
                                <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="divisas"><i class="bi bi-currency-dollar"></i> Pago con Divisas</a></li>
                                <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="pago-movil"><i class="bi bi-phone-fill"></i> Reportar Pago Móvil</a></li>
                                <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="pago-movil-c2p"><i class="bi bi-qr-code-scan"></i> Pago Móvil C2P</a></li>
                                
                                <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="biopago"><i class="bi bi-fingerprint"></i> Biopago BDV</a></li>
                                <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="transferencia"><i class="bi bi-bank"></i> Reportar Transferencia Bancaria</a></li>
                            </ul>
                        </div>
                    </div>

                    <div id="payment-details-section" class="mt-5 p-3 border rounded" style="min-height: 150px; background-color: #fcfcfc;">
                        <p class="text-muted text-center pt-3">
                            Selecciona una forma de pago para ver los campos de captura de datos.
                        </p>
                    </div>

                </form>
            </div>

        </div>
    </main>

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    
                    <div class="col-12 col-md-3">
                        <img src="img/logo_rednet_WHITE.png" 
                             class="img-fluid mb-3" alt="Logo Rednet Footer">                        
                    </div>

                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                            Dirección
                        </p>
                        <p class="footer-text">
                            Av. Principal, Edificio Tech<br>
                            Piso 5, Oficina 501, Caracas, VE
                        </p>
                    </div>

                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-clock-fill me-2" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8 3.5a.5.5 0 0 0 .5-.5V7.793l2.354 2.353a.5.5 0 0 0 .708-.708l-2.75-2.75a.5.5 0 0 0-.5-.5h-2.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5.5z"/>
                            </svg>
                            Horario de atención
                        </p>
                        <p class="footer-text mb-0">LUNES - VIERNES: 8:00 a.m. - 5:00 p.m.</p>
                        <p class="footer-text">SÁBADOS: 8:00 a.m. - 2:00 p.m.</p>
                    </div>

                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-list me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                            Menú
                        </p>
                        <a href="#" class="footer-link">Inicio</a>
                        <a href="#" class="footer-link mb-4">Empresa</a>
                        
                         <p class="footer-title mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414z"/>
                                <path d="M0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                            </svg>
                            Correo
                        </p>
                        <p class="footer-text">contacto@rednetve.com</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">
                    
                    <div class="col-12 col-md-6 text-center text-md-start">
                        <span class="copyright-text">
                            Todos los derechos reservados | Rednetve 2025
                        </span>
                    </div>

                    <div class="col-12 col-md-6 text-center text-md-end mt-2 mt-md-0">
                        <a href="#" class="social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.008 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.943 0-1.29.585-1.29 1.25V8.05h2.22l-.356 2.072H10.5V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
                        </a>
                        <a href="#" class="social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16"><path d="M12.673 3.633a7.485 7.485 0 0 1-2.181.766 3.737 3.737 0 0 0-1.018-1.787 7.464 7.464 0 0 0-4.634.053 3.702 3.702 0 0 0 2.21 2.95 3.735 3.735 0 0 1-1.705-.471v.048a3.743 3.743 0 0 0 2.996 3.666A3.712 3.712 0 0 1 5.378 9.38L5.3 9.405a3.737 3.737 0 0 0 3.486 2.604 7.491 7.491 0 0 1-5.358 1.83 7.49 7.49 0 0 1-1.44-.085 10.575 10.575 0 0 0 5.093 1.488c6.115 0 9.444-5.07 9.444-9.445v-.392a6.76 6.76 0 0 0 1.57-1.638z"/></svg>
                        </a>
                        
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <script>
        // Array de Bancos (simulado)
        const banks = [
            "Seleccione Banco...",
            "Banco de Venezuela (BDV)",
            "Banco Mercantil",
            "Banesco",
            "Banco Provincial",
            "Bicentenario",
            "Otros..."
        ];

        document.addEventListener('DOMContentLoaded', function() {
            const radioSaldoTotal = document.getElementById('radioSaldoTotal');
            const radioOtroMonto = document.getElementById('radioOtroMonto');
            const inputOtroMonto = document.getElementById('inputOtroMonto');
            const dropdownButton = document.getElementById('dropdownFormaPago');
            const dropdownItems = document.querySelectorAll('.dropdown-item-custom');
            const detailsSection = document.getElementById('payment-details-section');

            // --- Lógica de Radio Buttons (Monto) ---
            function updateAmountInput() {
                if (radioOtroMonto.checked) {
                    inputOtroMonto.disabled = false;
                    inputOtroMonto.focus();
                } else {
                    inputOtroMonto.disabled = true;
                }
            }
            radioSaldoTotal.addEventListener('change', updateAmountInput);
            radioOtroMonto.addEventListener('change', updateAmountInput);

            // Función de ayuda para generar opciones de banco
            function generateBankOptions(selectedValue = "") {
                let options = banks.map(bank => 
                    `<option value="${bank}" ${bank === selectedValue ? 'selected' : ''} ${bank === "Seleccione Banco..." ? 'disabled' : ''}>${bank}</option>`
                ).join('');
                return options;
            }


            // --- Función para renderizar el contenido dinámico ---
            function renderPaymentForm(method) {
                let content = '';
                let title = '';
                
                switch (method) {
                    case 'divisas':
                        title = 'Captura de Pago con Divisas';
                        content = `
                            <p class="small-comment mb-1 fw-bold">(*) Saldo actual en Dólares ($): <span class="text-alert-red">23,65</span></p>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">(**) Fecha del pago:</label>
                                    <input type="date" class="form-control form-control-sm" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">(**) Monto a pagar en $:</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" step="0.01" min="0.01" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">Confirmación Zelle:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Código de confirmación" required>
                                <div class="form-text" style="color: var(--color-main-footer);">Ingresa el código de confirmación enviado por tu banco.</div>
                            </div>

                            <label class="form-label small fw-bold mt-3">Adjuntar Comprobante:</label>
                            <div class="image-upload-area mb-3" onclick="document.getElementById('fileDivisas').click()">
                                <i class="bi bi-image-fill"></i>
                                <input type="file" id="fileDivisas" accept=".jpg, .jpeg, .png">
                                <p class="mb-0 small fw-bold" style="color: #6c757d;">
                                    1. Haz clic aquí para adjuntar recibo de transferencia.<br>
                                    2. Formato .JPG o .JPEG o .PNG.<br>
                                    3. Tamaño máximo de la imagen: 600 kb.
                                </p>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2 mb-3">
                                <button type="button" class="btn btn-sm btn-secondary">Salir</button>
                                <button type="submit" class="btn btn-sm btn-primary">Continuar</button>
                            </div>

                            <p class="small-comment border-top pt-2">
                                (*) La conversión en dólares está calculada a la tasa del Banco Central de Venezuela (BCV) al 01/12/2025<br>
                                Recuerda realizar tu pago por zelle a la siguiente cuenta de correo electrónico: <strong>conectaconinter@inter.com.ve</strong><br>
                                Si tienes problemas para reportar tu pago con Zelle, haz clic <a href="#">aquí</a>
                            </p>
                            <p class="small-comment text-center border-top pt-2">
                                Corporación Telemic RIF. J-30240664-1. Todos los derechos reservados. 2025
                            </p>
                        `;
                        break;
                    
                    case 'pago-movil':
                        title = 'Reportar Pago Móvil';
                        content = `
                            <p class="text-danger fw-bold small">Realiza primero el pago P2C antes de reportar. <a href="#" data-bs-toggle="modal" data-bs-target="#modalPagoMovilInfo">Ver Datos de Comercio</a></p>
                            <div class="row g-3 mb-3">
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Banco origen:</label>
                                    <select class="form-select form-select-sm" required>
                                        ${generateBankOptions()}
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Código Celular:</label>
                                    <select class="form-select form-select-sm" required>
                                        <option>0412</option>
                                        <option selected>0414</option>
                                        <option>0424</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Número Celular:</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="XXXXXXX" pattern="\\d{7}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Fecha del pago móvil:</label>
                                    <input type="date" class="form-control form-control-sm" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Número de referencia:</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Ingrese 4 dígitos" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label small fw-bold">Monto Bs:</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">Bs.</span>
                                        <input type="number" class="form-control" step="0.01" min="0.01" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary">Salir</button>
                                <button type="submit" class="btn btn-sm btn-primary">Reportar pago</button>
                            </div>
                        `;
                        break;

                    case 'pago-movil-c2p':
                        title = 'Pagar con Pago Móvil C2P';
                        content = `
                            <p class="small-comment mb-1 fw-bold">Monto a pagar:</p>
                            <h4 class="text-alert-red mb-3">Bs. 5.848,52</h4>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Documento de Identidad:</label>
                                    <div class="input-group input-group-sm">
                                        <select class="form-select" style="max-width: 80px;" required>
                                            <option>V</option>
                                            <option>E</option>
                                            <option>P</option>
                                        </select>
                                        <input type="text" class="form-control" placeholder="Número" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Banco origen:</label>
                                    <select class="form-select form-select-sm" required>
                                        ${generateBankOptions()}
                                    </select>
                                </div>
                            </div>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Monto Bs:</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">Bs.</span>
                                        <input type="number" class="form-control" step="0.01" min="0.01" placeholder="0.00" value="5848.52" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Clave C2P:</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="Clave recibida por SMS" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Código Celular:</label>
                                    <select class="form-select form-select-sm" required>
                                        <option selected>0414</option>
                                        <option>0424</option>
                                        <option>0412</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">Número Celular:</label>
                                    <input type="number" class="form-control form-control-sm" placeholder="XXXXXXX" pattern="\\d{7}" required>
                                </div>
                            </div>
                            
                            <p class="small-comment border-top pt-2">
                                Guía para solicitar la clave C2P <a href="#">aquí</a><br>
                                Asegúrate de tener actualizado tu número telefónico afiliado al banco para que puedas recibir la clave C2P.
                            </p>
                            
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary">Salir</button>
                                <button type="submit" class="btn btn-sm btn-primary">Reportar pago</button>
                            </div>
                        `;
                        break;
                        
                    case 'biopago':
                        title = 'Captura de Biopago BDV';
                        content = `
                            <p class="text-secondary fw-bold">Ingrese los datos de la transacción Biopago:</p>
                            
                            <div class="mb-3">
                                <label class="form-label small fw-bold">(**) Número de Cédula:</label>
                                <div class="input-group input-group-sm">
                                    <select class="form-select" style="max-width: 80px;" required>
                                        <option>V</option>
                                        <option>E</option>
                                    </select>
                                    <input type="text" class="form-control" placeholder="C.I. (sin puntos ni guiones)" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label small fw-bold">(**) Número de Operación / Voucher:</label>
                                <input type="text" class="form-control form-control-sm" placeholder="Ingrese el número impreso en el comprobante" required>
                            </div>
                            
                            <p class="small-comment border-top pt-2">
                                Si tienes problemas para reportar tu pago con Biopago BDV, haz clic <a href="#">aquí</a>
                            </p>
                            
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary">Salir</button>
                                <button type="submit" class="btn btn-sm btn-primary">Reportar pago</button>
                            </div>
                        `;
                        break;
                        
                    case 'transferencia':
                        title = 'Reportar Transferencia Bancaria';
                        content = `
                            <p class="text-secondary fw-bold">Complete los datos de la transferencia:</p>
                            
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">(**) Banco Origen:</label>
                                    <select class="form-select form-select-sm" required>
                                        ${generateBankOptions()}
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold">(**) Banco Destino (Inter):</label>
                                    <select class="form-select form-select-sm" required>
                                        <option value="Mercantil" selected>Banco Mercantil (J302406641)</option>
                                        <option value="BDV">Banco de Venezuela (RIF XXXX)</option>
                                        <option value="Banesco">Banesco (RIF XXXX)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">(**) Fecha de la Transferencia:</label>
                                    <input type="date" class="form-control form-control-sm" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">(**) Número de Referencia:</label>
                                    <input type="text" class="form-control form-control-sm" placeholder="N° de Referencia" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label small fw-bold">(**) Monto Bs:</label>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">Bs.</span>
                                        <input type="number" class="form-control" step="0.01" min="0.01" placeholder="0.00" required>
                                    </div>
                                </div>
                            </div>
                            
                            <label class="form-label small fw-bold mt-3">Adjuntar Comprobante:</label>
                            <div class="image-upload-area mb-3" onclick="document.getElementById('fileTransferencia').click()">
                                <i class="bi bi-file-earmark-image"></i>
                                <input type="file" id="fileTransferencia" accept=".jpg, .jpeg, .png">
                                <p class="mb-0 small fw-bold" style="color: #6c757d;">
                                    1. Haz clic aquí para adjuntar recibo de transferencia.<br>
                                    2. Formato .JPG o .JPEG o .PNG.<br>
                                    3. Tamaño máximo de la imagen: 600 kb.
                                </p>
                            </div>
                            
                            <div class="d-flex justify-content-end gap-2 mt-3">
                                <button type="button" class="btn btn-sm btn-secondary">Salir</button>
                                <button type="submit" class="btn btn-sm btn-primary">Reportar pago</button>
                            </div>

                            <p class="small-comment border-top pt-2">
                                Si tienes problemas para reportar tu transferencia, haz clic <a href="#">aquí</a>
                            </p>
                        `;
                        break;
                    default:
                        content = `
                            <p class="text-muted text-center pt-3">
                                Selecciona una forma de pago para ver los campos de captura de datos.
                            </p>
                        `;
                        title = 'Captura de Datos de Pago';
                }

                detailsSection.innerHTML = `
                    <h5 class="fw-bold mb-3" style="color: var(--color-main-footer);">${title}</h5>
                    ${content}
                `;
            }

            // Manejar la selección del Dropdown
            dropdownItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const selectedMethod = this.getAttribute('data-method');
                    const selectedText = this.textContent.trim();
                    const selectedIconHtml = this.querySelector('i') ? this.querySelector('i').outerHTML : ''; 

                    // 1. Actualiza el botón del dropdown
                    dropdownButton.innerHTML = `${selectedIconHtml} ${selectedText}`;
                    dropdownButton.setAttribute('data-payment-method', selectedMethod);

                    // 2. Renderiza la sección de captura
                    renderPaymentForm(selectedMethod);
                });
            });

            // Inicializar la sección de detalles
            renderPaymentForm(dropdownButton.getAttribute('data-payment-method'));
        });
    </script>
</body>
</html>