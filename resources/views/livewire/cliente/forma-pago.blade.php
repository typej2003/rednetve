<div>
@livewire('layouts.navbar-rednetve')
    <main class="main-content">
        <div class="container py-4">

            <div class="row mb-4">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <img src="https://placehold.co/600x200/10999F/white?text=PROMOCION+1" class="img-fluid rounded shadow-sm" alt="Promoción 1">
                </div>
                <div class="col-12 col-md-6">
                    <img src="https://placehold.co/600x200/10999F/white?text=PROMOCION+2" class="img-fluid rounded shadow-sm" alt="Promoción 2">
                </div>
            </div>
            
            <hr>

            <div class="content">
                <div class="container py-4">
            
                    <div class="payment-container bg-light p-4 shadow-sm rounded">
                        <h3 class="mb-4" style="color: var(--color-main-footer);">
                            <i class="bi bi-wallet2 me-2"></i> Realizar Pago XXX
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
            </div>            
            
        </div>
    </main>

@livewire('layouts.footer-rednetve')
</div>