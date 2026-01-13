<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-lg p-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/logo_rednet.png') }}" alt="RedNet Logo" style="max-height: 60px;">
                </div>

                @if($enviado)
                    <div class="text-center py-5 animate__animated animate__fadeIn">
                        <div class="mb-3">
                            <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                        </div>
                        <h2 class="fw-bold" style="color: #162661;">¡Gracias por tu solicitud!</h2>
                        <p class="text-muted">Hemos recibido tus datos correctamente. Nuestro equipo se pondrá en contacto contigo pronto.</p>
                        
                        <button wire:click="resetForm" class="btn btn-outline-secondary rounded-pill px-4">Solicitar otra reunión</button>
                    </div>
                @else
                    <h4 class="text-center fw-bold mb-4" style="color: #162661;">Solicitar una Reunión</h4>
                    
                    <form wire:submit.prevent="guardarCita">
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Nombre Completo</label>
                            <input type="text" wire:model="nombre_completo" class="form-control @error('nombre_completo') is-invalid @enderror" placeholder="Ej: Juan Pérez">
                            @error('nombre_completo') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Teléfono</label>
                                <input type="text" wire:model="telefono" class="form-control @error('telefono') is-invalid @enderror">
                                @error('telefono') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label small fw-bold">Email</label>
                                <input type="email" wire:model="email" class="form-control @error('email') is-invalid @enderror">
                                @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label small fw-bold">Dirección del Servicio</label>
                            <textarea wire:model="direccion_servicio" class="form-control @error('direccion_servicio') is-invalid @enderror" rows="2"></textarea>
                            @error('direccion_servicio') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold">Fecha</label>
                                <input type="date" wire:model="fecha" class="form-control @error('fecha') is-invalid @enderror">
                                @error('fecha') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label small fw-bold">Hora</label>
                                <input type="time" wire:model="hora" class="form-control @error('hora') is-invalid @enderror">
                                @error('hora') <span class="invalid-feedback">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="d-grid mt-4">
                            <button type="submit" class="btn rounded-pill fw-bold text-white py-2 shadow-sm" style="background-color: #0a9aa0;">
                                AGENDAR REUNIÓN <i class="bi bi-chevron-right ms-2"></i>
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>