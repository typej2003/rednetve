<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;

class Pyme extends Component
{
    public function render()
    {
        return view('livewire.servicios.pyme')
        ->layout('layouts.guest');
    }
}
