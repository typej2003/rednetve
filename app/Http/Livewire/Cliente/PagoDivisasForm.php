<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;

use App\Models\Tasa;

class PagoDivisasForm extends Component
{
    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.cliente.pago-divisas-form');
    }
}
