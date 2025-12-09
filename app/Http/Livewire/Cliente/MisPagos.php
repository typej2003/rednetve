<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Pago;

class MisPagos extends Component
{
    public $sortColumnName = 'created_at';

    public $sortDirection = 'desc';

    public $saldo;
    public $saldodolares;

    public function render()
    {
        $this->saldo = auth()->user()->saldo()['saldo'];
        $this->saldodolares = auth()->user()->saldo()['saldodolares'];

        $pagos = Pago::where('user_id', auth()->user()->id)
                    ->orderBy($this->sortColumnName, $this->sortDirection)
                    ->paginate(15);

        return view('livewire.cliente.mis-pagos', ['pagos' => $pagos, ]);
    }
}
