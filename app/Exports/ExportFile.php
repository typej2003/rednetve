<?php

namespace App\Exports;

use App\Models\Facturas;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportFile implements FromCollection
{
   /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Facturas::select( 'user_id', 'tipo', 'origen', 'fecha', 'usd', 'ptr', 'bs', 'saldo')->get();
    }
}
