<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ListUsers;



// Dashboards específicos
Route::middleware(['auth'])->group(function () {

    // Ruta para Admin (Aquí es donde te daba el error)
    // Si no tienes el componente aún, puedes apuntar a una vista temporal
    Route::middleware(['auth', 'is_admin'])->group(function () {
        // Usa ::class para que Laravel reciba el string completo de la ruta de la clase
        Route::get('/listUsers', ListUsers::class)->name('admin.listUsers');
    });
});