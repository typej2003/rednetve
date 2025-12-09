<?php

namespace App\Http\Livewire\Administrator;

use App\Exports\RegistrosExport; // 1. Importar la clase de exportación
use Maatwebsite\Excel\Facades\Excel; // 2. Importar el Facade de Excel

use Livewire\Component;
use App\Models\Facturas;
use Carbon\Carbon;

use PDF; // Asegúrate de importar el Facade si no está cargado automáticamente

class ListOperations extends Component
{
    public $fechaDesde;
    public $fechaHasta;

    public function mount()
    {
        
        $this->fechaDesde = Carbon::now()->format('Y-m-d');
        $this->fechaHasta = Carbon::now()->format('Y-m-d');

    }

    // Método que se llama al hacer clic en el botón "Imprimir/Generar PDF"
    public function imprimirReporte()
    {
        // ... [1. Validaciones y Definición de Fechas] ...
        
        $fechaDesde = Carbon::parse($this->fechaDesde)->startOfDay();
        $fechaHasta = Carbon::parse($this->fechaHasta)->endOfDay();

        // 2. Consulta de facturas
        // $facturas = Facturas::where('tipo', 'PAGO')
        //     ->whereBetween('fecha', [$fechaDesde, $fechaHasta])
        //     ->get();

        $registros = Facturas::where('tipo', 'PAGO')
                    ->whereBetween('fecha', [$fechaDesde, $fechaHasta])
                    ->with('user') // <-- CARGA LA RELACIÓN DE USUARIO AQUÍ
                    ->get();

        // 3. Generar el PDF
        $pdf = PDF::loadView('reportes.reporte_registros_pdf', [
            'registros' => $registros,
            'fechaDesde' => $this->fechaDesde,
            'fechaHasta' => $this->fechaHasta,
        ]);

        // 4. Devolver la respuesta de descarga
        $nombreArchivo = 'Registros' . date('Y-m-d') . '.pdf';

        // **ESTO ES LO CRUCIAL:** Usar el método stream() de Dompdf
        // envuelto en una respuesta de descarga de Laravel.
        return response()->streamDownload(function() use ($pdf) {
            echo $pdf->stream();
        }, $nombreArchivo);
    }

    public function exportarExcel()
    {
        // 1. Validar las fechas antes de exportar
        $this->validate([
            'fechaDesde' => 'required|date',
            'fechaHasta' => 'required|date|after_or_equal:desde',
        ]);
        
        // 2. Definir el nombre del archivo
        $nombreArchivo = 'Registros_Pagos_' . date('Ymd') . '.xlsx';

        // 3. Devolver la instancia de descarga
        return Excel::download(
            new RegistrosExport($this->fechaDesde, $this->fechaHasta),
            $nombreArchivo
        );
    }

    public function render()
    {

        $facturas = Facturas::query();
        $facturas = $facturas->where('tipo', 'PAGO');

        if($this->fechaDesde)
        {
            $facturas = $facturas->whereBetween('fecha', [$this->fechaDesde, $this->fechaHasta]);
        }

        $facturas = $facturas->paginate();

        if(count($facturas) > 0)
        {
            $registro = $facturas->last();
            $saldo = $registro->saldo;
            $saldodolares = $saldo;
        }else{
            $saldo = 0;
            $saldodolares = 0;
        }
        
        return view('livewire.administrator.list-operations', ['facturas' => $facturas, 'fechaDesde' => $this->fechaDesde]);

    }
}
