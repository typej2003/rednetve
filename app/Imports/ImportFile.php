<?php

namespace App\Imports;
use App\Models\User;
use App\Models\DatosBasicos;
use App\Models\Facturas;
use PhpOffice\PhpSpreadsheet\Shared\Date;

use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportFile implements ToModel, WithStartRow
{
    /**
     * EXCEL COLUMNS FORMAT
     * NAME | EMAIL
     * @param array $row
     */
    public function model(array $row)
    {
        // N°, Cédula, Nombre Completo, Tipo, Origen, Operacion, Fecha, Usd, Ptr, Bs, Saldo
        // 0,    1,      2,              3,        4,    5,        6,    7,   8,   9,   10
        $facturaExists = Facturas::whereOperacion($row[6])->first();

        if ( ! $facturaExists) {
            $excelDateValue = $row[6];
            // 1. Convertir el número de serie de Excel a un objeto DateTime de PHP
            if (is_numeric($excelDateValue)) {
                $dateTimeObject = Date::excelToDateTimeObject($excelDateValue);
                
                // 2. Formatear la fecha como una cadena (por ejemplo, 'Y-m-d')
                $fechaFormateada = $dateTimeObject->format('Y-m-d'); 
            } else {
                // Manejar el caso si la celda ya es una cadena de fecha válida
                $fechaFormateada = $excelDateValue; 
            }

            $user = User::where('identificationNumber', $row[1])->first();

            if($user)
            {
                $factura = Facturas::create(
                    [
                        'user_id' => $user->id,
                        'tipo' => $row[3],
                        'origen' => $row[4],
                        'operacion' => $row[5],
                        'fecha' => $fechaFormateada,
                        'usd' => $row[7],
                        'ptr' => $row[8],
                        'bs' => $row[9],
                        'saldo' => $row[10],
                    ]
                );

                return $factura;

            }
            
            
        }
    }

    public function startRow(): int {
        return 2;
    }
}