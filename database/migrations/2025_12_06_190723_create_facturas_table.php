<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();

            // Campos de la factura
            // Relación con el usuario (cliente)
            // Se asume que la tabla de usuarios se llama 'users'
            $table->foreignId('user_id')
                  ->constrained() // Crea la clave foránea a la tabla 'users'
                  ->onDelete('cascade'); // Opcional: Elimina facturas si el usuario es eliminado
            $table->string('tipo', 10)->comment("Ej: 'FACT', 'PAGO'");
            $table->string('origen', 50)->comment("Ej: 'BioPagoBDV', 'Transferencia'");
            $table->string('operacion', 50)->comment("Ej: 'Operacion/Referencia'");
            $table->date('fecha')->default(now())->comment("Fecha de la transacción. Formato YYYY-MM-DD.");
            
            // Montos (Precisión de dos dígitos decimales)
            $table->decimal('usd', 10, 2)->default(0)->nullable();
            $table->string('ptr', 10)->nullable()->comment("Referencia PTR si aplica");
            $table->decimal('bs', 10, 2)->default(0)->nullable();
            $table->decimal('saldo', 10, 2)->default(0)->comment("Saldo restante o monto pendiente");
            $table->string('comentario', 254)->comment("Comentario")->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facturas');
    }
}