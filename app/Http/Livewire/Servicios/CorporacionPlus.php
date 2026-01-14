<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;

class CorporacionPlus extends Component
{
    public function render()
    {
        
        return view('livewire.servicios.corporacion-plus')
                ->layout('layouts.guest');
    }
}