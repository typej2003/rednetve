<div>
    <p class="small-comment mb-1 fw-bold">(*) Saldo actual en Dólares ($): <span class="text-alert-red">{{ $saldodolares }}</span></p>
    <input type="hidden" wire:model.defer="state.metodo" value="zelle">
    <div class="row g-3 mb-3">
        <div class="col-md-6">
            <label class="form-label small fw-bold">(**) Fecha del pago:</label>
            <input wire:model.defer="state.fecha" type="date" value="" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-6">
            <label class="form-label small fw-bold">(**) Monto a pagar en $:</label>
            <div class="input-group input-group-sm">
                <span class="input-group-text">$</span>
                <input wire:model.defer="state.usd" type="number" class="form-control" step="0.01" min="0.01" placeholder="0.00" required>
            </div>
        </div>
    </div>
    
    <div class="mb-3">
        <label class="form-label small fw-bold">Confirmación Zelle:</label>
        <input wire:model.defer="state.codigoconfirmacionzelle" type="text" class="form-control form-control-sm" placeholder="Código de confirmación" required>
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
        Recuerda realizar tu pago por zelle a la siguiente cuenta de correo electrónico: <strong>conecta@rednetve.com.ve</strong><br>
        Si tienes problemas para reportar tu pago con Zelle, haz clic <a href="#">aquí</a>
    </p>
    <p class="small-comment text-center border-top pt-2">
        Corporación Rednetve RIF. J-000000000-1. Todos los derechos reservados. 2025
    </p>
</div>
