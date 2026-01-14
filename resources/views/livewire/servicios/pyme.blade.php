<div>
<section class="pyme-section-full">
    <div class="pyme-top-bar">
        <div class="container-fluid px-0">
            <span class="pyme-label ms-5">PYME</span>
        </div>
    </div>

    <div class="hero-rednet-zero">
        <div class="container-fluid h-100 p-0 m-0">
            <div class="row g-0 h-100 align-items-center">
                <div class="col-lg-6"></div>

                <div class="col-lg-6 col-md-12">
                    <div class="content-box-flush text-md-start text-center">
                        <h2 class="fw-bold mb-4 title-pyme-color text-center">
                            PLANES PARA PEQUEÑAS <br>
                            EMPRESAS, EMPRENDEDORES <br>
                            ENTRE OTROS
                        </h2>

                        <div class="d-flex align-items-center justify-content-md-start justify-content-center gap-3">
                            <img src="{{ asset('img/solicitar_reunión.png') }}" 
                                 alt="Icono" 
                                 style="width: 45px;">

                            <a href="/solicitarcita/pyme" class="btn btn-reunion-final rounded-pill px-4 py-2 fw-bold text-white text-uppercase">
                                Solicitar una reunión <span class="ms-2">></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Eliminamos cualquier margen del cuerpo que pueda interferir */

    .container-fluid {
        margin: 0 !important;
        padding: 0 !important;
    }
    .pyme-section-full {
        margin-top: 30px !important;
        padding: 0 !important;
        width: 100vw;
        overflow-x: hidden;
    }

    /* Franja Superior */
    .pyme-top-bar {
        background-color: #162661;
        padding: 10px 0;
        width: 100%;
    }

    .pyme-label {
        color: #ffffff;
        font-weight: 800;
        font-size: 1rem;
        letter-spacing: 3px;
        display: inline-block;
    }

    /* Hero con imagen ocupando TODO */
    .hero-rednet-zero {
        background: url("{{ asset('img/fondo/pyme_rednet.jpg') }}") no-repeat center center;
        background-size: cover;
        height: 85vh; /* Ocupa casi toda la pantalla */
        width: 100%;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Forzamos que la fila no tenga márgenes internos */
    .row.g-0 {
        margin: 0 !important;
        padding: 0 !important;
    }

    /* COLOR DE LAS LETRAS IGUAL A LA FRANJA */
    .title-pyme-color {
        color: #162661; /* El color azul marino solicitado */
        line-height: 1.1;
        font-weight: 900 !important;
        
    }

    /* Botón Turquesa */
    .btn-reunion-final {
        background-color: #0a9aa0;
        border: none;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .btn-reunion-final:hover {  
        background-color: #162661;
    }

    /* Contenedor de texto sin márgenes forzados de Bootstrap */
    .content-box-flush {
        padding-right: 10%; /* Espacio solo a la derecha para que no pegue al borde */
    }

    @media (max-width: 991px) {
        .content-box-flush {
            padding: 40px 20px;
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            margin: 0; /* Sin márgenes en móvil */
        }
        .title-pyme-color {
            font-size: 2rem;
        }

        .pyme-section-full {
            margin-top: 16px !important;
        }
    }
</style>
</div>