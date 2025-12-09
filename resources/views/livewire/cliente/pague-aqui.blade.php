<div>
    @livewire('layouts.navbar-rednetve')    
    <main class="main-content">
        <div class="container py-4">

            <div class="row mb-4">
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <img style="width: 100%;" src="/img/banner_residencial1.jpg" onerror="this.onerror=null; this.src='/img/noimage.png'" class="img-pagueaqui1 img-fluid rounded shadow-sm" alt="Promoción 1">
                </div>
                <div class="col-12 col-md-6">
                    <img style="width: 100%;" src="/img/banner_empresa.jpg" onerror="this.onerror=null; this.src='/img/noimage.png'" class="img-pagueaqui2 img-fluid rounded shadow-sm" alt="Promoción 2">
                </div>
            </div>
            
            <hr>

            <div class="content">
                <div class="container py-4">
            
                    <div class="payment-container bg-light p-4 shadow-sm rounded">
                        <h3 class="mb-4" style="color: var(--color-main-footer);">
                            <i class="bi bi-wallet2 me-2"></i> Realizar Pago
                        </h3>
                        
                        @livewire('cliente.reporte-pago-form1')
                        
                    </div>

                </div>
            </div>         
            
        </div>
        
    </main>
    @livewire('layouts.footer-rednetve')
</div>