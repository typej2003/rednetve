<div id="footer-root">
    <footer class="footer-section mt-0">
        <div class="footer-top py-5 border-bottom border-secondary">
            <div class="container">
                <div class="row g-4">
                    
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <img src="{{ asset('img/logo_rednet_WHITE.png') }}" class="img-fluid mb-3" style="max-height: 60px;" alt="RedNetVe" onerror="this.src='https://placehold.co/200x60/333/fff?text=RedNetVe'">
                    </div>

                    <div class="col-12 col-md-3">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <i class="bi bi-geo-alt-fill me-2" style="color: #009a9e;"></i>
                            Dirección
                        </h6>
                        <div class="small text-center text-md-start">
                            <p class="mb-3"><strong>Caracas:</strong> Av. Eugenio Mendoza, Torre Banco Lara - Oficina DP1.</p>
                            <p><strong>San Antonio del Táchira:</strong> Carrera 6 entre calle 4 y 5, Edif Kamaday - Local 1.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <i class="bi bi-clock-fill me-2" style="color: #009a9e;"></i>
                            Atención
                        </h6>
                        <p class="small mb-0 text-uppercase">Lunes - Viernes</p>
                        <p class="small text-white fw-bold">8:30 a.m. - 4:30 p.m.</p>
                    </div>

                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <i class="bi bi-envelope-fill me-2" style="color: #009a9e;"></i>
                            Correo
                        </h6>
                        <p class="small mb-0">rednetcaracas@gmail.com</p>
                        <p class="small ">rednettachira@gmail.com</p>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom py-4">
            <div class="container">
                <div class="row align-items-center g-3">
                    <div class="col-12 col-md-4 text-center text-md-start">
                        <small>© {{ date('Y') }} <strong>Rednetve</strong>. Todos los derechos reservados.</small>
                    </div>
                    <div class="col-12 col-md-4 d-flex justify-content-center gap-3">
                        <a href="#" class="social-circle"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="social-circle"><i class="bi bi-tiktok"></i></a>
                        <a href="#" class="social-circle"><i class="bi bi-twitter-x"></i></a>
                        <a href="#" class="social-circle"><i class="bi bi-youtube"></i></a>
                    </div>
                    <div class="col-12 col-md-4 text-center text-md-end">
                        <img src="{{ asset('img/wifiexpres_01.png') }}" alt="Wifi Expres" style="max-height: 30px; opacity: 0.7;">
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <style>
        .footer-section {
            background-color: #162661;
            color: #fff;
            transition: margin-left 0.3s ease-in-out; /* Animación suave igual que el main */
        }
        
        /* LÓGICA DE MARGEN EN ESCRITORIO */
        @media (min-width: 992px) {
            .footer-section {
                margin-left: var(--sidebar-width); /* Empieza con el ancho del aside expandido */
            }
            
            /* Si el sidebar está minimizado, el footer se expande */
            body:has(#sidebarMenu.is-minimized) .footer-section {
                margin-left: var(--sidebar-collapsed-width);
            }
        }

        .footer-bottom {
            background-color: #101c4e;
        }
        .social-circle {
            width: 40px;
            height: 40px;
            background-color: #009a9e;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            transition: transform 0.3s ease, background-color 0.3s ease;
        }
        .social-circle:hover {
            transform: translateY(-3px);
            background-color: #162661;
            color: white;
            border: 1px solid #ffff;
        }

        @media (max-width: 991px) {   
            .text-uppercase {
                margin-bottom: 5px !important;
            }         
            .footer-section {
                margin-left: 0 !important; /* En móvil siempre ocupa el 100% */
            }
        }
    </style>
</div>