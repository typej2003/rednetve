<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tipo',
        'origen',
        'operacion',
        'fecha',
        'usd',
        'ptr',
        'bs',
        'saldo',
    ];

    public function user()
    {
        // Asume que la clave foránea en la tabla de registros es 'user_id'
        return $this->belongsTo(User::class, 'user_id');
    }
}
