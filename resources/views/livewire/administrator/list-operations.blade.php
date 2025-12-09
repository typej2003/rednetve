<div>
    <style>
        .main-content {
            margin-top: 10px !important;
        }
    </style>
    <main class="main-content">
        <div class="container py-2">

            <hr>
            
            <div class="row">
                <div class="col-12">
                    
                    <h5 class="info-text-custom fw-bold mb-3">Detalle de Movimientos</h5>
                        <div class="row">
                            
                                <div class="mb-3 col-md-4 col-lg-4">
                                    <label for="fechaDesde" class="form-label">Fecha Desde:</label>
                                    <input wire:model="fechaDesde" type="date" id="fechaDesde" name="fechaDesde" class="form-control" wire:ignore>
                                </div>

                                <div class="mb-3 col-md-4 col-lg-4" wire:ignore>
                                    <label for="fechaHasta" class="form-label">Fecha Hasta:</label>
                                    <input wire:model = "fechaHasta" type="date" id="fechaHasta" name="fechaHasta" class="form-control">
                                    
                                    <div id="errorMsg" class="invalid-feedback" style="display: none;">
                                        ⚠️ La fecha 'Hasta' no puede ser anterior a la fecha 'Desde'.
                                    </div>
                                    <script>
                                        // 1. Obtener la fecha de hoy en formato YYYY-MM-DD
                                        function getFechaHoy() {
                                            const hoy = new Date();
                                            // Obtener componentes
                                            const year = hoy.getFullYear();
                                            // month se basa en 0 (0 = enero, 11 = diciembre), por eso se suma 1
                                            const month = (hoy.getMonth() + 1).toString().padStart(2, '0'); 
                                            const day = hoy.getDate().toString().padStart(2, '0');
                                            
                                            return `${year}-${month}-${day}`;
                                        }

                                        // 2. Obtener los elementos del DOM
                                        const fechaDesdeInput = document.getElementById('fechaDesde');
                                        const fechaHastaInput = document.getElementById('fechaHasta');
                                        const errorMsg = document.getElementById('errorMsg');

                                        // Opcional: Establecer el valor inicial (si no lo hace Livewire o Blade)
                                        // fechaDesdeInput.value = getFechaHoy(); 

                                        // 3. Establecer la fecha máxima para "Fecha Desde" (LA SOLUCIÓN)
                                        fechaDesdeInput.max = getFechaHoy();


                                        // 4. Función de validación (Mantenida sin cambios)
                                        function validarFechas() {
                                            const fechaDesde = fechaDesdeInput.value;
                                            const fechaHasta = fechaHastaInput.value;
                                            
                                            // Solo proceder si ambos campos tienen valor
                                            if (fechaDesde && fechaHasta) {
                                                // Al crear objetos Date, asegúrate de que el formato sea YYYY-MM-DD para evitar errores de zona horaria
                                                const dateDesde = new Date(fechaDesde);
                                                const dateHasta = new Date(fechaHasta);

                                                if (dateHasta < dateDesde) {
                                                    // Si hay error:
                                                    errorMsg.style.display = 'block';
                                                    fechaHastaInput.classList.add('is-invalid'); 
                                                    fechaHastaInput.setCustomValidity("La fecha Hasta no puede ser anterior a la fecha Desde"); 
                                                    return false;
                                                } else {
                                                    // Si es válido:
                                                    errorMsg.style.display = 'none';
                                                    fechaHastaInput.classList.remove('is-invalid');
                                                    fechaHastaInput.setCustomValidity(""); 
                                                    return true;
                                                }
                                            }
                                        }

                                        // 5. Agregar escuchadores de eventos
                                        fechaDesdeInput.addEventListener('change', () => {
                                            // 1. Sigue previniendo que 'Fecha Hasta' sea menor que 'Fecha Desde'
                                            fechaHastaInput.min = fechaDesdeInput.value;
                                            // 2. Validar si ya hay una fecha 'Hasta' seleccionada
                                            validarFechas();
                                        });

                                        fechaHastaInput.addEventListener('change', validarFechas);

                                    </script>
                                </div>
                                <div class="mb-3 col-md-4 col-lg-4" wire:ignore>
                                    <div class="d-flex justify-content-end gap-2 mt-md-4">                 
                                        <button 
                                            wire:click="imprimirReporte" 
                                            class="btn btn-danger mx-2" 
                                            title="Generar Reporte PDF">
                                            <i class="fa fa-solid fa-file-pdf mx"></i>
                                        </button>

                                        <button 
                                            wire:click="exportarExcel" 
                                            class="btn btn-success" 
                                            title="Exportar a Excel">
                                            <i class="fa fa-solid fa-file-excel"></i>
                                        </button>

                                    </div>
                                </div>
                        </div> 

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive shadow-sm">
                                <table class="table table-bordered table-striped align-middle">
                                    <thead class="table-header-custom">
                                        <tr>
                                            <th scope="col">N°</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Origen</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col">USD</th>
                                            <th scope="col">PTR</th>
                                            <th scope="col">Bs</th>
                                            <th scope="col">Saldo</th>
                                            <th scope="col">Imprimir</th>
                                        </tr>
                                    </thead>
                                    <tbody wire:loading.class="text-muted">
                                        @forelse ($facturas as $index => $factura)
                                        <tr>
                                            <th scope="row">{{ $facturas->firstItem() + $index }}</th>
                                            <td>
                                                {{ $factura->tipo }}
                                            </td>
                                            <td>
                                                {{ $factura->origen }}
                                            </td>
                                            <td>
                                                {{ $factura->fecha }}
                                            </td>
                                            <td>
                                                {{ $factura->usd }}
                                            </td>
                                            <td>
                                                {{ $factura->ptr }}
                                            </td>
                                            <td>
                                                {{ $factura->bs }}
                                            </td>
                                            <td>
                                                {{ $factura->saldo }}
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
                            {{ $facturas->links() }}
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
</div>