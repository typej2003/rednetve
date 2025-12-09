<?php

use Illuminate\Support\Facades\Route;


use App\Http\Livewire\Recursos\ApiController;

use App\Http\Livewire\Administrator\UploadFile;

use App\Livewire\Cliente\Pasarela;

//use App\Http\Livewire\Mikrotik\ListRouters;

// Route::get('/listRouters', ListRouters::class)->name('listRouters')->middleware('auth');

use App\Http\Livewire\Cliente\Consulta;

use App\Http\Livewire\Cliente\PagueAqui;

use App\Http\Livewire\Cliente\UpdateProfileClient;

use App\Http\Livewire\Administrator\ListPagos;

use App\Http\Livewire\Administrator\ListOperations;

use App\Http\Livewire\Cliente\MisPagos;

//Route::get('/pagueaqui', FormaPago::class)->name('pagueaqui')->middleware('auth');

Route::get('/consultafacturas', Consulta::class)->name('consultafacturas')->middleware('auth');

Route::get('/pagueaqui', PagueAqui::class)->name('pagueaqui')->middleware('auth');

Route::get('/updateprofileclient', UpdateProfileClient::class)->name('updateprofileclient')->middleware('auth');

// Operaciones con archivo plano
Route::post('/importFile',[UploadFile::class,'import'])->name('importFile');
Route::get('/export-facturas',[UploadFile::class,'exportFacturas'])->name('export-facturas');

Route::get('/uploadfile', UploadFile::class)->name('uploadfile');

Route::get('/listpagos', ListPagos::class)->name('listpagos');

Route::get('/listoperations', ListOperations::class)->name('listoperations');

Route::get('/mispagos', MisPagos::class)->name('mispagos');

Route::get('/pasarela', function () {
    return view('livewire.cliente.pasarela');
});

Route::get('/pasarela/0', [ApiController::class, 'recibirDatos'])->name('pasarela');

// Route::get('/ProcessPaymentDemo/0', [ApiController::class, 'recibirDatos'])->name('ProcessPaymentDemo');