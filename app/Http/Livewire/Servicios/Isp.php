<?php

namespace App\Http\Livewire\Servicios;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Isp extends Component
{
    public function render()
    {
        
        return view('livewire.servicios.isp')
        ->layout('layouts.guest');
    }
}
