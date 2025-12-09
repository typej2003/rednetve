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

            <div class="row mb-4">
                <div class="col-12">
                    <h4 class="fw-bold">
                        <span class="info-text-custom">Tu saldo es: </span> 
                        <span class="text-alert-red">Bs. {{$saldo}} (USD {{$saldodolares}})</span>
                    </h4>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    
                    <h5 class="info-text-custom fw-bold mb-3">Detalle de Pagos</h5>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive shadow-sm">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-header-custom">
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Método</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">Operación/Ref</th>
                                            <th scope="col">Teléfono</th>
                                            <th scope="col">Banco</th>
                                            <th scope="col">Bs</th>
                                            <th scope="col">Usd</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Imprimir</th>
                                        </tr>
                                    </thead>
                                    <tbody wire:loading.class="text-muted">
                                        @forelse ($pagos as $index => $pago)
                                        <tr>
                                            <th scope="row">{{ $pagos->firstItem() + $index }}</th>
                                            <td>
                                                {{ $pago->metodo }}
                                            </td>
                                            <td>
                                                {{ $pago->fecha }}
                                            </td>
                                            <td>
                                                {{ $pago->operacion }}
                                            </td>
                                            <td>
                                                {{ $pago->cellphonecode }}-{{ $pago->cellphone }}
                                            </td>
                                            <td>
                                                {{ $pago->bancoOrigen }}
                                            </td>
                                            <td>
                                                {{ $pago->bs }}
                                            </td>
                                            <td>
                                                {{ $pago->usd }}
                                            </td>
                                            <td>
                                                {{ $pago->status }}
                                            </td>
                                            <td>
                                                <a href="#">PDF</a>
                                            </td>                                            
                                        </tr>

                                        @empty
                                        <tr class="text-center">
                                            <td colspan="9">
                                                <img src="https://42f2671d685f51e10fc6-b9fcecea3e50b3b59bdc28dead054ebc.ssl.cf5.rackcdn.com/v2/assets/empty.svg" alt="No results found">
                                                <p class="mt-2">No se encontro resultados</p>
                                            </td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                        <div class="card-footer d-flex justify-content-end">
                            {{ $pagos->links() }}
                        </div>
                    </div>
                    <p class="info-text-custom mt-3 mb-1">
                        (*) La conversión en dólares está calculada a la tasa del Banco Central de Venezuela (BCV) al 01/12/2025
                    </p>
                    
                    <p class="text-alert-red">
                        Documentos pendientes de pago
                    </p>
                </div>
            </div>
        </div>
    </main>
@livewire('layouts.footer-rednetve')
