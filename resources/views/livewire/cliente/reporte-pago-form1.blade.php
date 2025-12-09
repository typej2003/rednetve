<div>
    <h1>Version 2 {{ $metodo }}</h1>
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
                    <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="zelle"><i class="bi bi-currency-dollar"></i> Pago con Divisas</a></li>
                    <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="pago-movil"><i class="bi bi-phone-fill"></i> Reportar Pago Móvil</a></li>
                    <!-- <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="pago-movil-c2p"><i class="bi bi-qr-code-scan"></i> Pago Móvil C2P</a></li> -->
                    
                    <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="biopago"><i class="bi bi-fingerprint"></i> Biopago BDV</a></li>
                    <!-- <li><a class="dropdown-item dropdown-item-custom" href="#" data-method="transferencia"><i class="bi bi-bank"></i> Reportar Transferencia Bancaria</a></li> -->
                </ul>
            </div>
        </div>

        <div id="payment-details-section" class="mt-5 p-3 border rounded" style="min-height: 150px; background-color: #fcfcfc;">
            @if($metodo === 'zelle')
                @include('livewire.cliente.pago-divisas-form') 
            @endif
            @if($metodo === 'pago-movil')
                @include('livewire.cliente.pago-movil-form')
            @endif
            @if($metodo === 'biopago')
                @include('livewire.cliente.biopago-form')
            @else

                <p class="text-muted text-center pt-3">
                    Selecciona una forma de pago para ver los campos de captura de datos.
                </p>
            @endif
        </div>

    </form>
    @livewireScripts
 
    <script>
        window.addEventListener('livewire:load', function () {
            
            
            let saldo = @this.saldo;
            let saldodolares = @this.saldodolares;

            document.addEventListener('DOMContentLoaded', function() {
                const dropdownButton = document.getElementById('dropdownFormaPago');
                const dropdownItems = document.querySelectorAll('.dropdown-item-custom');
                const detailsSection = document.getElementById('payment-details-section');

                


                // --- Función para renderizar el contenido dinámico ---
                function renderPaymentForm(method) {
                    let content = '';
                    let title = '';

                    @this.set('metodo', method)                    
                    
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
                // renderPaymentForm(dropdownButton.getAttribute('data-payment-method'));
                
                
            });

        });
    </script>
 
</div>
