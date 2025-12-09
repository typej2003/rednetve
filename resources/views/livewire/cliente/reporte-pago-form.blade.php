<div>
    <h1>{{ $metodo }}</h1>
    <form id="payment-form" wire:submit.prevent="procesar" method="post">
                            
        <div class="mb-4 border-bottom pb-3">
            <label class="form-label fw-bold">Monto a Pagar Bs. {{ $saldo }} (USD {{ $saldodolares }})</label>
            
        </div>

        <div class="mb-4">
            <label class="form-label fw-bold d-block">1. Selecciona la Forma de Pago:</label>
            
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

        <div id="payment-details-section" class="mt-5 p-3 border rounded" style="min-height: 150px; background-color: #fcfcfc;" wire:ignore>
            <p class="text-muted text-center pt-3">
                Selecciona una forma de pago para ver los campos de captura de datos.
            </p>
        </div>

    </form>
    @livewireScripts
 
    <script>
        window.addEventListener('livewire:load', function () {
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
            let saldo = @this.saldo;
            let saldodolares = @this.saldodolares;

            document.addEventListener('DOMContentLoaded', function() {
                const dropdownButton = document.getElementById('dropdownFormaPago');
                const dropdownItems = document.querySelectorAll('.dropdown-item-custom');
                const detailsSection = document.getElementById('payment-details-section');

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

                    @this.set('metodo', method)

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
                                    Corporación Rednetve RIF. J-000000000-1. Todos los derechos reservados. 2025
                                </p>
                            `;
                            break;
                        
                        case 'pago-movil':
                            title = 'Reportar Pago Móvil';
                            content = `
                                <input type="hidden" wire:model.defer="state.metodo" value="pagomovil">
                                <p class="text-danger fw-bold small">Realiza primero el pago P2C antes de reportar. <a href="#" data-bs-toggle="modal" data-bs-target="#modalPagoMovilInfo">Ver Datos de Comercio</a></p>
                                <div class="row g-3 mb-3">
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold">Banco origen:</label>
                                        <select wire:model.defer="state.bancoOrigen" class="form-select form-select-sm" required>
                                            ${generateBankOptions()}
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Código Celular:</label>
                                        <select wire:model.defer="state.cellphonecode" class="form-select form-select-sm" required>
                                            <option>0412</option>
                                            <option selected>0414</option>
                                            <option>0424</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Número Celular:</label>
                                        <input wire:model.defer="state.cellphone" value="04165800403" type="number" class="form-control form-control-sm" placeholder="XXXXXXX" pattern="\\d{7}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Fecha del pago móvil:</label>
                                        <input wire:model.defer="state.fecha" type="date" value="12/12/2025" class="form-control form-control-sm" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small fw-bold">Número de referencia:</label>
                                        <input wire:model.defer="state.operacion" value="1234" type="text" class="form-control form-control-sm" placeholder="Ingrese 4 dígitos" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="form-label small fw-bold">Monto Bs:</label>
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-text">Bs.</span>
                                            <input id="bs" wire:model.defer="state.bs" value="" type="text" class="form-control" step="0.01" min="0.01" placeholder="0.00" required>
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

                    const inputBs = document.getElementById('bs')
                    if(inputBs){
                        console.log('elemento creado');
                        inputBs.addEventListener('input', function() {
                            console.log("Nuevo valor del monto:", this.value);
                            // También podrías enviar esto a Livewire si fuera necesario:
                            @this.set('state.bs', this.value, true); // El 'true' opcional puede forzar un evento

                        });
                    }
                    
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

        });
    </script>
 
</div>
