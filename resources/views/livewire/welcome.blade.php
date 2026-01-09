<div>
    @livewire('layouts.components.whatsapp')
<div id="main-wrapper">
    <style>
        :root {
            /* Ajusta este valor al alto real de tu navbar */
            --navbar-height: 110px; 
            --rednet-turquesa: #009b9f;
            --rednet-azul: #162661;
            --rednet-purpura: #9a44a5;
        }

        /* CONFIGURACIÓN GLOBAL DE SECCIONES */
        html {
            scroll-behavior: smooth;
        }

        section[id] {
            /* Esto garantiza que al hacer clic en el menú, la sección encaje perfecto */
            scroll-margin-top: var(--navbar-height);
        }

        .full-page-section {
            width: 100%;
            height: calc(100vh - var(--navbar-height));
            min-height: 600px;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
        }

        /* CINTA DE TÍTULO UNIVERSAL */
        .cinta-titulo {
            position: absolute;
            top: 20px;
            left: 0;
            background-color: var(--rednet-turquesa);
            color: white;
            padding: 8px 60px 8px 40px;
            z-index: 10;
            box-shadow: 4px 4px 10px rgba(0,0,0,0.1);
            clip-path: polygon(0% 0%, 100% 0%, 92% 50%, 100% 100%, 0% 100%);
        }

        .cinta-titulo h2 {
            margin: 0;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.3rem;
            text-transform: uppercase;
        }

        /* --- SECCIÓN INICIO --- */
        .section-inicio {
            background: url('/img/fondo/inicio.jpg') no-repeat center center;
            background-size: cover;
        }

        .texto-esquina-inferior {
            position: absolute;
            bottom: 40px;
            left: 5px;
            z-index: 5;
            color: white;
        }

        .linea-1 {
            display: inline-block;
            background-color: var(--rednet-turquesa);
            padding: 10px 30px;
            font-size: 2rem;
            font-weight: 700;
            border-radius: 15px;
            margin-bottom: -10px;
            position: relative;
            z-index: 6;
        }

        .bloque-purpura {
            background: linear-gradient(to right, var(--rednet-purpura) 0%, rgba(154, 68, 165, 0) 100%);
            padding: 30px 54px;
            display: block;
        }

        .linea-2 { font-size: 2.8rem; font-weight: 800; line-height: 1; }
        .linea-3 { font-size: 2rem; font-weight: 400; display: flex; align-items: center; }

        .resaltado-conectada {
            background-color: var(--rednet-turquesa);
            padding: 5px 15px;
            border-radius: 10px;
            margin-left: 10px;
            font-weight: 900;
        }

        /* --- SECCIÓN NOSOTROS --- */
        .section-nosotros {
            background: url('/img/fondo/Nosotros.jpg') no-repeat center center;
            background-size: cover;
        }

        .texto-nosotros {
            font-size: 1.15rem;
            line-height: 1.7;
            text-align: justify;
            color: #333;
        }

        .texto-nosotros::first-letter {
            font-size: 4rem;
            font-weight: 900;
            float: left;
            margin-right: 10px;
            color: var(--rednet-turquesa);
        }

        /* --- SECCIÓN MAPA --- */
        .section-mapa {
            background-color: #f8f9fa;
        }
        .map-container {
            border: 5px solid white;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* --- SECCIÓN SERVICIOS --- */
        .section-servicios {
            background: url('/img/fondo/servicios.jpg') no-repeat center center;
            background-size: cover;
            color: white;
        }

        .service-img {
            max-width: 180px;
            transition: transform 0.3s ease;
            border-radius: 15px;
            background: white;
            padding: 10px;
        }

        .service-link:hover .service-img {
            transform: scale(1.05);
            box-shadow: 0 0 20px var(--rednet-turquesa);
        }

        /* RESPONSIVIDAD */
        @media (max-width: 991px) {            
            :root { --navbar-height: 144px; }
            .full-page-section { height: auto; padding: 100px 0 60px 0; }
            .linea-2 { font-size: 2rem; }
            .linea-3 { font-size: 1.4rem; flex-direction: column; align-items: flex-start; }
            .resaltado-conectada { margin-left: 0; margin-top: 10px; }

            .texto-esquina-inferior {
                position: absolute;
                top: 50%;
                left: 5px;
                z-index: 5;
                color: white;
            }
        }

        /* Animación de entrada desde la derecha */
        .slide-from-right {
            animation: slide-right-to-left 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @keyframes slide-right-to-left {
            0% { 
                transform: translateX(100vw); 
                opacity: 0; 
            }
            60% {
                opacity: 1;
            }
            100% { 
                transform: translateX(0); 
                opacity: 1; 
            }
        }

        /* Efecto opcional para que el bloque púrpura aparezca con un pequeño retraso */
        .bloque-purpura {
            animation: fade-in 1.5s ease-in-out;
        }

        @keyframes fade-in {
            0% { opacity: 0; }
            100% { opacity: 1; }
        }
    </style>

    <section id="inicio" class="full-page-section section-inicio">
        <div class="container position-relative h-100">
            <div class="texto-esquina-inferior slide-from-right">
                <span class="linea-1">TU EMPRESA</span>
                <div class="bloque-purpura">
                    <div class="linea-2">Con REDNET</div>
                    <div class="linea-3">está <span class="resaltado-conectada">+ CONECTADA</span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="nosotros" class="full-page-section section-nosotros">
        <div class="cinta-titulo"><h2>Nosotros</h2></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-none d-lg-block"></div>
                <div class="col-lg-6">
                    <img src="{{ asset('img/icon_only.png') }}" class="mb-4" style="width: 80px;">
                    <p class="texto-nosotros">
                        Somos una empresa con altos estándares de calidad, tecnología de vanguardia y debidamente habilitada para prestar servicios de telecomunicaciones en todo el país. Nos enfocamos en conectar personas y negocios con la máxima estabilidad.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="mapa" class="full-page-section section-mapa">
        <div class="cinta-titulo"><h2>Ubicación</h2></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="btn-group mb-4 w-100 shadow-sm">
                        @foreach($sedes as $nombre => $dir)
                            <button type="button" 
                                    class="btn btn-white border {{ $direccionActual == $dir ? 'active btn-primary' : '' }}" 
                                    wire:click="cambiarSede('{{ $nombre }}')">
                                {{ $nombre }}
                            </button>
                        @endforeach
                    </div>
                    <div class="map-container rounded overflow-hidden">
                        <iframe width="100%" height="450" frameborder="0" style="border:0" 
                            src="https://maps.google.com/maps?q={{ urlencode($direccionActual) }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios" class="full-page-section section-servicios">
        <div class="cinta-titulo"><h2>Servicios</h2></div>
        <div class="container text-center">
            <div class="row row-cols-1 row-cols-md-3 g-5 justify-content-center">
                <div class="col">
                    <a href="/pyme" class="service-link text-decoration-none">
                        <img src="{{ asset('img/boton_pyme_01.jpg') }}" class="service-img img-fluid mb-3 shadow">
                        <h4 class="text-white fw-bold">PYME</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="/corporacionplus" class="service-link text-decoration-none">
                        <img src="{{ asset('img/boton_corporativo_01.jpg') }}" class="service-img img-fluid mb-3 shadow">
                        <h4 class="text-white fw-bold">CORPORATIVO</h4>
                    </a>
                </div>
                <div class="col">
                    <a href="/isp" class="service-link text-decoration-none">
                        <img src="{{ asset('img/boton_isp_01.jpg') }}" class="service-img img-fluid mb-3 shadow">
                        <h4 class="text-white fw-bold">ISP</h4>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
</div>