<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    const APROBADO = 'aprobado';
    const NOCONFIRMADO = 'noconfirmado';
    const RECHAZADO = 'rechazado';

    protected $fillable = [
        'user_id',
        'metodo',
        'operacion',
        'cellphonecode',
        'cellphone',
        'bancoOrigen',
        'fecha',
        'bs',
        'usd',
        'status',
    ];
}