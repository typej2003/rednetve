<div>
    <style>
        :root {
            --navbar-height: 80px; /* Asegúrate que coincida con el alto de tu navbar */
        }
        .section-inicio {
            position: relative;
            background: url('/img/fondo/inicio.jpg') no-repeat center center;
            background-size: 100% 100%;
            /* background-size: cover; */
            
            /* ALTO DINÁMICO: Pantalla completa menos Navbar */
            height: calc(100vh - var(--navbar-height));
            min-height: calc(100vh - var(--navbar-height));
            
            display: flex;
            align-items: center;
            overflow: hidden;
            padding-top: 20px; /* Ajuste interno */
        }
        .texto-esquina-inferior {
            position: absolute;
            bottom: 5px;
            left: 5px;
            z-index: 3;
            color: white;
            text-transform: uppercase;
        }

        /* Línea 1 con desplazamiento y ajuste de posición */
        .contenedor-linea-1 {
            margin-bottom: -15px; /* Un poco más de solapamiento */
            position: relative;
            z-index: 4; 
        }

        .linea-1 {
            display: inline-block;
            background-color: #009b9f;
            padding: 10px 30px; /* Un poco más de padding vertical */
            font-size: 2rem;
            font-weight: 700;
            border-radius: 15px;
            box-shadow: 4px 4px 10px rgba(0,0,0,0.3);
        }

        /* Bloque Púrpura con DEGRADADO */
        .bloque-purpura {
            /* Degradado de Púrpura sólido a transparente hacia la derecha */
            background: linear-gradient(to right, 
                rgba(154, 68, 165, 1) 0%,    /* Púrpura sólido (#9a44a5) */
                rgba(154, 68, 165, 0.8) 40%,  /* Empieza a desvanecerse */
                rgba(154, 68, 165, 0) 100%    /* Totalmente transparente */
            );
            display: inline-block;
            padding: 30px 0; 
            z-index: 2;
        }

        .linea-2 {
            padding: 5px 40px 5px 54px; /* 54px de margen izquierdo interno */
            font-size: 2.8rem;
            font-weight: 800;
            display: block;
            line-height: 1;
        }

        .linea-3 {
            padding: 5px 40px 5px 54px; /* 54px de margen izquierdo interno */
            font-size: 2rem;
            font-weight: 400;
            display: flex;
            align-items: center;
            line-height: 1;
        }

        /* Resaltado Turquesa dentro del púrpura */
        .resaltado-conectada {
            background-color: #009b9f;
            padding: 10px 25px;
            font-weight: 900;
            border-radius: 15px;
            margin-left: 15px;
            display: inline-block;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        /* Animación Slide */
        .slide-from-right {
            animation: slide-right-to-left 1.2s cubic-bezier(0.250, 0.460, 0.450, 0.940) both;
        }

        @keyframes slide-right-to-left {
            0% { transform: translateX(100vw); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }

        /* Ajuste para móviles */
        @media (max-width: 768px) {
            .texto-esquina-inferior { left: 0; bottom: 20px; }
            .linea-1 { font-size: 1.4rem; }
            .linea-2 { font-size: 1.8rem; padding-left: 25px; }
            .linea-3 { font-size: 1.4rem; padding-left: 25px; }
            .bloque-purpura { padding: 15px 0; }
        }
    </style>
       
    <style>
        

        .section-nosotros {
            position: relative;
            background: url('/img/fondo/Nosotros.jpg') no-repeat center center;
            background-size: cover;
            
            /* ALTO DINÁMICO: Pantalla completa menos Navbar */
            height: calc(100vh - var(--navbar-height));
            min-height: calc(100vh - var(--navbar-height));
            
            display: flex;
            align-items: center;
            overflow: hidden;
            padding-top: 20px; /* Ajuste interno */
        }

        /* Ajuste para que el contenido no se desborde */
        .content-nosotros {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Cinta de título superior */
        .cinta-titulo {
            position: absolute;
            top: 0; /* Pegada al inicio de la sección (debajo del navbar) */
            left: 0;
            background-color: #009b9f; 
            color: white;
            padding: 8px 60px 8px 40px;
            z-index: 3;
            box-shadow: 4px 4px 10px rgba(0,0,0,0.1);
            clip-path: polygon(0% 0%, 100% 0%, 92% 50%, 100% 100%, 0% 100%);
            border: 1px solid grey;
        }

        .cinta-titulo h2 {
            margin: 0;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.3rem;
        }

        .texto-nosotros {
            font-size: 1.25rem;
            line-height: 1.6;
            color: #000000;
            text-align: justify;
            font-weight: 500;
        }

        .texto-nosotros::first-letter {
            font-size: 4.5rem;
            font-weight: 900;
            float: left;
            margin-right: 12px;
            line-height: 0.8;
            color: #009b9f;
            text-transform: uppercase;
        }

        .icon-nosotros {
            max-width: 80px; /* Tamaño reducido de 130px a 80px */
            height: auto;
            margin-bottom: 1.5rem;
            display: block; /* Asegura que respete el margen inferior */
            filter: drop-shadow(0px 2px 4px rgba(0,0,0,0.1));
            transition: transform 0.3s ease;
        }

        /* Efecto opcional: se agranda sutilmente al pasar el mouse */
        .icon-nosotros:hover {
            transform: scale(1.05);
        }

        .texto-nosotros {
            font-size: 1.15rem; /* Reducido ligeramente para equilibrar con el icono */
            line-height: 1.7;
            color: #000000;
            text-align: justify;
        }

        /* Responsividad para móviles */
        @media (max-width: 991px) {
            .section-nosotros {
                height: auto; /* En móviles es mejor que crezca según el contenido */
                min-height: calc(100vh - var(--navbar-height));
                padding: 80px 0 40px 0;
            }
        }
    </style>

    <style>
        /* Estilos generales para todas las secciones de pantalla completa */
        .full-page-section {
            height: calc(100vh - var(--navbar-height)); /* Altura de pantalla - Navbar */
            min-height: calc(100vh - var(--navbar-height));
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 80px; /* Espacio para la cinta de título */
        }
        @media (max-width: 991px) {
            .full-page-section {
                height: auto;
                min-height: calc(100vh - var(--navbar-height));
                padding: 100px 0 60px 0;
            }
        }

        /* Cinta de título (reutilizada, pero la defino una vez) */
        .cinta-titulo {
            position: absolute;
            top: 0;
            left: 0;
            background-color: #009b9f; /* Turquesa */
            color: white;
            padding: 8px 60px 8px 40px;
            z-index: 3;
            box-shadow: 4px 4px 10px rgba(0,0,0,0.1);
            clip-path: polygon(0% 0%, 100% 0%, 92% 50%, 100% 100%, 0% 100%);
        }

        .cinta-titulo h2 {
            margin: 0;
            font-weight: 800;
            letter-spacing: 2px;
            font-size: 1.3rem;
        }

        /* Sección de Servicios */
        .section-servicios {
            background: url('/img/fondo/servicios.jpg') no-repeat center center;
            background-size: cover;
            flex-direction: column; /* Para centrar el contenido verticalmente */
            justify-content: center;
        }

        .content-servicios {
            position: relative;
            z-index: 2;
            width: 100%;
        }

        /* Capa oscura si la imagen de fondo de servicios necesita más contraste para texto blanco */
        .section-servicios .overlay-dark {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.4); /* Opacidad del 40% */
            z-index: 1;
        }

        /* Estilos de las imágenes de servicios */
        .service-link {
            text-decoration: none;
            color: inherit;
            display: block;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        .service-link:hover {
            transform: translateY(-5px);
            color: #009b9f; /* Color al pasar el ratón */
        }

        .service-img {
            max-width: 150px; /* Tamaño máximo para las imágenes de servicio */
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.3s ease;
            background-color: rgba(255, 255, 255, 0.8); /* Fondo blanco semitransparente */
            padding: 10px;
        }

        .service-link:hover .service-img {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3), 0 0 0 3px #009b9f; /* Sombra y borde al hover */
        }

        .service-subtitle {
            margin-top: 10px;
            font-weight: bold;
            color: white; /* Subtítulos en blanco */
            text-shadow: 1px 1px 3px rgba(0,0,0,0.6); /* Sombra para legibilidad */
        }

        /* Adaptación para pantallas pequeñas */
        @media (max-width: 576px) {
            .service-img {
                max-width: 120px;
            }
            .service-subtitle {
                font-size: 0.9rem;
            }
        }
    </style>
    <style>
        /* Para móviles */
        @media (max-width: 480px) {
            .section-inicio {
                /* background: url('/img/fondo/inicio_mobil.jpg') no-repeat center center; */
                /* background-size: cover; */
            }
            .texto-esquina-inferior {
                position: absolute;
                top: 0px;
            }
            .section-nosotros {
                background: url('/img/fondo/Nosotros.jpg') no-repeat center center;
            }
            .section-servicios {
                background: url('/img/fondo/servicios.jpg') no-repeat center center;
                
            }

            section[id] {
                scroll-margin-top: 142px !important; 
            }
        }
        /* Para escritorio */
        @media (max-width: 1024px) {
            section[id] {
                scroll-margin-top: 142px !important; 
            }
        }
    </style>
<div id="main-wrapper">
    <section id="inicio" class="full-page-section section-inicio">
        <div class="overlay-inicio"></div>

        <div class="container h-100 position-relative content-inicio">
            
            <div class="texto-esquina-inferior slide-from-right">
                <div class="contenedor-linea-1">
                    <span class="linea-1">TU EMPRESA</span>
                </div>
                
                <div class="bloque-purpura">
                    <div class="linea-2">Con REDNET</div>
                    <div class="linea-3">
                        está <span class="resaltado-conectada">+ CONECTADA</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="nosotros" class="full-page-section section-nosotros">
        <div class="cinta-titulo">
            <h2>NOSOTROS</h2>
        </div>

        <div class="overlay-clear"></div>
        
        <div class="container content-nosotros">
            <div class="row align-items-center">
                <div class="col-lg-6"></div>

                <div class="col-lg-6 text-center text-lg-start">
                    <div class="nosotros-card">
                        <img src="{{ asset('img/icon_only.png') }}" alt="Icono RedNet" class="mb-4 icon-nosotros">
                        
                        <p class="texto-nosotros">
                            Somos una empresa con altos estándares de calidad, tecnología de vanguardia y debidamente habilitada para prestar servicios de telecomunicaciones en todo el país.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="servicios" class="full-page-section section-servicios">
        <div class="cinta-titulo">
            <h2>SERVICIOS</h2>
        </div>

        <div class="overlay-clear"></div>
        
        <div class="container content-servicios">
            <h2 class="text-center text-white mb-5">NUESTROS PLANES</h2>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4 justify-content-center">
                <div class="col text-center">
                    <a href="#" class="service-link">
                        <img src="{{ asset('img/boton_residencial_01.jpg') }}" alt="Residencial" class="service-img img-fluid mb-2">
                        <h5 class="service-subtitle">Residencial</h5>
                    </a>
                </div>

                <div class="col text-center">
                    <a href="#" class="service-link">
                        <img src="{{ asset('img/boton_pyme_01.jpg') }}" alt="Pyme" class="service-img img-fluid mb-2">
                        <h5 class="service-subtitle">Pyme</h5>
                    </a>
                </div>

                <div class="col text-center">
                    <a href="#" class="service-link">
                        <img src="{{ asset('img/boton_corporativo_01.jpg') }}" alt="Corporación Plus" class="service-img img-fluid mb-2">
                        <h5 class="service-subtitle">Corporación Plus</h5>
                    </a>
                </div>

                <div class="col text-center">
                    <a href="#" class="service-link">
                        <img src="{{ asset('img/boton_isp_01.jpg') }}" alt="ISP" class="service-img img-fluid mb-2">
                        <h5 class="service-subtitle">ISP</h5>
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
</div>