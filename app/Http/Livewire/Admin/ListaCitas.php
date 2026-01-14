<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cita;

class ListaCitas extends Component
{
    use WithPagination;

    // Propiedades para filtros
    public $searchNombre = '';
    public $searchTelefono = '';
    public $searchServicio = '';

    // Configuración de estilos de paginación para Bootstrap
    protected $paginationTheme = 'bootstrap';

    // Resetear paginación cuando se escribe en los filtros
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * Actualiza el estado de la cita en tiempo real
     */
    public function actualizarEstado($citaId, $nuevoEstado)
    {
        $cita = Cita::find($citaId);
        if ($cita) {
            $cita->update(['atendida' => $nuevoEstado]);
            session()->flash('message', 'Estado actualizado correctamente.');
        }
    }

    public function render()
    {
        $citas = Cita::query()
            ->when($this->searchNombre, function($query) {
                $query->where('nombre_completo', 'like', '%' . $this->searchNombre . '%');
            })
            ->when($this->searchTelefono, function($query) {
                $query->where('telefono', 'like', '%' . $this->searchTelefono . '%');
            })
            ->when($this->searchServicio, function($query) {
                $query->where('servicio', 'like', '%' . $this->searchServicio . '%');
            })
            ->orderBy('fecha', 'desc')
            ->orderBy('hora', 'desc')
            ->paginate(15);

        return view('livewire.admin.lista-citas', [
            'citas' => $citas
        ]);
    }
}