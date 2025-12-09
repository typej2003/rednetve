<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RedNetVe</title>
    
    <!-- Enlace a Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjHh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <link rel="stylesheet" href="/css/css_rednetve.css">
    
    <link rel="stylesheet" href="{{ asset('/css/element_3D.css') }}">
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
        <div class="w-100 my-1" style="background-color:#009b9f;">
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
                            <a href="/consultafacturas" class="dropdown-item">Mis Factura (consultas)</a>
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
    
    <main class="">
        <!-- EL CÓDIGO DE LA SECCIÓN INICIO SOLICITADA -->
        <section id="inicio">
            <div id="inicio_container" class="section-body container-fluid p-0">
                <!-- Nota: La ruta 'img/banner_empresa.jpg' no se cargará en este entorno. Se usa un placeholder. -->
                <img class="imagen-fondo" src="img/banner_empresa.jpg" alt="Banner de la empresa" onerror="this.src='https://placehold.co/1920x800/2980b9/ffffff?text=Error+al+cargar+img/banner_empresa.jpg'">
            </div>
        </section>
        <section id="nosotros">        
            <!-- Fila 1: Título y Menú (section-title) -->
            <div class="section-title">
                <div class="row header-content">
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h2 class="text-white fw-bold fs-4 mb-0 mx-3 text-truncate">
                            NOSOTROS
                        </h2>
                    </div>                    
                    <!-- Columna Derecha: Menú (80% en PC/Tablet, 100% en Móvil) -->
                    <!-- En móvil, usa col-12. En PC, usa col-md-9 (cercano al 80%) y alineado a la derecha. -->
                    <div class="col-12 col-md-9">
                        <nav class="navbar navbar-expand-md d-none">
                            <div class="container-fluid justify-content-center justify-content-md-end p-0">
                                <!-- Los botones de menú se colapsan si es necesario (aunque aquí usamos una nav simple) -->
                                <ul class="navbar-nav navbar-nav-mobile-flex">
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Contacto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Acerca de</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Fila 2: Contenido Principal (section-body) - 90% de Altura -->
            <div class="section-body container-fluid p-0">
                <!-- La imagen ocupa el 100% del ancho y el 100% de la altura de este div (el 90% dinámico) -->
                <img 
                    src="img/Nosotros.jpg" 
                    alt="Imagen representativa de la sección Nosotros" 
                    onerror="this.onerror=null; this.src='https://placehold.co/1920x1080/004d40/ffffff?text=IMAGEN+NOSOTROS+RESPONSIVE';"
                >
            </div>
        </section>
        <section id="disfruta">
            <div class="section-body">
                <!-- Nota: La ruta 'img/banner_empresa.jpg' no se cargará en este entorno. Se usa un placeholder. -->
                <img src="img/disfruta.jpg" 
                    alt="Banner disfruta"
                    onerror="this.src='https://placehold.co/1920x800/2980b9/ffffff?text=Error+al+cargar+img/banner_empresa.jpg'">
            </div>
        </section>

        <!-- Sección de Título, Fondo y Menú (section-title) -->
        <section id="servicios">

            <div class="row section-title">
                <!-- Asignamos la clase personalizada 'titulo-servicios' y eliminamos 'text-center' -->
                <div class="col-12">
                    <h2 class="text-white fw-bold fs-4 mb-0 mx-3 text-truncate">
                        SERVICIOS
                    </h2>
                </div>
            </div>
            
            <div class="row justify-content-center g-3 h-100">
                
                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                    <a href="/residencial" class="boton-servicio margin-auto" id="btn-servicio-1" role="button" aria-label="Servicio 1"></a>
                    <p class="item-text">Residencial</p>
                </div>

                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                    <a href="/pyme" class="boton-servicio" id="btn-servicio-2" role="button" aria-label="Servicio 2"></a>
                    <p class="item-text">Pyme</p>
                </div>

                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                    <a href="/corporacionplus" class="boton-servicio" id="btn-servicio-3" role="button" aria-label="Servicio 3"></a>
                    <p class="item-text">Corporación Plus</p>
                </div>

                <div class="col-3 d-flex flex-column justify-content-center align-items-center">
                    <a href="/isp" class="boton-servicio" id="btn-servicio-4" role="button" aria-label="Servicio 4"></a>
                    <p class="item-text">ISP</p>
                </div>

            </div>
        </section>
        
        <section id="cobertura">        
            <!-- Fila 1: Título y Menú (section-title) -->
            <div class="section-title" class="container-fluid">
                <div class="row header-content align-items-center">
                    
                    <!-- Columna Izquierda: Título (20% en PC/Tablet, 100% en Móvil) -->
                    <!-- En móvil, usa col-12 y centrado. En PC, usa col-md-3 (cercano al 20%) y alineado a la izquierda. -->
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h2 class="text-white fw-bold fs-4 mb-0 mx-3 text-truncate">
                            
                        </h2>
                    </div>
                    
                    <!-- Columna Derecha: Menú (80% en PC/Tablet, 100% en Móvil) -->
                    <!-- En móvil, usa col-12. En PC, usa col-md-9 (cercano al 80%) y alineado a la derecha. -->
                    <div class="col-12 col-md-9">
                        <nav class="navbar navbar-expand-md d-none">
                            <div class="container-fluid justify-content-center justify-content-md-end p-0">
                                <!-- Los botones de menú se colapsan si es necesario (aunque aquí usamos una nav simple) -->
                                <ul class="navbar-nav navbar-nav-mobile-flex">
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Inicio</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Servicios</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Contacto</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-white fw-medium px-3" href="#">Acerca de</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Fila 2: Contenido Principal (section-body) - 90% de Altura -->
            <div id="" class="section-body container-fluid p-0">
                <!-- La imagen ocupa el 100% del ancho y el 100% de la altura de este div (el 90% dinámico) -->
                <img 
                    src="img/cobertura.png" 
                    alt="Imagen representativa de la sección Nosotros" 
                    onerror="this.onerror=null; this.src='https://placehold.co/1920x1080/004d40/ffffff?text=IMAGEN+NOSOTROS+RESPONSIVE';"
                >
            </div>
        </section>
        
    </main>

    <!-- COMPONENTE FOOTER -->
    <footer>
        <!-- FILA 1: 4 COLUMNAS (Logo, Dirección, Horario, Menú/Correo) -->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    
                    <!-- Columna 1: Logo -->
                    <div class="col-12 col-md-3">
                        <img src="img/logo_rednet_WHITE.png" 
                             class="img-fluid mb-3" alt="Logo Rednet Footer">                        
                    </div>

                    <!-- Columna 2: Dirección -->
                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                            <!-- Icono de ubicación -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                            Dirección
                        </p>
                        <p class="footer-text">
                            Caracas: Av. Eugenio Mendoza<br>
                            Torre Banco Lara - mzz Oficina DP1
                        </p>
                        <br>
                        <p class="footer-text">
                            San Antonio del Tachira: Carrera 6<br>
                            Entre calle 4 y 5 - Edif Kamaday <br>
                            Local 1 - Municipio Bolívar
                        </p>
                    </div>

                    <!-- Columna 3: Horario de Atención -->
                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                             <!-- Icono de reloj -->
                             <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-clock-fill me-2" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8 3.5a.5.5 0 0 0 .5-.5V7.793l2.354 2.353a.5.5 0 0 0 .708-.708l-2.75-2.75a.5.5 0 0 0-.5-.5h-2.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5.5z"/>
                            </svg>
                            Horario de atención
                        </p>
                        <!-- Lunes - Viernes -->
                        <p class="footer-text mb-0">LUNES - VIERNES <br> 8:30 a.m. - 4:30 p.m.</p>
                        <!-- Sábados -->
                        
                    </div>

                    <!-- Columna 4: Menú y Correo -->
                    <div class="col-12 col-md-3">
                        <p class="footer-title">
                            <!-- Icono de lista -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-list me-2" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                            Menú
                        </p>
                        <!-- Inicio -->
                        <a href="#" class="footer-link">Inicio</a>
                        <!-- Empresa -->
                        <a href="#" class="footer-link mb-4">Empresa</a>
                        
                        <!-- Icono de carta y Correo -->
                         <p class="footer-title mt-3">
                            <!-- Icono de carta -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414z"/>
                                <path d="M0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                            </svg>
                            Correo
                        </p>
                        <p class="footer-text">rednetcaracas@gmail.com <br>rednettachira@gmail.com</p>
                    </div>

                </div>
            </div>
        </div>

        <!-- FILA 2: COPYRIGHT Y REDES SOCIALES (Dos Columnas) -->
        <div class="footer-bottom">
            <div class="container">
                <div class="row align-items-center">                    
                    <!-- Columna 1: Derechos Reservados -->
                    <div class="col-12 col-md-4 text-center text-md-start">
                        <span class="text-white">
                            Todos los derechos reservados | Rednetve 2025
                        </span>
                    </div>

                    <!-- Columna 2: Redes Sociales -->
                    <div class="col-12 col-md-4 text-center text-md-end mt-2 mt-md-0 d-flex justify-content-center gap-2">
                        <!-- Facebook -->
                        <a href="#" class="social-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16"><path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.008 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.943 0-1.29.585-1.29 1.25V8.05h2.22l-.356 2.072H10.5V16c3.824-.604 6.75-3.934 6.75-7.951"/></svg>
                        </a>
                       

                        <!-- Icono SVG de Instagram -->
 <a href="#" class="social-icon">
                        <svg xmlns="www.w3.org" width="40" height="40" viewBox="0 0 40 40">
                            <circle cx="20" cy="20" r="20" fill="#009a9e"/>
                            <!-- SVG del icono centrado como elemento de imagen o similar -->
                            <svg x="8" y="8" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="#FFFFFF" d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89H8.025v-2.833h2.413V9.77c0-2.387 1.436-3.708 3.593-3.708.879 0 1.554.064 1.768.093v2.44h-1.48c-1.155 0-1.378.547-1.378 1.353v1.765h2.828l-.454 2.833H13.04v6.988C17.381 21.05 21 16.921 21 12.02S16.52 2 12 2zm0 13a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                            </svg>
                        </svg>
</a>



                        <!-- Icono SVG de TikTok -->
 <a href="#" class="social-icon">
                        <svg xmlns="www.w3.org" width="40" height="40" viewBox="0 0 40 40">
    <circle cx="20" cy="20" r="20" fill="#009a9e"/>
    <!-- SVG del icono centrado como elemento de imagen o similar -->
    <svg x="8" y="8" width="24" height="24" viewBox="0 0 24 24">
        <path fill="#FFFFFF" d="M12.525 2.1C14.73 2.1 14.935 2.1 14.935 2.1H17.75V4.92H14.935C14.935 4.92 14.935 4.92 14.935 4.92C14.935 4.92 14.935 7.155 14.935 9.18C14.935 11.205 14.935 11.41 14.935 11.41C14.935 11.41 14.935 11.41 14.935 11.41C14.935 11.41 12.525 11.41 10.315 11.41V14.23H14.935C14.935 14.23 17.75 14.23 17.75 14.23V17.05H14.935C14.935 17.05 14.935 19.46 14.935 21.67H12.12C12.12 19.46 12.12 17.05 12.12 17.05C12.12 17.05 9.49 17.05 7.28 17.05V14.23H12.12V11.41H7.28V8.59H12.12V5.77H7.28V2.95H12.525V2.1Z"/>
    </svg>
</svg>

</a>
                        <!-- Icono SVG de X -->
 <a href="#" class="social-icon">
                        <svg xmlns="www.w3.org" width="40" height="40" viewBox="0 0 40 40">
    <circle cx="20" cy="20" r="20" fill="#009a9e"/>
     <!-- SVG del icono centrado como elemento de imagen o similar -->
    <svg x="8" y="8" width="24" height="24" viewBox="0 0 24 24">
        <path fill="#FFFFFF" d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
    </svg>
</svg>
</a>

                        <!-- Icono SVG de YouTube -->
 <a href="#" class="social-icon">
                       <svg xmlns="www.w3.org" width="40" height="40" viewBox="0 0 40 40">
    <circle cx="20" cy="20" r="20" fill="#009a9e"/>
     <!-- SVG del icono centrado como elemento de imagen o similar -->
    <svg x="8" y="8" width="24" height="24" viewBox="0 0 24 24">
        <path fill="#FFFFFF" d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.539 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.539-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
    </svg>
</svg>

           </a>             
                    </div>

                    <div class="col-12 col-md-4 text-center text-md-start">
                        <span class="copyright-text">
                            <img src="/img/wifiexpres_01.png" alt="" class="img-fluid mb-3">
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </footer>

</body>
<script src="{{ asset('/js/element_3D.js') }}"></script>
</html>