<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{

    // En tu componente Livewire o Controlador
    public $sedes = [
        'Caracas' => 'Caracas, Avenida Eugenio Mendoza, Torre Banco Lara - Oficina DP1',
        'Táchira' => 'San Antonio del táchira, Carrera 6 entre calle 4 y 5, Edif Kamaday - Local 1',
    ];

    public $direccionActual = 'Venezuela, Caracas, Avenida Eugenio Mendoza, Torre Banco Lara - Oficina DP1';

    public function cambiarSede($nombreSede)
    {
        $this->direccionActual = $this->sedes[$nombreSede];
    }

    public function render()
    {
        return view('livewire.welcome')
            ->layout('layouts.guest'); // Aquí es donde se define el layout modular
    }
}