<div>
    <footer class="footer-section mt-0">
        <div class="footer-top py-5 border-bottom border-secondary">
            <div class="container">
                <div class="row g-4">
                    
                    <div class="col-12 col-md-3 text-center text-md-start">
                        <img src="{{ asset('img/logo_rednet_WHITE.png') }}" class="img-fluid mb-3" style="max-height: 60px;" alt="RedNetVe" onerror="this.src='https://placehold.co/200x60/333/fff?text=RedNetVe'">
                    </div>

                    <div class="col-12 col-md-3">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#009a9e" class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
                            </svg>
                            Dirección
                        </h6>
                        <div class="small text-center text-md-start">
                            <p class="mb-3"><strong>Caracas:</strong> Av. Eugenio Mendoza, Torre Banco Lara - Oficina DP1.</p>
                            <p><strong>San Antonio del Táchira:</strong> Carrera 6 entre calle 4 y 5, Edif Kamaday - Local 1.</p>
                        </div>
                    </div>

                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#009a9e" class="bi bi-clock-fill me-2" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-8 3.5a.5.5 0 0 0 .5-.5V7.793l2.354 2.353a.5.5 0 0 0 .708-.708l-2.75-2.75a.5.5 0 0 0-.5-.5h-2.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5.5z"/>
                            </svg>
                            Atención
                        </h6>
                        <p class="small mb-0 text-uppercase">Lunes - Viernes</p>
                        <p class="small text-white fw-bold">8:30 a.m. - 4:30 p.m.</p>
                    </div>

                    <div class="col-12 col-md-3 text-center text-md-start">
                        <h6 class="text-uppercase fw-bold mb-3 d-flex align-items-center justify-content-center justify-content-md-start">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="#009a9e" class="bi bi-envelope-fill me-2" viewBox="0 0 16 16">
                                <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                            </svg>
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
                        <small class="">© {{ date('Y') }} <strong>Rednetve</strong>. Todos los derechos reservados.</small>
                    </div>

                    <div class="col-12 col-md-4 d-flex justify-content-center gap-3">
                        <a href="#" class="social-circle">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="#" class="social-circle">
                            <i class="bi bi-tiktok"></i>
                        </a>
                        <a href="#" class="social-circle">
                            <i class="bi bi-twitter-x"></i>
                        </a>
                        <a href="#" class="social-circle">
                            <i class="bi bi-youtube"></i>
                        </a>
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
            background-color: #007b7e;
            color: white;
        }

        @media (max-width: 991px) {   
            .text-uppercase {
                margin-bottom: 5px !important;
            }         
        }
    </style>
</div>