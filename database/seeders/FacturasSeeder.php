<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FacturasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Se asume que el usuario con ID: 5 es el único cliente.
        $userId = 5; 

        DB::table('facturas')->insert([
            [
                'user_id' => $userId,
                'tipo' => 'FACT',
                'origen' => 'Servicio INTERNET',
                'operacion' => '4875',
                'fecha' => Carbon::now()->subDays(5)->format('Y-m-d'),
                'usd' => 150.00,
                'ptr' => null,
                'bs' => 5475.00,
                'saldo' => 150.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'tipo' => 'PAGO',
                'origen' => 'Transferencia',
                'operacion' => '3845',
                'fecha' => Carbon::now()->subDays(3)->format('Y-m-d'),
                'usd' => 50.00,
                'ptr' => 'TRF-A909',
                'bs' => 1825.00,
                'saldo' => 100.00, // Saldo restante
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // [
            //     'user_id' => $userId,
            //     'tipo' => 'PAGO',
            //     'origen' => 'BioPagoBDV',
            //     'operacion' => '5788',
            //     'fecha' => Carbon::now()->format('Y-m-d'),
            //     'usd' => 100.00,
            //     'ptr' => 'BP-34201',
            //     'bs' => 3650.00,
            //     'saldo' => 0.00, // Saldo restante
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ],
        ]);
    }
}