<?php

namespace App\Http\Livewire\Administrator;

use Livewire\Component;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportFile;
use App\Exports\ExportFile;
use App\Models\User;

class UploadFile extends Component
{

    public function importView(Request $request){
        return view('importFile');
    }
    public function import(Request $request){
        if($request->file('file'))
        {
            // 1. Obtener el archivo subido
            $file = $request->file('file');

            // 2. Obtener el nombre original del archivo (e.g., 'ReporteVentas.xlsx')
            $originalFilename = $file->getClientOriginalName();

            // 3. Almacenar el archivo usando storeAs() para conservar el nombre
            // La ruta devuelta es: 'files/ReporteVentas.xlsx'
            $path = $file->storeAs('storage/uploadedfile', $originalFilename);
            Excel::import(new ImportFile, $path);
            // Excel::import(new ImportFile, $request->file('file')->store('files'));
            $this->dispatchBrowserEvent('hide-form', ['message' => 'Archivo agregado satisfactoriamente!']);
            return redirect()->back();
        }else{
            return redirect()->back()->withErrors(['msg' => 'No ha seleccionado el archivo!']);
        }
        
    }
    public function exportFacturas(Request $request){
        return Excel::download(new ExportFile, 'facturas.xlsx');
    }

    public function render()
    {
        return view('livewire.administrator.upload-file');
    }
}
