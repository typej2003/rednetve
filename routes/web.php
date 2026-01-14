<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RedirectController;
use App\Http\Livewire\Dashboards\AdminDashboard;
use App\Http\Livewire\Dashboards\ClienteDashboard;
use App\Http\Livewire\Dashboards\AfiliadoDashboard;

// 1. Rutas de Autenticación (Esto habilita /login y /register)
Auth::routes();

// 2. Rutas Manuales (Si cambiaste el nombre del POST en tu formulario)
Route::post('/autenticar', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('autenticar');

// 3. Tu página principal (Livewire o Blade)
Route::get('/', \App\Http\Livewire\Welcome::class)->name('home');

// Esta ruta atrapa el redireccionamiento por defecto de Laravel
Route::get('/home', [RedirectController::class, 'dashboard'])->middleware('auth');

// Dashboards específicos
Route::middleware(['auth'])->group(function () {
    // Ruta para Clientes
    Route::get('/dashboard-cliente', ClienteDashboard::class)->name('cliente.index');

    // Ruta para Afiliados
    Route::get('/dashboard-afiliado', AfiliadoDashboard::class)->name('afiliado.index');

    // Ruta para Admin (Aquí es donde te daba el error)
    // Si no tienes el componente aún, puedes apuntar a una vista temporal
    Route::middleware(['auth', 'is_admin'])->group(function () {
        // Usa ::class para que Laravel reciba el string completo de la ruta de la clase
        Route::get('/admin/panel', AdminDashboard::class)->name('admin.index');
    });
});