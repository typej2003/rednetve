<?php

namespace App\Http\Livewire\Cliente;

use Livewire\Component;
use App\Models\Pago;

use Illuminate\Support\Facades\Validator;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

use Carbon\Carbon; // 1. Importa Carbon

class ReportePagoForm1 extends Component
{
    use WithFileUploads;

    public $metodo = 'none';
    public $state = [];
    public $saldo = 0;
    public $saldodolares = 0;

    public $banks = [
        "Seleccione Banco...",
        "Banco de Venezuela (BDV)",
        "Banco Mercantil",
        "Banesco",
        "Banco Provincial",
        "Bicentenario",
        "Otros..."
    ];


    public function mount()
    {
        $this->saldo = auth()->user()->saldo()['saldo'];
        $this->saldodolares = auth()->user()->saldo()['saldodolares'];

        $this->state['bancoOrigen'] = 'Banco de Venezuela (BDV)';
        $this->state['cellphonecode'] = '0416';
        $this->state['cellphone'] = '5800403';
        $this->state['fecha'] = Carbon::today()->format('Y-m-d');
        $this->state['operacion'] = '1234';
        $this->state['bs'] = $this->saldo;

        $this->state['usd'] = $this->saldodolares;
        $this->state['codigoconfirmacionzelle'] = 'C12345';

    }

    public static function generateAlphabeticCode(int $length = 8): string
    {
        // Define el conjunto de caracteres permitidos (solo letras)
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
        // Usa el método Str::random() pero solo con nuestro conjunto definido
        return Str::random($length, $characters);
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
            
            case 'zelle':
                //dd($this->state);
                $validatedData = Validator::make($this->state, [
                    'operacion'  => 'required',
                    'fecha'  => 'required',
                    'usd'       => 'required'
                ])->validate();

                $validatedData['operacion'] = $this->generateAlphabeticCode();

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
        
        $this->state['bs'] = $this->saldo;
        $this->state['usd'] = $this->saldodolares;

        return view('livewire.cliente.reporte-pago-form1', [
            'banks' => $this->banks,
        ]);
    }
}
