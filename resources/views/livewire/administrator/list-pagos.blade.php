<div>
    <style>
        .main-content {
            margin-top: 10px !important;
        }
    </style>
    <style>
        /* Contenedor principal menu desplegable con ico*/
        .dropdown {
        position: relative;
        display: inline-block;
        font-family: Arial, sans-serif;
        width: 160px; /* Ancho fijo para el control */
        }

        /* Botón (Simula el campo select) */
        .dropdown-button {
        background-color: #fff; /* Fondo blanco */
        color: #333; /* Texto oscuro */
        border: 1px solid #ccc; /* Borde gris claro */
        padding: 10px 15px;
        font-size: 14px;
        cursor: pointer;
        border-radius: 4px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        text-align: left;
        }

        /* Flecha de indicador */
        .arrow {
        margin-left: 10px;
        font-size: 8px;
        transition: transform 0.3s;
        }

        /* Rotar la flecha cuando el menú está abierto (usando JS para agregar la clase 'open') */
        .dropdown.open .arrow {
            transform: rotate(180deg);
        }


        /* Contenido del menú desplegable */
        .dropdown-content {
        /* Se usará JS para mostrarlo y ocultarlo, no :hover */
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 100%;
        box-shadow: 0px 4px 8px 0px rgba(0,0,0,0.1);
        border: 1px solid #ccc; /* Borde del menú */
        border-top: none; /* Elimina el borde superior para que se vea pegado al botón */
        z-index: 10;
        max-height: 200px; /* Altura máxima para permitir scroll */
        overflow-y: auto;
        left: 0;
        right: 0;
        }

        /* Mostrar contenido cuando el contenedor tiene la clase 'open' */
        .dropdown.open .dropdown-content {
            display: block;
        }

        /* Estilo de cada opción/ítem */
        .dropdown-item {
        color: #333;
        padding: 10px 15px;
        text-decoration: none;
        display: flex;
        align-items: center;
        white-space: nowrap;
        }

        .icon {
        margin-right: 8px;
        font-size: 16px;
        }

        /* Efecto hover */
        .dropdown-item:hover {
        background-color: #f0f0f0;
        color: #000;
        }
    </style>
    <main class="main-content">
        <div class="container py-2">

            <hr>
            
            <div class="row">
                <div class="col-12">
                    
                    <h5 class="info-text-custom fw-bold mb-3">Detalle de Pagos</h5>
                        <div class="row">
                            
                                <div class="mb-3 col-md-3 col-lg-3">
                                    <label for="fechaDesde" class="form-label">Fecha Desde:</label>
                                    <input wire:model="fechaDesde" type="date" id="fechaDesde" name="fechaDesde" class="form-control" wire:ignore>
                                </div>

                                <div class="mb-3 col-md-3 col-lg-3" wire:ignore>
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

                                <div class="mb-3 col-md-3 col-lg-3 pt-0" wire:ignore>
                                    <label for="fechaDesde" class="form-label">Método:</label>
                                    <div class="dropdown" id="paymentDropdown">
                                        <input type="hidden" wire:model="metodo" value="{{ $metodo }}">
                                        <button class="dropdown-button">
                                            <span wire:model="metodo" id="selectedOption"><span class="icon">🌍</span> Todos</span>
                                            <span class="arrow">▼</span>
                                        </button>
                                        <div class="dropdown-content">
                                            <a href="#" class="dropdown-item" data-value="todos">
                                            <span class="icon">🌍</span> Todos
                                            </a>
                                            <a href="#" class="dropdown-item" data-value="biopago">
                                            <span class="icon">🏦</span> Biopago BDV
                                            </a>
                                            <a href="#" class="dropdown-item" data-value="pago-movil">
                                            <span class="icon">📱</span> Pago Móvil
                                            </a>
                                            <a href="#" class="dropdown-item" data-value="zelle">
                                            <span class="icon">💵</span> Zelle
                                            </a>
                                            <a href="#" class="dropdown-item" data-value="transferencia">
                                            <span class="icon">🔄</span> Transferencia
                                            </a>
                                        </div>
                                    </div>                                    
                                </div>
                                
                                <div class="mb-3 col-md-2 col-lg-2" wire:ignore>
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
                                                <select class="form-control" wire:change="changeStatus({{ $pago }}, $event.target.value)">
                                                    <option value="aprobado" {{ ($pago->status === 'aprobado') ? 'selected' : '' }}>APROBADO</option>
                                                    <option value="noconfirmado" {{ ($pago->status === 'noconfirmado') ? 'selected' : '' }}>NO CONFIRMADO</option>
                                                    <option value="rechazado" {{ ($pago->status === 'rechazado') ? 'selected' : '' }}>RECHAZADO</option>
                                                </select>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
        const dropdown = document.getElementById('paymentDropdown');
        const button = dropdown.querySelector('.dropdown-button');
        const selectedOptionSpan = document.getElementById('selectedOption');
        const items = dropdown.querySelectorAll('.dropdown-item');

        // Función para alternar la visibilidad del menú
        button.addEventListener('click', function() {
            dropdown.classList.toggle('open');
        });

        // Función para manejar la selección de una opción
        items.forEach(item => {
            item.addEventListener('click', function(e) {
            e.preventDefault(); // Previene la navegación del enlace (<a>)

            // 1. Obtener los datos
            const value = this.getAttribute('data-value');

            @this.set('metodo', value)

            const text = this.textContent.trim();

            // 2. Actualizar el texto visible en el botón
            selectedOptionSpan.textContent = text;
            
            // Aquí puedes agregar la lógica para usar el 'value' (ej. filtrar)
            console.log('Opción seleccionada (Valor):', value);
            
            // 3. Cerrar el menú
            dropdown.classList.remove('open');
            });
        });

        // Cerrar el menú si se hace clic fuera del mismo
        document.addEventListener('click', function(e) {
            if (!dropdown.contains(e.target)) {
            dropdown.classList.remove('open');
            }
        });
        });
    </script>
</div>