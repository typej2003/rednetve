<?php
// app/Exports/FacturasExport.php

namespace App\Exports;

use App\Models\Facturas;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrosExport implements FromCollection
{
    protected $desde;
    protected $hasta;

    public function __construct($desde, $hasta)
    {
        $this->desde = $desde;
        $this->hasta = $hasta;
    }

    public function collection()
    {
        // La lógica de consulta es la misma
        return Facturas::where('tipo', 'PAGO')
            ->whereBetween('fecha', [$this->desde, $this->hasta])
            ->get();
            // Opcional: añade ->select(['id', 'fecha_emision', 'monto']) si quieres columnas específicas
    }
}