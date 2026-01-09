<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Cita;

class SolicitarCita extends Component
{
    public $nombre_completo, $telefono, $email, $direccion_servicio, $fecha, $hora;
    public $enviado = false;
    public $servicio;

    protected $rules = [
        'nombre_completo' => 'required|min:6',
        'telefono' => 'required',
        'email' => 'required|email',
        'direccion_servicio' => 'required',
        'fecha' => 'required|date|after:today',
        'hora' => 'required',
    ];

    // Personalización de mensajes en español
    protected $messages = [
        'nombre_completo.required' => 'El nombre completo es obligatorio.',
        'nombre_completo.min' => 'El nombre debe tener al menos 6 caracteres.',
        'telefono.required' => 'El número de teléfono es necesario.',
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'El formato de correo electrónico no es válido.',
        'direccion_servicio.required' => 'La dirección del servicio es obligatoria.',
        'fecha.required' => 'Debes seleccionar una fecha.',
        'fecha.date' => 'La fecha no tiene un formato válido.',
        'fecha.after' => 'La cita debe ser programada para una fecha posterior a hoy.',
        'hora.required' => 'La hora es obligatoria.',
    ];

    public function mount($servicio)
    {
        $this->servicio = $servicio;
    }

    public function guardarCita()
    {
        $this->validate();

        Cita::create([
            'nombre_completo' => $this->nombre_completo,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'direccion_servicio' => $this->direccion_servicio,
            'fecha' => $this->fecha,
            'hora' => $this->hora,
            'servicio' => $this->servicio,
            'atendida' => false, // Aseguramos que inicie en false
        ]);

        $this->enviado = true;
    }

    public function resetForm()
    {
        // Limpia todas las propiedades del formulario
        $this->reset([
            'nombre_completo', 
            'telefono', 
            'email', 
            'direccion_servicio', 
            'fecha', 
            'hora'
        ]);
        
        // Oculta la vista de agradecimiento y vuelve al formulario
        $this->enviado = false;
    }

    public function render()
    {
        return view('livewire.admin.solicitar-cita');
    }
}