<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Pago;

use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;

use Carbon\Carbon; // 1. Importa Carbon

class ReportePagoForm extends Component
{
    use WithFileUploads;

    public $metodo = 'none';
    public $state = [];
    public $saldo = 0;
    public $saldodolares = 0;

    public function mount()
    {
        $this->state['bancoOrigen'] = 'Banco de Venezuela (BDV)';
        $this->state['cellphonecode'] = '0416';
        $this->state['cellphone'] = '5800403';
        $this->state['fecha'] = Carbon::today()->format('Y-m-d');
        $this->state['operacion'] = '1234';
        $this->state['monto'] = '100.00';
    }

    public function procesar()
    {
        
        switch ($this->metodo) {
            case 'pago-movil':
                //dd($this->state);
                $validatedData = Validator::make($this->state, [
                    'bancoOrigen' => 'required|string',                    
                    'cellphonecode'     => 'required',
                    'cellphone'     => 'required',
                    'operacion'  => 'required',
                    'fecha'  => 'required',
                    'bs'       => 'required'
                ])->validate();


                $pago = Pago::where('operacion', $validatedData['operacion'])->first();
                if(!$pago)
                {
                    $validatedData['user_id'] = auth()->user()->id;
                    $validatedData['metodo'] = $this->metodo;
                    $validatedData['status'] = 'noconfirmado';
                    Pago::create($validatedData);
                    $this->dispatchBrowserEvent('hide-form', ['message' => 'Pago registrado satisfactoriamente!']);
                }else{
                    $this->dispatchBrowserEvent('alert', 
                    ['type' => 'error',  'message' => 'Operacion (referencia) existe en la BD!']);
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    public function render()
    {
        $this->saldo = auth()->user()->saldo()['saldo'];
        $this->saldodolares = auth()->user()->saldo()['saldodolares'];
        $this->state['bs'] = $this->saldo;
        $this->state['usd'] = $this->saldodolares;

        return view('livewire.cliente.reporte-pago-form');
    }
}
