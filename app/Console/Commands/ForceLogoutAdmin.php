<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ForceLogoutAdmin extends Command
{
    protected $signature = 'admin:force-logout'; // Nombre del comando
    protected $description = 'Cierra la sesión del usuario administrador actualmente autenticado.';

    public function handle()
    {
        // Verifica si hay un usuario autenticado en el guardia 'admin' (o el que uses)
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout(); // Cierra sesión del usuario
            Session::flush(); // Opcional: Limpia todos los datos de sesión si es necesario
            $this->info('Sesión del administrador cerrada forzosamente.');
        } else {
            $this->warn('No hay un administrador autenticado.');
        }
    }
}
