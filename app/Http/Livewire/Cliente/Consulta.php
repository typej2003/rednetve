<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Facturas;

class Consulta extends Component
{
    public function render()
    {

        $facturas = Facturas::where('user_id', auth()->user()->id)->paginate();

        if(count($facturas) > 0)
        {
            $registro = $facturas->last();
            $saldo = $registro->saldo;
            $saldodolares = $saldo;
        }else{
            $saldo = 0;
            $saldodolares = 0;
        }
        
        return view('livewire.cliente.consulta', ['facturas' => $facturas, 'saldo' => $saldo, 'saldodolares' => $saldodolares, ]);
    }
}
