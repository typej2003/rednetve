<div class="container-fluid py-4">
    <div class="card shadow">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold" style="color: #162661;">Gestión de Citas</h5>
        </div>
        
        <div class="card-body">
            <div class="row g-3 mb-4">
                <div class="col-md-4">
                    <input type="text" wire:model="searchNombre" class="form-control" placeholder="Buscar por nombre...">
                </div>
                <div class="col-md-3">
                    <input type="text" wire:model="searchTelefono" class="form-control" placeholder="Buscar por teléfono...">
                </div>
                <div class="col-md-3">
                    <select wire:model="searchServicio" class="form-select">
                        <option value="">Todos los servicios</option>
                        <option value="Pyme">Pyme</option>
                        <option value="Corporativo">Corporativo</option>
                        <option value="ISP">ISP</option>
                    </select>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Fecha/Hora</th>
                            <th>Cliente</th>
                            <th>Contacto</th>
                            <th>Servicio</th>
                            <th>Dirección</th>
                            <th width="180px">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($citas as $cita)
                            <tr>
                                <td>
                                    <div class="fw-bold">{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</div>
                                    <small class="text-muted">{{ $cita->hora }}</small>
                                </td>
                                <td>{{ $cita->nombre_completo }}</td>
                                <td>
                                    <div><i class="bi bi-telephone me-1"></i> {{ $cita->telefono }}</div>
                                    <small class="text-muted">{{ $cita->email }}</small>
                                </td>
                                <td>
                                    <span class="badge rounded-pill bg-info text-dark">{{ $cita->servicio }}</span>
                                </td>
                                <td>
                                    <small>{{ Str::limit($cita->direccion_servicio, 40) }}</small>
                                </td>
                                <td>
                                    <select 
                                        wire:change="actualizarEstado({{ $cita->id }}, $event.target.value)"
                                        class="form-select form-select-sm {{ $cita->atendida ? 'border-success text-success' : 'border-danger text-danger' }}"
                                    >
                                        <option value="0" {{ !$cita->atendida ? 'selected' : '' }}>❌ No Atendida</option>
                                        <option value="1" {{ $cita->atendida ? 'selected' : '' }}>✅ Atendida</option>
                                    </select>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">No se encontraron citas con los filtros aplicados.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 d-flex justify-content-center">
                {{ $citas->links() }}
            </div>
        </div>
    </div>
</div>