<div>
    <input type="hidden" wire:model.defer="state.metodo" value="pago-movil">
    <p class="text-danger fw-bold small">Realiza primero el pago P2C antes de reportar. <a href="#" data-bs-toggle="modal" data-bs-target="#modalPagoMovilInfo">Ver Datos de Comercio</a></p>
    <div class="row g-3 mb-3">
        <div class="col-md-12">
            <label class="form-label small fw-bold">Banco origen:</label>
            <select class="form-select form-select-sm" id="pagoMovilBanco" 
                wire:model.defer="state.banco_origen" required>
            
                {{-- Iteramos sobre el array de bancos pasado desde el contenedor principal --}}
                @foreach($banks as $bank)
                    <option value="{{ $bank }}" {{ $loop->first ? 'disabled' : '' }}>
                        {{ $bank }}
                    </option>
                @endforeach
                
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
            <input wire:model.defer="state.fecha" type="date" value="" class="form-control form-control-sm" required>
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

</div>
