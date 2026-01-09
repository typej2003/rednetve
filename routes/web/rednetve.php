<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Servicios\Pyme;
use App\Http\Livewire\Servicios\CorporacionPlus;
use App\Http\Livewire\Servicios\Isp;
use App\Http\Livewire\Admin\SolicitarCita;

Route::get('/pyme', Pyme::class)->name('pyme');
Route::get('/corporacionplus', CorporacionPlus::class)->name('corporacionplus');
Route::get('/isp', Isp::class)->name('isp');

Route::get('/solicitarcita/{servicio}', SolicitarCita::class)->name('socilitarcita');